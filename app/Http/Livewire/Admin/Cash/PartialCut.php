<?php

namespace App\Http\Livewire\Admin\Cash;

use App\Models\Cash;
use App\Models\Movement;
use App\Models\Transaction;
use Livewire\Component;

class PartialCut extends Component
{

    public $cash, $amount;

    public function mount(Cash $cash)
    {
        $this->cash = $cash;
    }

    public function render()
    {
        return view('livewire.admin.cash.partial-cut');
    }

    public function addMovement()
    {
        Movement::create([
            'cash_id' => $this->cash->id,
            'type' => Transaction::EGRESS,
            'amount' => $this->amount,
            'description' => 'Corte parcial de caja'
        ]);

        $this->cash->partial_cut = $this->amount;
        $this->cash->save();

        $this->emitTo('admin.cash.cut-cash', 'render');

        $this->emit('toast-success', 'El movimiento se creo correctamente');

    }

}
