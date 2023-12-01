<?php

namespace App\Http\Livewire\Admin\Cash;

use App\Models\Cash;
use App\Models\Movement;
use App\Models\Transaction;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddMovement extends Component
{

    use LivewireAlert;

    public $cash, $transactions, $transaction, $description, $amount;

    public function mount(Cash $cash)
    {
        $this->cash = $cash;
        $this->transactions = Transaction::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.admin.cash.add-movement');
    }


    public function addMovement()
    {
        Movement::create([
            'cash_id' => $this->cash->id,
            'type' => $this->transaction,
            'amount' => $this->amount,
            'description' => $this->description
        ]);

        $this->emitTo('admin.cash.cash-flow', 'render');

        $this->emit('toast-success', 'El movimiento se creo correctamente');

    }

}
