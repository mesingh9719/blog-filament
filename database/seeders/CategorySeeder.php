<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultCategories = [
            'News' => [
                'description' => 'Latest news and current events',
                'children' => [
                    'World News' => 'International news from around the globe',
                    'Local News' => 'News from your local area',
                    'Politics' => 'Political news and analysis',
                ]
            ],
            'Blog' => [
                'description' => 'Blog posts and personal articles',
                'children' => [
                    'Personal Blog' => 'Personal thoughts and daily life',
                    'Travel Blog' => 'Travel experiences and adventures',
                    'Food Blog' => 'Food recipes and culinary adventures',
                ]
            ],
            'Tutorials' => [
                'description' => 'Guides and how-to articles',
                'children' => [
                    'Tech Tutorials' => 'Technology and software guides',
                    'DIY Tutorials' => 'Do-it-yourself projects and crafts',
                    'Educational Tutorials' => 'Learning resources and educational guides',
                ]
            ],
            'Reviews' => [
                'description' => 'Product and service reviews',
                'children' => [
                    'Tech Reviews' => 'Technology product reviews',
                    'Book Reviews' => 'Book recommendations and critiques',
                    'Movie Reviews' => 'Film and cinema reviews',
                ]
            ],
            'Videos' => [
                'description' => 'Video content and highlights',
                'children' => [
                    'YouTube Videos' => 'Shared YouTube content',
                    'Video Blogs' => 'Video blog posts and vlogs',
                    'Tutorials' => 'Video tutorials and guides',
                ]
            ],
        ];
    }
}
