<?php

namespace App\Http\Livewire\Admin\Cash;

use App\Models\Cash;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateCash extends Component
{
    public $balance;

    public function render()
    {
        return view('livewire.admin.cash.create-cash');
    }

    function store()
    {
        $cash = Cash::create(['user_id' => Auth::user()->id, 'initial_balance' => $this->balance]);

        $cash->movements()->create(['type' => Transaction::INGRESS, 'amount' => $this->balance, 'description' => 'Saldo inicial']);

        $cash->save();

        $this->balance = null;

        $this->emit('render');

        $this->emit('toast-success', 'Apertura de caja exitosa');
    }

}
