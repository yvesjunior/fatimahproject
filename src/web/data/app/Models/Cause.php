<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cause extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'body', 'image',
        'goal_amount', 'raised_amount', 'category', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'goal_amount' => 'decimal:2',
            'raised_amount' => 'decimal:2',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function ($cause) {
            if (empty($cause->slug)) {
                $cause->slug = Str::slug($cause->title);
            }
        });
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getProgressPercentAttribute(): float
    {
        if ($this->goal_amount <= 0) return 0;
        return min(100, round(($this->raised_amount / $this->goal_amount) * 100, 1));
    }
}
