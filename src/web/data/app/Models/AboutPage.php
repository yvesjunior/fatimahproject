<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'why_subtitle', 'why_heading', 'mission_text', 'vision_text', 'video_url',
        'programs',
        'involved_subtitle', 'involved_heading', 'involved_description',
        'raised_amount', 'raised_label', 'volunteer_count', 'volunteer_label',
    ];

    protected function casts(): array
    {
        return [
            'programs' => 'array',
        ];
    }

    public static function content(): static
    {
        return static::firstOrCreate([], [
            'why_subtitle' => 'Why Choose Us',
            'why_heading' => 'Trusted non profit donation center',
            'mission_text' => "In a world where women and girls face numerous challenges, the Fatimah Project stands as a beacon of hope. Our mission transcends providing aid—it's about igniting change. By offering housing, education, and essential resources, we're not just supporting women and girls; we're investing in their potential to shape the future.",
            'vision_text' => "Imagine a world where every woman and girl command her destiny. That's the world we're committed to creating. Through the empowerment of education and the provision of safe, supportive environments, we see a future where every individual can achieve her dreams, supported by a community of faith and love.",
            'video_url' => 'https://www.youtube.com/embed/',
            'programs' => [
                [
                    'title' => 'Maison Fatimah Housing',
                    'body' => "A home is more than a shelter—it's a foundation for life. Our housing program offers a sanctuary for women and girls escaping adversity, providing not just a roof over their heads but a community that nurtures growth, security, and belonging.",
                ],
                [
                    'title' => 'Counseling and Evangelization',
                    'body' => "Healing begins with understanding and acceptance. Our counseling services offer a safe space for emotional and spiritual growth, complemented by our evangelization efforts that share the light of Christ's love and hope.",
                ],
                [
                    'title' => 'Education and Autonomation',
                    'body' => "Empowerment begins with knowledge. Our educational and vocational training initiatives, along with our income-generating programs, are designed to unlock the potential of every woman and girl. Our goal is to equip them with the necessary skills to overcome life's challenges and seize opportunities for a prosperous future.",
                ],
            ],
            'involved_subtitle' => 'Get Involved',
            'involved_heading' => 'Support Our Cause',
            'involved_description' => "Your support can change lives. Whether you're inspired to donate, volunteer your time, or spread the word, every action contributes to our mission. Together, we can make a lasting impact on the lives of women and girls in need.",
            'raised_amount' => 25000,
            'raised_label' => 'Raised by 350 people in one year',
            'volunteer_count' => 30,
            'volunteer_label' => 'Volunteers are available to help you',
        ]);
    }
}
