<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\CoachingService;
use App\Models\Lead;
use App\Models\Testimonial;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // 1. Coaching Services (Hardcoded)
        CoachingService::truncate();
        
        $services = [
            [
                'title' => 'Executive Storytelling',
                'icon_name' => 'heroicon-o-microphone',
                'short_description' => 'Master the art of narrative leadership. Turn data into drama and reports into revolutions.',
                'full_details_json' => ['Speech Writing', 'Stage Presence', 'Keynote Structuring'],
            ],
            [
                'title' => 'Corporate Culture Repair',
                'icon_name' => 'heroicon-o-heart',
                'short_description' => 'Diagnose and heal toxic workplace dynamics before your best talent leaves for Westlands.',
                'full_details_json' => ['Toxicity Audit', 'Team Bonding', 'Conflict Resolution'],
            ],
            [
                'title' => 'Crisis Communication',
                'icon_name' => 'heroicon-o-shield-check',
                'short_description' => 'When the Twitter mob comes for you, be ready. Strategic narrative control for high-stakes moments.',
                'full_details_json' => ['Media Training', 'PR Strategy', 'Damage Control'],
            ],
            [
                'title' => 'The Humour Workshop',
                'icon_name' => 'heroicon-o-face-smile',
                'short_description' => 'Because nobody listens to a boring boss. Inject wit into your leadership style.',
                'full_details_json' => ['Ice Breakers', 'Public Speaking', 'Comedy for Leaders'],
            ],
        ];

        foreach ($services as $service) {
            CoachingService::create($service);
        }

        // 2. Articles (Kenyan Context)
        Article::truncate();

        $articles = [
            [
                'title' => 'Why Westlands Traffic Teaches Patience',
                'excerpt' => 'If you can survive the Waiyaki Way deadlock at 5 PM, you can handle any board meeting.',
                'category_id' => 1, // Life
                'image_path' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=1470&auto=format&fit=crop',
            ],
            [
                'title' => 'The "Usiguze" Culture in HR',
                'excerpt' => 'Navigating the sensitive boundaries of Kenyan corporate politics without stepping on toes.',
                'category_id' => 2, // Corporate
                'image_path' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1632&auto=format&fit=crop',
            ],
            [
                'title' => 'Surviving the Nairobi Salary Delay',
                'excerpt' => 'A practical guide to maintaining morale when the "check is in the mail" for the third week running.',
                'category_id' => 3, // Career
                'image_path' => 'https://images.unsplash.com/photo-1634733988685-a91a649ee448?q=80&w=1470&auto=format&fit=crop',
            ],
            [
                'title' => 'Matatu Wisdom for CEOs',
                'excerpt' => 'Aggressive expansion, route optimization, and loud branding: What Ma3 culture teaches us about market dominance.',
                'category_id' => 2, // Corporate
                'image_path' => 'https://images.unsplash.com/photo-1543491427-4402eb6b349b?q=80&w=1470&auto=format&fit=crop',
            ],
            [
                'title' => 'Gen Z: The New Corporate Code',
                'excerpt' => 'Understanding the new generation entering the workforce and how they are reshaping corporate culture.',
                'category_id' => 2, // Corporate
                'image_path' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1470&auto=format&fit=crop',
            ],
            [
                'title' => 'Wellness is Not Just Pizza Parties',
                'excerpt' => 'Real mental health support goes beyond superficial perks. Building a genuinely supportive environment.',
                'category_id' => 1, // Life
                'image_path' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=1470&auto=format&fit=crop',
            ],
        ];

        foreach ($articles as $index => $data) {
            Article::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'excerpt' => $data['excerpt'],
                'content' => '<h2>Introduction</h2><p>' . $faker->paragraph(5) . '</p><h3>The Nairobian Perspective</h3><p>' . $faker->paragraph(4) . '</p><blockquote>"' . $faker->sentence() . '"</blockquote><h3>Conclusion</h3><p>' . $faker->paragraph(3) . '</p>',
                'category_id' => $data['category_id'],
                'read_time' => rand(3, 8),
                'is_featured' => $index < 3, // First 3 featured
                'image_path' => $data['image_path'],
            ]);
        }

        // 3. Testimonials (Local Social Proof)
        Testimonial::truncate();

        $testimonials = [
            [
                'client_name' => 'Wanjiku K.',
                'position' => 'Head of Ops',
                'company' => 'Safaricom',
                'quote' => 'Humour Resource transformed our town halls. People actually look forward to them now!',
                'avatar_url' => 'https://ui-avatars.com/api/?name=Wanjiku+K&background=C5A059&color=fff',
            ],
            [
                'client_name' => 'Ochieng M.',
                'position' => 'Senior Developer',
                'company' => 'Equity Bank',
                'quote' => 'The "Crisis Communication" training saved us during a major system outage. Highly recommended.',
                'avatar_url' => 'https://ui-avatars.com/api/?name=Ochieng+M&background=0A192F&color=fff',
            ],
            [
                'client_name' => 'Kamau J.',
                'position' => 'Marketing Director',
                'company' => 'EABL',
                'quote' => 'Finally, an HR consultancy that doesn\'t sound like a robot. The workshops are pure gold.',
                'avatar_url' => 'https://ui-avatars.com/api/?name=Kamau+J&background=C5A059&color=fff',
            ],
            [
                'client_name' => 'Amina Z.',
                'position' => 'Founder',
                'company' => 'Techfirm Nairobi',
                'quote' => 'Sarah helped me find my voice as a leader. I stopped reading scripts and started telling stories.',
                'avatar_url' => 'https://ui-avatars.com/api/?name=Amina+Z&background=0A192F&color=fff',
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // 4. Leads (Realistic Emails)
        Lead::truncate();

        $domains = ['kcbgroup.com', 'britam.com', 'eabl.com', 'safaricom.co.ke', 'nationmedia.com', 'centum.co.ke', 'gmail.com'];
        $firstNames = ['john', 'mary', 'kevin', 'brian', 'mercy', 'david', 'faith', 'ian', 'lisa', 'sam'];

        for ($i = 0; $i < 20; $i++) {
            $name = $faker->randomElement($firstNames);
            $domain = $faker->randomElement($domains);
            $email = $name . '.' . $faker->word . '@' . $domain;
            
            // Ensure uniqueness simply by checking or catching error (but simpler here just to randomize enough)
            $email = strtolower($name . rand(1, 999) . '@' . $domain);

            Lead::create([
                'email' => $email,
                'created_at' => $faker->dateTimeBetween('-1 month', 'now'),
            ]);
        }
    }
}
