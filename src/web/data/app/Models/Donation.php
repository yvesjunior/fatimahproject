<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donor_name', 'donor_email', 'amount', 'currency',
        'payment_method', 'transaction_id', 'status', 'cause_id', 'notes',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    public function cause()
    {
        return $this->belongsTo(Cause::class);
    }
}
