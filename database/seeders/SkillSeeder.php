<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Technical Skills
            ['name' => 'HTML',        'color' => '#E34F26', 'category' => 'technical', 'sort_order' => 1],
            ['name' => 'CSS',         'color' => '#1572B6', 'category' => 'technical', 'sort_order' => 2],
            ['name' => 'Bootstrap',   'color' => '#7952B3', 'category' => 'technical', 'sort_order' => 3],
            ['name' => 'Tailwind',    'color' => '#38BDF8', 'category' => 'technical', 'sort_order' => 4],
            ['name' => 'JavaScript',  'color' => '#F7DF1E', 'category' => 'technical', 'sort_order' => 5],
            ['name' => 'jQuery',      'color' => '#0769AD', 'category' => 'technical', 'sort_order' => 6],
            ['name' => 'Vue.js',      'color' => '#42B883', 'category' => 'technical', 'sort_order' => 7],
            ['name' => 'Node.js',     'color' => '#8CC84B', 'category' => 'technical', 'sort_order' => 8],
            ['name' => 'Express.js',  'color' => '#AAAAAA', 'category' => 'technical', 'sort_order' => 9],
            ['name' => 'PHP',         'color' => '#777BB4', 'category' => 'technical', 'sort_order' => 10],
            ['name' => 'Laravel',     'color' => '#FF2D20', 'category' => 'technical', 'sort_order' => 11],
            ['name' => 'MySQL',       'color' => '#00758F', 'category' => 'technical', 'sort_order' => 12],
            ['name' => 'Python',      'color' => '#3776AB', 'category' => 'technical', 'sort_order' => 13],

            // Tools & Technologies
            ['name' => 'Docker',      'color' => '#2496ED', 'category' => 'tool',      'sort_order' => 1],
            ['name' => 'Git',         'color' => '#F05032', 'category' => 'tool',      'sort_order' => 2],
            ['name' => 'AWS',         'color' => '#FF9900', 'category' => 'tool',      'sort_order' => 3],
            ['name' => 'MongoDB',     'color' => '#47A248', 'category' => 'tool',      'sort_order' => 4],
            ['name' => 'PostgreSQL',  'color' => '#4169E1', 'category' => 'tool',      'sort_order' => 5],
            ['name' => 'Figma',       'color' => '#F24E1E', 'category' => 'tool',      'sort_order' => 6],
            ['name' => 'VS Code',     'color' => '#007ACC', 'category' => 'tool',      'sort_order' => 7],
            ['name' => 'Jira',        'color' => '#0052CC', 'category' => 'tool',      'sort_order' => 8],

            // Soft Skills
            ['name' => 'Communication',   'color' => '#8B5CF6', 'category' => 'soft',  'sort_order' => 1],
            ['name' => 'Problem Solving', 'color' => '#8B5CF6', 'category' => 'soft',  'sort_order' => 2],
            ['name' => 'Team Leadership', 'color' => '#10B981', 'category' => 'soft',  'sort_order' => 3],
            ['name' => 'Time Management', 'color' => '#F59E0B', 'category' => 'soft',  'sort_order' => 4],
            ['name' => 'Adaptability',    'color' => '#8B5CF6', 'category' => 'soft',  'sort_order' => 5],
            ['name' => 'Mentoring',       'color' => '#10B981', 'category' => 'soft',  'sort_order' => 6],
        ];

        foreach ($skills as $data) {
            Skill::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
