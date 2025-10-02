<?php

namespace App;

use App\Models\Blog;

trait BlogHelper
{
    /**
     * Get latest 3 blogs for a specific section
     */
    public function getLatestBlogsForSection($section, $limit = 3)
    {
        return Blog::published()
            ->bySection($section)
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get all sections with their latest blogs
     */
    public function getAllSectionsWithBlogs($limit = 3)
    {
        $sections = [
            'eventaty' => 'ايفينتاتى',
            'hadiety' => 'هديتي',
            'beity' => 'بيتي',
            'hesabaty' => 'حساباتى',
            'riadaty' => 'رياضتي',
            'mashroay' => 'مشروعي',
            'mostashary' => 'مستشاري',
            'mostamay' => 'مستمعي',
            'nesaa-alghad' => 'نساء الغد',
            'accessoraty' => 'أكسسوراتى',
            'courses' => 'الكورسات التعليمية',
            'accessory-stores' => 'متاجر الإكسسوارات',
            'health' => 'الصحة',
            'babies' => 'الأطفال',
            'wedding' => 'الزفاف',
            'beauty' => 'الجمال',
            'umomty' => 'أومومتي',
            'fashion' => 'الموضة',
            'general' => 'عام',
        ];

        $sectionsWithBlogs = [];
        
        foreach ($sections as $key => $name) {
            $blogs = $this->getLatestBlogsForSection($key, $limit);
            if ($blogs->count() > 0) {
                $sectionsWithBlogs[$key] = [
                    'name' => $name,
                    'blogs' => $blogs
                ];
            }
        }

        return $sectionsWithBlogs;
    }
}