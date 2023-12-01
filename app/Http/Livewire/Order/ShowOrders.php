<?php

namespace App\Http\Livewire\Order;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class ShowOrders extends Component
{
    use LivewireAlert;

    protected $listeners = ['confirmed'];

    public $search, $category, $categories = [];

    public function mount()
    {
        $this->categories = Category::pluck('name', 'id');
        $this->category = Category::first()->id;
    }

    public function render()
    {
        $orders = Order::where('status', Order::PENDIENTE)
            ->whereHas('product', function ($query) {
                $query->where('category_id', $this->category);
            })->paginate(8);

        return view('livewire.order.show-orders', compact('orders'));
    }


    public function showInstruction(Order $order)
    {
        $message = $order->product->name . ' ' . $order->instruction;
        $this->alert('info', $message, [
            'position' => 'center',
            'timer' => false,
            'toast' => false,
            'showConfirmButton' => true,
        ]);
    }

    public function updateCategory(Category $category)
    {
        $this->category = $category;
    }

    public function finishOrder($id)
    {
        $this->confirm('¿Estas seguro?', [
            'text' => 'Esta accion no se puede deshacer',
            'inputAttributes' => [
                'value' => $id
             ],
             'onConfirmed' => 'confirmed'
         ]);
    }

    public function confirmed($response)
    {
        $order = Order::find($response['data']['inputAttributes']['value']);
        $order->update(['status' => Order::TERMINADO]);
        $this->alert('success', 'Listo');
    }

}
