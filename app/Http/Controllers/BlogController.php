<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::published();

        // Filter by section if provided
        if ($request->has('section') && $request->section) {
            $query->where('section', $request->section);
        }

        // Filter by tag if provided
        if ($request->has('tag') && $request->tag) {
            $query->whereJsonContains('tags', $request->tag);
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('excerpt', 'like', "%{$searchTerm}%")
                  ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        $blogs = $query->orderBy('published_at', 'desc')
                      ->paginate(12);

        // Get featured blogs for sidebar
        $featuredBlogs = Blog::published()
                            ->featured()
                            ->orderBy('published_at', 'desc')
                            ->limit(4)
                            ->get();

        // Get recent blogs
        $recentBlogs = Blog::published()
                          ->orderBy('published_at', 'desc')
                          ->limit(5)
                          ->get();

        // Get all sections for filter
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

        return view('blog.index', compact('blogs', 'featuredBlogs', 'recentBlogs', 'sections'));
    }

    public function show($slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();
        
        // Increment views count
        $blog->incrementViews();

        // Get related blogs (same section)
        $relatedBlogs = Blog::published()
                           ->where('section', $blog->section)
                           ->where('id', '!=', $blog->id)
                           ->orderBy('published_at', 'desc')
                           ->limit(3)
                           ->get();

        // Get recent blogs
        $recentBlogs = Blog::published()
                          ->where('id', '!=', $blog->id)
                          ->orderBy('published_at', 'desc')
                          ->limit(5)
                          ->get();

        return view('blog.show', compact('blog', 'relatedBlogs', 'recentBlogs'));
    }

    public function getLatestBlogs($limit = 4)
    {
        return Blog::published()
                  ->orderBy('published_at', 'desc')
                  ->limit($limit)
                  ->get();
    }
}