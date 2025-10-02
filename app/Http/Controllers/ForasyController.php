<?php

namespace App\Http\Controllers;

use App\Models\ForasyJob;
use App\Models\CareerAdvice;
use App\Models\ForasyBanner;
use App\Models\ForasyVideo;
use App\BlogHelper;
use Illuminate\Http\Request;

class ForasyController extends Controller
{
    use BlogHelper;
    public function index()
    {
        $jobs = ForasyJob::where('is_active', true)
            ->where(function($q) {
                $q->whereNull('deadline')
                  ->orWhere('deadline', '>=', now());
            })
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $featuredJobs = ForasyJob::where('is_active', true)
            ->where('is_featured', true)
            ->where(function($q) {
                $q->whereNull('deadline')
                  ->orWhere('deadline', '>=', now());
            })
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $advices = CareerAdvice::where('is_active', true)
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $banners = ForasyBanner::where('is_active', true)
            ->where(function($q) {
                $q->whereNull('valid_until')
                  ->orWhere('valid_until', '>=', now());
            })
            ->orderBy('display_order', 'asc')
            ->get();

        $videos = ForasyVideo::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->get();

        // Get latest 3 blogs for forasy section
        $latestBlogs = $this->getLatestBlogsForSection('forasy', 3);

        return view('forasy.index', compact('jobs', 'featuredJobs', 'advices', 'banners', 'videos', 'latestBlogs'));
    }

    public function showJob($id)
    {
        $job = ForasyJob::where('is_active', true)->findOrFail($id);
        
        $relatedJobs = ForasyJob::where('is_active', true)
            ->where('id', '!=', $job->id)
            ->where(function($q) use ($job) {
                $q->where('category', $job->category)
                  ->orWhere('job_type', $job->job_type);
            })
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('forasy.job-details', compact('job', 'relatedJobs'));
    }

    public function showAdvice($id)
    {
        $advice = CareerAdvice::where('is_active', true)->findOrFail($id);
        $advice->increment('views');

        $relatedAdvices = CareerAdvice::where('is_active', true)
            ->where('id', '!=', $advice->id)
            ->where('category', $advice->category)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('forasy.advice-details', compact('advice', 'relatedAdvices'));
    }
}
