<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertAdvice;
use App\Models\GrandmaAdvice;
use App\Models\PodcastEpisode;

class HowToBeMomController extends Controller
{
    public function index()
    {
        $expertAdvice = ExpertAdvice::active()->latest()->take(10)->get();
        $grandmaAdvice = GrandmaAdvice::active()->latest()->take(10)->get();
        $podcastEpisodes = PodcastEpisode::active()->published()->latest()->take(10)->get();
        
        $stats = [
            'expert_advice_count' => ExpertAdvice::active()->count(),
            'grandma_advice_count' => GrandmaAdvice::active()->count(),
            'podcast_count' => PodcastEpisode::active()->count(),
            'total_views' => ExpertAdvice::sum('views_count') + 
                            GrandmaAdvice::sum('views_count') + 
                            PodcastEpisode::sum('views_count')
        ];

        return view('filament.pages.how-to-be-mom', compact(
            'expertAdvice', 
            'grandmaAdvice', 
            'podcastEpisodes', 
            'stats'
        ));
    }

    public function storeExpertAdvice(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'expert_name' => 'required|string|max:255',
            'expert_specialization' => 'nullable|string|max:255',
            'content_type' => 'required|in:text,video,link',
            'content' => 'required|string',
            'category' => 'required|in:pregnancy,delivery,baby_care,breastfeeding,health,nutrition'
        ]);

        ExpertAdvice::create($validated);

        return response()->json(['success' => true, 'message' => 'تم حفظ نصيحة الخبير بنجاح']);
    }

    public function storeGrandmaAdvice(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'grandma_name' => 'required|string|max:255',
            'grandma_age' => 'nullable|integer|min:50|max:120',
            'advice_text' => 'required|string',
            'advice_type' => 'required|in:text,audio,video',
            'media_url' => 'nullable|url',
            'category' => 'required|in:pregnancy,delivery,baby_care,breastfeeding,family'
        ]);

        GrandmaAdvice::create($validated);

        return response()->json(['success' => true, 'message' => 'تم حفظ نصيحة الجدة بنجاح']);
    }

    public function storePodcastEpisode(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'episode_number' => 'nullable|integer|min:1',
            'host_name' => 'nullable|string|max:255',
            'guest_name' => 'nullable|string|max:255',
            'audio_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'duration' => 'nullable|integer|min:1',
            'category' => 'required|in:pregnancy_tips,baby_care,motherhood,health,nutrition'
        ]);

        $validated['published_at'] = now();

        PodcastEpisode::create($validated);

        return response()->json(['success' => true, 'message' => 'تم حفظ حلقة البودكاست بنجاح']);
    }

    public function getExpertAdvice()
    {
        $advice = ExpertAdvice::active()->latest()->get();
        return response()->json($advice);
    }

    public function getGrandmaAdvice()
    {
        $advice = GrandmaAdvice::active()->latest()->get();
        return response()->json($advice);
    }

    public function getPodcastEpisodes()
    {
        $episodes = PodcastEpisode::active()->published()->latest()->get();
        return response()->json($episodes);
    }

    public function getStats()
    {
        $stats = [
            'expert_advice_count' => ExpertAdvice::active()->count(),
            'grandma_advice_count' => GrandmaAdvice::active()->count(),
            'podcast_count' => PodcastEpisode::active()->count(),
            'total_views' => ExpertAdvice::sum('views_count') + 
                            GrandmaAdvice::sum('views_count') + 
                            PodcastEpisode::sum('views_count')
        ];

        return response()->json($stats);
    }
}
