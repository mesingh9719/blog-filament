<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                    'Business News' => 'Financial markets, company updates, and economic trends',
                    'Technology News' => 'Latest innovations, products, and tech industry updates',
                    'Health News' => 'Medical breakthroughs, health advisories, and wellness information',
                    'Science News' => 'Scientific discoveries and research findings',
                    'Environment' => 'Climate change, conservation, and sustainability news',
                    'Education' => 'Updates on educational policies, institutions, and practices',
                ]
            ],
            'Blog' => [
                'description' => 'Blog posts and personal articles',
                'children' => [
                    'Personal Blog' => 'Personal thoughts and daily life',
                    'Travel Blog' => 'Travel experiences and adventures',
                    'Food Blog' => 'Food recipes and culinary adventures',
                    'Lifestyle' => 'Day-to-day living, wellness, and personal improvement',
                    'Career' => 'Professional development, job hunting, and workplace insights',
                    'Finance' => 'Personal finance, investing, and money management',
                    'Parenting' => 'Child-rearing, family activities, and parenting advice',
                    'Fashion' => 'Style trends, clothing reviews, and fashion industry insights',
                    'Fitness' => 'Exercise routines, fitness goals, and athletic pursuits',
                ]
            ],
            'Tutorials' => [
                'description' => 'Guides and how-to articles',
                'children' => [
                    'Tech Tutorials' => 'Technology and software guides',
                    'DIY Tutorials' => 'Do-it-yourself projects and crafts',
                    'Educational Tutorials' => 'Learning resources and educational guides',
                    'Writing Tutorials' => 'Improving writing skills, grammar, and storytelling',
                    'Photography' => 'Camera techniques, editing, and composition guides',
                    'Video Production' => 'Filming, editing, and video content creation',
                    'Social Media' => 'Platform strategies, growth tactics, and engagement tips',
                    'SEO' => 'Search engine optimization techniques and best practices',
                    'Content Marketing' => 'Content strategy, audience building, and promotion',
                ]
            ],
            'Reviews' => [
                'description' => 'Product and service reviews',
                'children' => [
                    'Tech Reviews' => 'Technology product reviews',
                    'Book Reviews' => 'Book recommendations and critiques',
                    'Movie Reviews' => 'Film and cinema reviews',
                    'TV Show Reviews' => 'Television program and streaming content analysis',
                    'App Reviews' => 'Mobile and desktop application evaluations',
                    'Restaurant Reviews' => 'Dining experiences and culinary critiques',
                    'Hotel Reviews' => 'Accommodation assessments and travel lodging',
                    'Software Reviews' => 'Programs and digital tools for content creators',
                    'Service Reviews' => 'Professional and consumer services evaluations',
                ]
            ],
            'Videos' => [
                'description' => 'Video content and highlights',
                'children' => [
                    'YouTube Videos' => 'Shared YouTube content',
                    'Video Blogs' => 'Video blog posts and vlogs',
                    'Video Tutorials' => 'Video tutorials and guides', // Changed from "Tutorials" to "Video Tutorials"
                    'Interviews' => 'Conversations with experts, celebrities, and personalities',
                    'Documentaries' => 'Informational and educational documentary content',
                    'Livestreams' => 'Recorded or planned live streaming events',
                    'Short Films' => 'Original cinematography and storytelling',
                    'Animation' => 'Animated content and motion graphics',
                    'Podcasts' => 'Audio shows with video components',
                ]
            ],
            'Opinion' => [
                'description' => 'Commentary and perspective pieces',
                'children' => [
                    'Editorials' => 'Official viewpoints and stance pieces',
                    'Commentary' => 'Analysis and subjective takes on current events',
                    'Columns' => 'Regular opinion features from specific writers',
                    'Guest Posts' => 'Perspectives from invited contributors',
                    'Debates' => 'Point-counterpoint discussions on issues',
                ]
            ],
            'Creative Writing' => [
                'description' => 'Fiction and creative content',
                'children' => [
                    'Short Stories' => 'Brief fictional narratives',
                    'Poetry' => 'Verse and poetic expressions',
                    'Creative Nonfiction' => 'Literary factual storytelling',
                    'Satire' => 'Humorous commentary and parody',
                    'Flash Fiction' => 'Very short fictional pieces',
                ]
            ],
            'Industry Specific' => [
                'description' => 'Content focused on particular industries',
                'children' => [
                    'Healthcare' => 'Medical industry news and insights',
                    'Finance' => 'Banking, investment, and economic coverage',
                    'Technology' => 'Tech industry developments and analysis',
                    'Entertainment' => 'Music, film, and media industry news',
                    'Real Estate' => 'Property market trends and analysis',
                    'Agriculture' => 'Farming, food production, and agricultural policy',
                    'Education' => 'Teaching, learning, and educational institutions',
                    'Legal' => 'Law, legislation, and judicial matters',
                    'Sports' => 'Athletic competitions, teams, and players',
                ]
            ],
            'Investigative' => [
                'description' => 'In-depth research and exposés',
                'children' => [
                    'Long-form Investigation' => 'Comprehensive research projects',
                    'Data Journalism' => 'Statistical analysis and data-driven stories',
                    'Interviews' => 'In-depth conversations with key figures',
                    'Case Studies' => 'Detailed examinations of specific situations',
                    'Series' => 'Multi-part investigative content',
                ]
            ],
            'Resources' => [
                'description' => 'Tools and materials for readers',
                'children' => [
                    'Templates' => 'Downloadable forms and document structures',
                    'Worksheets' => 'Educational and planning materials',
                    'Guides' => 'Comprehensive reference materials',
                    'Checklists' => 'Step-by-step task lists',
                    'Tools' => 'Online calculators and interactive resources',
                ]
            ],
        ];

        // Create the categories
        foreach ($defaultCategories as $name => $details) {
            $category = Category::create([
                'name' => $name,
                'description' => $details['description'],
                'slug' => Str::slug($name),
            ]);

            // Create child categories if they exist
            if (isset($details['children'])) {
                foreach ($details['children'] as $childName => $childDescription) {
                    // Create a unique slug by combining parent and child names
                    $slug = Str::slug($category->name . '-' . $childName);

                    Category::create([
                        'name' => $childName,
                        'description' => $childDescription,
                        'slug' => $slug,
                        'parent_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
