<?php

namespace App\Http\Livewire\Admin\Cash;

use App\Models\Cash;
use Livewire\Component;

class ShowCashes extends Component
{
    protected $listeners = ['render'];

    public $activeCash;

    public function mount()
    {
        $this->activeCash = Cash::with('user')
                            ->where('status', Cash::ACTIVE)
                            ->first();
    }

    public function render()
    {
        $cashes = Cash::with('user')
                        ->where('status', Cash::CLOSED)
                        ->paginate(8);
        return view('livewire.admin.cash.show-cashes', compact('cashes'));
    }
}
