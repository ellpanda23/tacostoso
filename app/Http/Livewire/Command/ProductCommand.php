<?php

namespace App\Http\Livewire\Command;

use App\Models\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductCommand extends Component
{

    public $product, $command, $quantity = 1, $instruction, $metric, $customMetric, $money, $cost;

    protected $listeners = ['commandCreated' => 'refreshCommand', 'render', 'setInstruction'];

    function mount(Product $product, Command $command)
    {
        $this->product = $product;
        $this->command = $command;
        $this->cost = $product->cost;
        if($product->countable == 1)
            $this->metric = $product->metric;
    }

    public function render()
    {
        return view('livewire.command.product-command');
    }

    function addProduct()
    {
        // if($this->command->id == null)
        // {
        //     $this->command = Command::create(['user_id' => Auth::user()->id]);
        //     $this->emit('commandCreated', $this->command->id);
        // }

        // Guardar temporalmente los productos seleccionados en el array
        $selectedProductDetails = [
            'name' => $this->product->name,
            'instruction' => $this->instruction,
            'cost' => $this->product->cost,
            'product_id' => $this->product->id,
            'quantity' => $this->quantity,
        ];

        if($this->product->image)
            $selectedProductDetails['image'] = $this->product->image;

        if($this->metric != null)
        {
            $selectedProductDetails['metric'] = $this->metric;
            $selectedProductDetails['cost'] = $this->money;
        }

        // Emitir al componente summary
        $this->emitTo('command.command-summary', 'refreshProducts', $selectedProductDetails);

        // Emitir alerta
        $this->emit('alert', 'Producto agregado correctamente');

        // Limpiar los campos del formulario después de guardar temporalmente los datos
        $this->reset(['quantity', 'instruction', 'money', 'customMetric']);

        // $this->command->products()->attach($this->product->id, ['quantity' => $this->quantity]);
        // $this->command->save();
    }

    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;
    }

    public function refreshCommand($id)
    {
        $this->command = Command::find($id);
        $this->emit('render');
    }

    function incrementQuantity()
    {
        $this->quantity = ++$this->quantity;
    }

    function decrementQuantity()
    {
        $this->quantity = --$this->quantity;
    }

    function updatedCustomMetric()
    {
        switch ($this->metric) {
            case 'Kg':
                $metric = 1000;
                break;

            default:
                # code...
                break;
        }
        $this->money = intval(($this->customMetric * $this->cost) / $metric);
    }

    function updatedMoney()
    {
        $this->customMetric = intval(($this->money / $this->cost) * 1000);
    }

    function setQuantity($quantity)
    {
        if($quantity == 0)
            $quantity = 1;
        $this->quantity = $quantity;
        $this->money = $quantity * $this->cost;
        $this->addProduct();
    }

}
