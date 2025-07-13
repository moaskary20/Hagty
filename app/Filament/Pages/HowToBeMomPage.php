<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\ExpertAdvice;
use App\Models\GrandmaAdvice;
use App\Models\PodcastEpisode;
use Livewire\Component;

class HowToBeMomPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static string $view = 'filament.pages.mom-guide';
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?string $title = 'كيف تكونين أمًا';
    protected static ?string $navigationLabel = 'كيف تكونين أمًا';
    protected static ?int $navigationSort = 4;

    protected static bool $shouldRegisterNavigation = true;

    // الخصائص للمودالات
    public $showExpertAdviceModal = false;
    public $showGrandmaAdviceModal = false;
    public $showPodcastModal = false;

    // خصائص التحرير
    public $editingExpertAdvice = null;
    public $editingGrandmaAdvice = null;
    public $editingPodcast = null;

    // نماذج البيانات
    public $expertAdviceForm = [
        'expert_name' => '',
        'expert_title' => '',
        'title' => '',
        'content' => '',
        'video_url' => '',
    ];

    public $grandmaAdviceForm = [
        'grandma_name' => '',
        'region' => '',
        'title' => '',
        'content' => '',
        'category' => '',
    ];

    public $podcastForm = [
        'title' => '',
        'description' => '',
        'audio_url' => '',
        'duration' => '',
    ];

    public function mount(): void
    {
        $this->resetForms();
    }

    // الحصول على البيانات للعرض
    public function getExpertAdvicesProperty()
    {
        return ExpertAdvice::latest()->get();
    }

    public function getGrandmaAdvicesProperty()
    {
        return GrandmaAdvice::latest()->get();
    }

    public function getPodcastEpisodesProperty()
    {
        return PodcastEpisode::latest()->get();
    }

    // فتح مودال نصائح الخبراء
    public function openExpertAdviceModal()
    {
        $this->resetExpertAdviceForm();
        $this->showExpertAdviceModal = true;
    }

    public function closeExpertAdviceModal()
    {
        $this->showExpertAdviceModal = false;
        $this->editingExpertAdvice = null;
        $this->resetExpertAdviceForm();
    }

    // حفظ نصيحة خبير
    public function saveExpertAdvice()
    {
        $this->validate([
            'expertAdviceForm.expert_name' => 'required|string|max:255',
            'expertAdviceForm.title' => 'required|string|max:255',
            'expertAdviceForm.content' => 'required|string',
        ]);

        if ($this->editingExpertAdvice) {
            $this->editingExpertAdvice->update($this->expertAdviceForm);
        } else {
            ExpertAdvice::create($this->expertAdviceForm);
        }

        $this->closeExpertAdviceModal();
        $this->dispatch('refresh');
    }

    // تحرير نصيحة خبير
    public function editExpertAdvice($id)
    {
        $this->editingExpertAdvice = ExpertAdvice::find($id);
        $this->expertAdviceForm = $this->editingExpertAdvice->toArray();
        $this->showExpertAdviceModal = true;
    }

    // فتح مودال نصائح الجدات
    public function openGrandmaAdviceModal()
    {
        $this->resetGrandmaAdviceForm();
        $this->showGrandmaAdviceModal = true;
    }

    public function closeGrandmaAdviceModal()
    {
        $this->showGrandmaAdviceModal = false;
        $this->editingGrandmaAdvice = null;
        $this->resetGrandmaAdviceForm();
    }

    // حفظ نصيحة جدة
    public function saveGrandmaAdvice()
    {
        $this->validate([
            'grandmaAdviceForm.grandma_name' => 'required|string|max:255',
            'grandmaAdviceForm.title' => 'required|string|max:255',
            'grandmaAdviceForm.content' => 'required|string',
        ]);

        if ($this->editingGrandmaAdvice) {
            $this->editingGrandmaAdvice->update($this->grandmaAdviceForm);
        } else {
            GrandmaAdvice::create($this->grandmaAdviceForm);
        }

        $this->closeGrandmaAdviceModal();
        $this->dispatch('refresh');
    }

    // تحرير نصيحة جدة
    public function editGrandmaAdvice($id)
    {
        $this->editingGrandmaAdvice = GrandmaAdvice::find($id);
        $this->grandmaAdviceForm = $this->editingGrandmaAdvice->toArray();
        $this->showGrandmaAdviceModal = true;
    }

    // فتح مودال البودكاست
    public function openPodcastModal()
    {
        $this->resetPodcastForm();
        $this->showPodcastModal = true;
    }

    public function closePodcastModal()
    {
        $this->showPodcastModal = false;
        $this->editingPodcast = null;
        $this->resetPodcastForm();
    }

    // حفظ حلقة بودكاست
    public function savePodcast()
    {
        $this->validate([
            'podcastForm.title' => 'required|string|max:255',
            'podcastForm.description' => 'required|string',
            'podcastForm.audio_url' => 'required|url',
        ]);

        if ($this->editingPodcast) {
            $this->editingPodcast->update($this->podcastForm);
        } else {
            PodcastEpisode::create($this->podcastForm);
        }

        $this->closePodcastModal();
        $this->dispatch('refresh');
    }

    // تحرير حلقة بودكاست
    public function editPodcast($id)
    {
        $this->editingPodcast = PodcastEpisode::find($id);
        $this->podcastForm = $this->editingPodcast->toArray();
        $this->showPodcastModal = true;
    }

    // إعادة تعيين النماذج
    private function resetForms()
    {
        $this->resetExpertAdviceForm();
        $this->resetGrandmaAdviceForm();
        $this->resetPodcastForm();
    }

    private function resetExpertAdviceForm()
    {
        $this->expertAdviceForm = [
            'expert_name' => '',
            'expert_title' => '',
            'title' => '',
            'content' => '',
            'video_url' => '',
        ];
    }

    private function resetGrandmaAdviceForm()
    {
        $this->grandmaAdviceForm = [
            'grandma_name' => '',
            'region' => '',
            'title' => '',
            'content' => '',
            'category' => '',
        ];
    }

    private function resetPodcastForm()
    {
        $this->podcastForm = [
            'title' => '',
            'description' => '',
            'audio_url' => '',
            'duration' => '',
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // يمكن إضافة أزرار إضافية في الهيدر هنا
        ];
    }
}
