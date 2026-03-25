<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    protected $fillable = [
        'phone', 'email', 'address', 'map_embed_url',
        'years_experience', 'volunteer_count', 'projects_completed',
        'form_subtitle', 'form_title',
    ];

    public static function content(): static
    {
        return static::firstOrCreate([], [
            'phone' => '+1 (832) 620 7564',
            'email' => 'fatimahprojectmission@gmail.com',
            'address' => '10750 Hammerly Blvd #258, Houston, TX 77043',
            'map_embed_url' => 'https://maps.google.com/maps?width=100%25&height=100%25&hl=en&q=10750%20Blvd%20Hammerly,%20Houston,%20TX%2077043&t=&z=14&ie=UTF8&iwloc=B&output=embed',
            'years_experience' => 5,
            'volunteer_count' => 30,
            'projects_completed' => 100,
            'form_subtitle' => 'Need help',
            'form_title' => 'Get In touch',
        ]);
    }
}
