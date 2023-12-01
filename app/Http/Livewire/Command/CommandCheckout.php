<?php

namespace App\Http\Livewire\Command;

use App\Models\Cash;
use App\Models\Command;
use App\Models\Movement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

use function Termwind\render;

class CommandCheckout extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $open = true, $command, $cost, $noProducts;
    public $paidWith, $change;

    protected $listeners = ['confirmed' => 'checkout'];

    public function mount(Command $command)
    {
        $this->command = $command;
        foreach ($command->orders as $order)
        {
            $this->cost += ($order->product->cost * $order->quantity);
            $this->noProducts += $order->quantity;
        }

        $this->paidWith = $this->cost;
    }

    public function render()
    {
        $orders = $this->command->orders()->paginate(3);
        return view('livewire.command.command-checkout', compact('orders'));
    }

    public function paidCommand()
    {
        if($this->paidWith - $this->cost == 0)
        {
            $this->checkout();
        }
        else
        {
            $this->confirm('¿Ya entregaste el cambio?', [
                'text' => 'Esta accion no se puede deshacer',
                 'onConfirmed' => 'confirmed'
             ]);
        }
    }

    function checkout()
    {

        if(Cash::first()->where('status', 1)->get()->isNotEmpty())
        {
            $id = Cash::where('status', 1)->first()->id;
            $this->command->status = Command::PAID;
            $this->command->movement()->create([
                'cash_id' => $id,
                'type' => Movement::INCOME,
                'amount' => $this->cost,
                'description' => 'Pago de comanda: '.$this->command->id,
            ]);

            $this->command->save();

            $this->alert('success', 'Pagado');
        }
        else
        {
            $this->alert('error', 'Ah ocurrido un error por favor comunicate con tu supervisor');
            $this->render();
        }

    }

}
