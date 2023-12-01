<?php

namespace App\Http\Livewire\Admin\Cash;

use App\Models\Cash;
use App\Models\Transaction;
use Livewire\Component;

class CutCash extends Component
{
    protected $listeners = ['render'];

    public $actualAmount;

    public function render()
    {
        $cash = Cash::with('user')
                        ->where('status', Cash::ACTIVE)
                        ->first();

        return view('livewire.admin.cash.cut-cash', compact('cash'));
    }
}
