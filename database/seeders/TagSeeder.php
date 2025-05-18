<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultTags = [
            // Original tags
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

            // Tech-related tags
            'AI' => 'Artificial intelligence developments and applications',
            'Blockchain' => 'Blockchain technology and cryptocurrencies',
            'Cybersecurity' => 'Digital security and online safety',
            'Software Development' => 'Programming and software creation',
            'Mobile' => 'Mobile technology and applications',
            'Gadgets' => 'Consumer electronics and tech products',
            'Web Development' => 'Website design and development',

            // Current events tags
            'Politics' => 'Political news and commentary',
            'Climate Change' => 'Climate crisis and environmental concerns',
            'Economics' => 'Economic trends and financial markets',
            'Social Justice' => 'Equality, rights, and social issues',
            'COVID-19' => 'Pandemic updates and related topics',
            'Breaking News' => 'Latest unfolding stories and events',

            // Content type tags
            'Tutorial' => 'How-to guides and instructional content',
            'Analysis' => 'In-depth examination of topics',
            'Interview' => 'Q&A content with individuals',
            'Review' => 'Product, service, or media evaluations',
            'Case Study' => 'Detailed examination of specific examples',
            'List' => 'Numbered or bullet-point content collections',
            'Feature' => 'Long-form journalism and detailed stories',
            'Editorial' => 'Opinion-based position pieces',

            // Niche interest tags
            'Sustainability' => 'Eco-friendly practices and green living',
            'Productivity' => 'Efficiency and getting things done',
            'Mental Health' => 'Psychological wellbeing and mental care',
            'Career Development' => 'Professional growth and job skills',
            'DIY' => 'Do-it-yourself projects and crafts',
            'Finance' => 'Personal finance and money management',
            'Parenting' => 'Child-rearing and family topics',
            'Fitness' => 'Exercise, workouts, and physical health',
            'Nutrition' => 'Diet, food science, and healthy eating',

            // Writing craft tags
            'Storytelling' => 'Narrative techniques and story construction',
            'Journalism' => 'Reporting practices and news writing',
            'Content Marketing' => 'Creating content for marketing purposes',
            'Copywriting' => 'Persuasive writing for advertising',
            'SEO' => 'Search engine optimization techniques',
            'Editing' => 'Content revision and improvement',
            'Research' => 'Information gathering and fact-finding',

            // Media format tags
            'Video' => 'Video-based content',
            'Podcast' => 'Audio content and shows',
            'Infographic' => 'Visual information displays',
            'Photography' => 'Image-focused content',
            'Social Media' => 'Platform-specific content strategies',

            // Trending tags
            'Trending' => 'Currently popular topics',
            'Viral' => 'Widely shared and popular content',
            'Evergreen' => 'Content that remains relevant over time',
            'Seasonal' => 'Time-specific and holiday-related content',
            'Controversial' => 'Debated and divisive topics',

            // Regional tags
            'International' => 'Global coverage and worldwide topics',
            'Local' => 'Community-specific and nearby events',
            'Urban' => 'City life and metropolitan topics',
            'Rural' => 'Countryside and small-town subjects',
        ];

        foreach ($defaultTags as $name => $description) {
            Tag::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $description,
                'type' => 'system',
                'is_active' => true,
            ]);
        }
    }
}
