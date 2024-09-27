<?php

namespace App\Livewire;

use App\Models\eisenhower;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveEisenhover extends Component
{
    public $filteredEisenhowers = [];
    public $selectedColor = null;
    public $status = null;
    public $kirmizi = null;
    public $turuncu = null;
    public $sari = null;
    public $yesil = null;

    public function mount()
    {
        $this->filteredEisenhowers = $this->getFilteredEisenhowers();
    }

    public function filterByColor($color)
    {
        if ($color === 'clear') {
            $this->selectedColor = null;
            $this->status = "full";
        } else {
            $this->selectedColor = $color;
        }
        $this->filteredEisenhowers = $this->getFilteredEisenhowers();
    }

    private function getFilteredEisenhowers()
    {
        $query = Eisenhower::where('user_id', Auth::id())->where('status', 1);

        $this->calculateColorCounts();

        if ($this->status == "full") {
            $query = Eisenhower::where('user_id', Auth::id());
            $this->calculateColorCounts(true);
        }

        if ($this->selectedColor) {
            $query->where('color', $this->selectedColor);
        }

        return $query->orderBy('endDate', 'desc')->get();
    }
    private function calculateColorCounts($includeAllStatuses = false)
    {

        $statusCondition = $includeAllStatuses ? [] : ['status' => 1];

        $this->kirmizi = Eisenhower::where('user_id', Auth::id())->where('color', 1)->where($statusCondition)->count();
        $this->turuncu = Eisenhower::where('user_id', Auth::id())->where('color', 2)->where($statusCondition)->count();
        $this->sari = Eisenhower::where('user_id', Auth::id())->where('color', 3)->where($statusCondition)->count();
        $this->yesil = Eisenhower::where('user_id', Auth::id())->where('color', 4)->where($statusCondition)->count();
    }

    public function render()
    {


        return view('livewire.live-eisenhover', [
            'eisenhowers' => $this->filteredEisenhowers,
            'kirmizi' => $this->kirmizi,
            'turuncu' => $this->turuncu,
            'sari' => $this->sari,
            'yesil' => $this->yesil,
        ]);
    }
}
