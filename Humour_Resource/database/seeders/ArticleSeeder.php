<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Corporate Category
        Article::create([
            'title' => 'The Art of the Passive-Aggressive Email',
            'slug' => 'passive-aggressive-email',
            'excerpt' => 'Why saying "per my last email" is basically a declaration of war in the modern workplace.',
            'content' => "
<h2>The Subtext of \"Regards\"</h2>
<p>We have all received it. The email that starts with \"I hope this finds you well,\" which actually translates to \"I hope you have a terrible weekend thinking about this mistake.\" Corporate communication is a minefield of unsaid grievances.</p>

<h3>The Classic Hits</h3>
<ul>
    <li><strong>\"Per my last email\"</strong>: You can't read, and I hate you for it.</li>
    <li><strong>\"Just circling back\"</strong>: You are ignoring me, and I am not going away.</li>
    <li><strong>\"Moving forward\"</strong>: You messed up, but I am too 'professional' to scream.</li>
</ul>

<p>In this guide, we explore how to dismantle these structures and actually say what you mean, without getting reported to HR.</p>
            ",
            'category_id' => 2, // Corporate
            'read_time' => 5,
        ]);

        // 2. Career Category
        Article::create([
            'title' => 'Why Your "Five Year Plan" is a Trap',
            'slug' => 'five-year-plan-trap',
            'excerpt' => 'Planning is essential, but rigidity is fatal. Here is how to build a career narrative that breathes.',
            'content' => "
<h2>The Myth of Linear Progression</h2>
<p>We are taught to climb the ladder. But what if the ladder is leaning against the wrong wall? Or worse, what if the wall is on fire?</p>

<blockquote>\"Strategy is not about sticking to a plan. It is about adapting to the narrative as it unfolds.\"</blockquote>

<p>Most successful careers look less like a straight line and more like a scatter plot. Embrace the chaos.</p>
            ",
            'category_id' => 3, // Career
            'read_time' => 7,
        ]);

        // 3. Life Category
        Article::create([
            'title' => 'Balancing KPIs with actual Happiness',
            'slug' => 'kpis-vs-happiness',
            'excerpt' => 'You are more than your quarterly results. A guide to detaching your self-worth from your spreadsheet.',
            'content' => "
<h2>You Are Not a Metric</h2>
<p>When was the last time you optimized your joy? We spend 40 hours a week hitting targets set by people who don't know our middle names.</p>
<p>It is time to set your own OKRs (Objectives and Key Results) for your personal life.</p>
            ",
            'category_id' => 1, // Life
            'read_time' => 4,
        ]);
    }
}