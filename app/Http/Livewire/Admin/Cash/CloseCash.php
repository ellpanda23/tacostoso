<?php

namespace App\Http\Livewire\Admin\Cash;

use App\Models\Cash;
use Livewire\Component;

class CloseCash extends Component
{

    public $cash, $amount;

    public function mount(Cash $cash)
    {
        $this->cash = $cash;
    }

    public function render()
    {
        return view('livewire.admin.cash.close-cash');
    }


    public function closeCash()
    {
        $this->cash->final_balance = $this->amount;
        $this->cash->status = Cash::CLOSED;
        $this->cash->save();
        $this->emitTo('admin.cash.cut-cash', 'render');

        $this->emit('toast-success', 'El movimiento se creo correctamente');
    }
}
