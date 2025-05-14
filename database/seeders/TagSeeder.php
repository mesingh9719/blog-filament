<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultTags = [
            'Technology' => 'Articles about technology and innovation',
            'Lifestyle' => 'Articles about lifestyle and daily living',
            'Health' => 'Articles about health and wellness',
            'Business' => 'Articles about business and entrepreneurship',
            'Education' => 'Articles about education and learning',
            'Entertainment' => 'Articles about entertainment and media',
            'Travel' => 'Articles about travel and adventure',
            'Food' => 'Articles about food and cooking',
            'Personal' => 'Personal articles and thoughts',
            'Opinion' => 'Opinion pieces and editorials',
        ];
    }
}
