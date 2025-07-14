<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class FamilyAdviceModalWidget extends Widget
{
    protected static string $view = 'filament.widgets.family-advice-modal-widget';

    public $showAdviceModal = false;
    public $adviceForm = [
        'title' => '',
        'type' => '',
        'content' => '',
        'expert_name' => '',
        'target_audience' => '',
    ];

    public function showAdviceModal()
    {
        $this->showAdviceModal = true;
    }

    public function closeAdviceModal()
    {
        $this->showAdviceModal = false;
    }

    public function saveAdvice()
    {
        // يمكنك هنا حفظ النصيحة في قاعدة البيانات
        $this->reset('adviceForm');
        $this->showAdviceModal = false;
        session()->flash('message', 'تمت إضافة النصيحة بنجاح!');
    }
}
