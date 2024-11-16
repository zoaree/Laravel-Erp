<?php

namespace App\Livewire;

use App\Models\eisenhower;
use GuzzleHttp\Psr7\Request;
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
    public $todo;
    public $comment;
    public $color;
    public $endDate;

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

    public function destroy($id)
    {

        $eisenhowe = Eisenhower::findOrFail($id);
        $status = $eisenhowe->status;
        if ($eisenhowe and $eisenhowe->user_id == Auth::id()) {
            $eisenhowe->delete();
            session()->flash('success', 'Kayıt başarıyla silindi.');
        } else {
            session()->flash('error', 'Kayıt bulunamadı.');
        }
        if ($status == 1) {
            $this->filterByColor('clear');
        } else {
            $this->mount();
        }
    }

    public function edit($data)
    {
        try {
            $eisenhowerEdit = Eisenhower::findOrFail($data['id']);
            
            if (!$eisenhowerEdit || $eisenhowerEdit->user_id != Auth::id()) {
                session()->flash('error', 'Bu kaydı düzenleme yetkiniz bulunmamaktadır.');
                return;
            }

            // Veri doğrulama kontrolleri
            if (empty($data['todo'])) {
                session()->flash('error', 'Yapılacak iş alanı boş bırakılamaz.');
                return;
            }

            if (!isset($data['color']) || !in_array($data['color'], [1,2,3,4])) {
                session()->flash('error', 'Geçersiz renk seçimi.');
                return;
            }

            if (empty($data['endDate'])) {
                session()->flash('error', 'Bitiş tarihi gereklidir.');
                return;
            }

            if (strtotime($eisenhowerEdit->created_at) > strtotime($data['endDate'])) {
                session()->flash('error', 'Başlangıç tarihi bitiş tarihinden sonra olamaz.');
                return;
            }
            $eisenhowerEdit->update([
                'todo' => $data['todo'],
                'comment' => $data['comment'],
                'color' => $data['color'],
                'status' => $data['status'],
                'endDate' => $data['endDate']
            ]);
    
            session()->flash('success', 'Kayıt başarıyla güncellendi.');
            $this->dispatch('modal-closed');

        } catch (\Exception $e) {
            session()->flash('error', 'Güncelleme sırasında bir hata oluştu: ' . $e->getMessage());
            $this->dispatch('closeModal');
        }
        if ($eisenhowerEdit->status == 1) {
            $this->filterByColor('clear');
        } else {
            $this->mount();
        }
    }

    public function add($data)
    {
        $this->todo = $data['todo'];
        $this->comment = $data['comment'] ?? null;
        $this->color = $data['color'];
        $this->endDate = $data['endDate'];
        
        $this->validate([
            'todo' => 'required',
            'color' => 'required|integer',
            'endDate' => 'required|date',
        ]);

        Eisenhower::create([
            'todo' => $this->todo,
            'comment' => $this->comment,
            'color' => $this->color,
            'endDate' => $this->endDate,
            'status' => $data['status'],
            'user_id' => Auth::id(),
        ]);
        
        $this->reset(['todo', 'comment', 'color', 'endDate']);
        
        session()->flash('success', 'Kayıt başarıyla eklendi.');
        $this->dispatch('modal-closed');
        $this->mount();
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
