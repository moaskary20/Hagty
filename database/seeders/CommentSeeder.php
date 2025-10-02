<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Blog;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = Blog::all();
        
        if ($blogs->count() === 0) {
            $this->command->info('No blogs found. Please run BlogSeeder first.');
            return;
        }

        $comments = [
            [
                'name' => 'فاطمة أحمد',
                'email' => 'fatima@example.com',
                'comment' => 'مقال رائع جداً! استفدت كثيراً من المعلومات المقدمة. شكراً لكم على هذا المحتوى القيم.',
            ],
            [
                'name' => 'مريم السعيد',
                'email' => 'mariam@example.com',
                'comment' => 'أحببت الطريقة التي تم بها شرح الموضوع. واضح ومفصل جداً. أنصح الجميع بقراءته.',
            ],
            [
                'name' => 'نور الدين',
                'email' => 'nour@example.com',
                'comment' => 'معلومات مفيدة جداً! كنت أبحث عن هذا الموضوع منذ فترة. شكراً لكم.',
            ],
            [
                'name' => 'سارة محمد',
                'email' => 'sara@example.com',
                'comment' => 'مقال ممتاز! أتمنى المزيد من هذه المقالات المفيدة. استمروا في هذا العمل الرائع.',
            ],
            [
                'name' => 'هند علي',
                'email' => 'hind@example.com',
                'comment' => 'شكراً لكم على هذا المحتوى المميز. استفدت كثيراً وأنا أنصح أصدقائي بقراءته.',
            ],
            [
                'name' => 'أسماء حسن',
                'email' => 'asma@example.com',
                'comment' => 'مقال مفيد جداً! المعلومات واضحة ومفصلة. أتمنى المزيد من هذه المقالات.',
            ],
            [
                'name' => 'ريم عبدالله',
                'email' => 'reem@example.com',
                'comment' => 'أشكركم على هذا المقال الرائع. استفدت كثيراً من النصائح المقدمة.',
            ],
            [
                'name' => 'نورا محمود',
                'email' => 'nora@example.com',
                'comment' => 'محتوى ممتاز! كنت أحتاج هذه المعلومات. شكراً لكم على الجهد المبذول.',
            ],
            [
                'name' => 'دينا أحمد',
                'email' => 'dina@example.com',
                'comment' => 'مقال رائع ومفيد جداً! أتمنى المزيد من هذه المقالات القيمة.',
            ],
            [
                'name' => 'ياسمين سعد',
                'email' => 'yasmin@example.com',
                'comment' => 'شكراً لكم على هذا المحتوى المميز. استفدت كثيراً وأنا سأشاركه مع أصدقائي.',
            ],
        ];

        foreach ($blogs as $blog) {
            // Add 2-4 random comments to each blog
            $randomComments = collect($comments)->random(rand(2, 4));
            
            foreach ($randomComments as $commentData) {
                Comment::create([
                    'blog_id' => $blog->id,
                    'name' => $commentData['name'],
                    'email' => $commentData['email'],
                    'comment' => $commentData['comment'],
                    'is_approved' => rand(0, 1), // Random approval status
                ]);
            }
        }

        $this->command->info('Comments seeded successfully!');
    }
}