<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GovInitiative;

class GovInitiativeSeeder extends Seeder
{
    public function run(): void
    {
        $initiatives = [
            [
                'title' => 'مبادرة 100 مليون صحة',
                'description' => 'مبادرة رئاسية للكشف المبكر عن الأمراض المزمنة والمعدية وتوفير العلاج المجاني للمواطنين',
                'content_type' => 'both',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'government_entity' => 'وزارة الصحة والسكان',
                'launch_date' => '2018-10-01',
                'target_audience' => 'جميع المواطنين من سن 18 سنة فما فوق',
                'status' => 'active',
            ],
            [
                'title' => 'مبادرة التأمين الصحي الشامل',
                'description' => 'تطبيق نظام التأمين الصحي الشامل لضمان حصول جميع المواطنين على خدمات صحية عالية الجودة',
                'content_type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'government_entity' => 'الهيئة العامة للتأمين الصحي الشامل',
                'launch_date' => '2018-07-01',
                'target_audience' => 'جميع المواطنين المصريين',
                'status' => 'active',
            ],
            [
                'title' => 'مبادرة القضاء على فيروس سي',
                'description' => 'مبادرة للقضاء على فيروس سي في مصر من خلال الكشف المبكر وتوفير العلاج المجاني',
                'content_type' => 'infographic',
                'government_entity' => 'وزارة الصحة والسكان',
                'launch_date' => '2014-09-01',
                'target_audience' => 'جميع المواطنين المصريين',
                'status' => 'active',
            ],
            [
                'title' => 'مبادرة حياة كريمة - الصحة',
                'description' => 'توفير الخدمات الصحية المتكاملة للقرى الأكثر احتياجاً في إطار مبادرة حياة كريمة',
                'content_type' => 'both',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'government_entity' => 'مؤسسة حياة كريمة',
                'launch_date' => '2019-01-01',
                'target_audience' => 'سكان القرى الأكثر احتياجاً',
                'status' => 'active',
            ],
            [
                'title' => 'مبادرة صحة المرأة',
                'description' => 'مبادرة شاملة لرعاية صحة المرأة المصرية في جميع مراحل العمر',
                'content_type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'government_entity' => 'وزارة الصحة والسكان',
                'launch_date' => '2019-03-08',
                'target_audience' => 'جميع النساء المصريات',
                'status' => 'active',
            ],
            [
                'title' => 'مبادرة الكشف المبكر عن السمنة',
                'description' => 'مبادرة للكشف المبكر عن السمنة عند الأطفال وتوعية الأسر بأهمية التغذية السليمة',
                'content_type' => 'infographic',
                'government_entity' => 'وزارة الصحة والسكان',
                'launch_date' => '2020-09-01',
                'target_audience' => 'الأطفال والأسر المصرية',
                'status' => 'active',
            ],
        ];

        foreach ($initiatives as $initiative) {
            GovInitiative::create($initiative);
        }
    }
}
