<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::published();
        
        // Filter by section if provided
        if ($request->has('section') && $request->section) {
            $query->where('section', $request->section);
        }
        
        // Search by title or content
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }
        
        $blogs = $query->orderBy('published_at', 'desc')
                      ->paginate(12);
        
        // Get featured blogs for sidebar
        $featuredBlogs = Blog::published()
                            ->featured()
                            ->orderBy('published_at', 'desc')
                            ->limit(3)
                            ->get();
        
        // Get recent blogs for sidebar (excluding featured)
        $recentBlogs = Blog::published()
                            ->where('is_featured', false)
                            ->orderBy('published_at', 'desc')
                            ->limit(5)
                            ->get();
        
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
            'accessories_stores' => 'متاجر الإكسسوارات',
            'health' => 'الصحة',
            'babies' => 'الأطفال',
            'wedding' => 'الزفاف',
            'beauty' => 'الجمال',
            'omomaty' => 'أومومتي',
            'fashion' => 'الموضة',
            'general' => 'عام',
        ];
        
        return view('articles.index', compact('blogs', 'featuredBlogs', 'recentBlogs', 'sections'));
    }
    
    public function show($slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();
        $blog->increment('views_count');
        
        // Load comments for this blog
        $comments = $blog->approvedComments()
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        // Related blogs (same section, excluding current)
        $relatedBlogs = Blog::published()
                            ->where('section', $blog->section)
                            ->where('id', '!=', $blog->id)
                            ->orderBy('published_at', 'desc')
                            ->limit(3)
                            ->get();
        
        // Recent blogs (excluding current and related)
        $recentBlogs = Blog::published()
                            ->where('id', '!=', $blog->id)
                            ->whereNotIn('id', $relatedBlogs->pluck('id'))
                            ->orderBy('published_at', 'desc')
                            ->limit(3)
                            ->get();
        
        return view('articles.show', compact('blog', 'relatedBlogs', 'recentBlogs', 'comments'));
    }
}
