<?php

namespace App\Http\Livewire\Admin\Cash;

use App\Models\Movement;
use App\Models\Transaction;
use Livewire\Component;

class EditMovement extends Component
{

    public $movement, $transactions, $transaction, $amount, $description;

    public function mount(Movement $movement)
    {
        $this->movement = $movement;
        $this->transactions = Transaction::pluck('name', 'id');
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.admin.cash.edit-movement');
    }

    function loadData()
    {
        $this->transaction = $this->movement->type;
        $this->amount = $this->movement->amount;
        $this->description = $this->movement->description;
    }

    public function updateMovement()
    {
        $this->movement->type = $this->transaction;
        $this->movement->amount = $this->amount;
        $this->movement->description = $this->description;
        $this->movement->save();

        $this->emit('render');

        $this->emit('toast-success', 'Actualizado correctamente');

    }

}
