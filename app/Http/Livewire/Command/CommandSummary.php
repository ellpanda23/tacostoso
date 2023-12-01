<?php

namespace App\Http\Livewire\Command;

use App\Models\Command;
use App\Models\Order;
use App\Models\Table;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommandSummary extends Component
{

    public $open = false;

    // public $actualOrder = 'no order';

    public $command, $selectedProducts = [], $cost, $table, $tables;

    protected $listeners = ['refreshProducts', 'render', 'updateInstruction'];

    public function mount(Command $command)
    {
        $this->command = $command;
        $this->tables = Table::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.command.command-summary');
    }

    function updateCost()
    {
        $this->cost = array_reduce($this->selectedProducts, function ($carry, $product) {
            return $carry + ($product['cost'] * $product['quantity']);
        }, 0);
    }
    function updateInstruction($instruction, $index)
    {
        $this->selectedProducts[$index]['instruction'] = $instruction;
        $this->emit('alert', 'Actualizado');
        $this->emit('render');
    }

    function refreshProducts($productDetails)
    {
        if (!empty($this->selectedProducts)) {
            $found = false;
            foreach ($this->selectedProducts as $index => $item) {
                if ($item['product_id'] == $productDetails['product_id']) {
                    if ($productDetails['instruction'] != null || isset($productDetails['metric'])) {
                        array_push($this->selectedProducts, $productDetails);
                    } else {
                        $quantity = $this->selectedProducts[$index]['quantity'];
                        $this->selectedProducts[$index]['quantity'] = $quantity + $productDetails['quantity'];
                    }
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                array_push($this->selectedProducts, $productDetails);
            }
        } else {
            array_push($this->selectedProducts, $productDetails);
        }

        $this->updateCost();
        $this->emit('render');
    }


    function removeProduct($index)
    {
        unset($this->selectedProducts[$index]);

        $this->selectedProducts = array_values($this->selectedProducts);

        $this->updateCost();
        $this->emit('render');
    }

    function incrementQuantity($index)
    {
        $quantity = $this->selectedProducts[$index]['quantity'];
        $this->selectedProducts[$index]['quantity'] = ++$quantity;

        $this->updateCost();
        $this->emit('render');
    }

    function decrementQuantity($index)
    {
        $quantity = $this->selectedProducts[$index]['quantity'];
        if ($quantity >= 2)
            $this->selectedProducts[$index]['quantity'] = --$quantity;

        $this->updateCost();
        $this->emit('render');
    }

    function setInstruction($index)
    {
        $instruction = $this->selectedProducts[$index]['instruction'] ?? ''; // Establece una cadena vacía si el valor es nulo
        $this->emit('instructionSummary', $instruction, $index);
    }

    function checkOut()
    {
        // $command = Command::create(['user_id' => Auth::user()->id, 'table_id' => $this->table]);

        // foreach ($this->selectedProducts as $product) {

        //     $command->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'instruction' => $product['instruction']]);
        //     $command->orders()->create(['user_id' => Auth::user()->id, 'product_id' => $product['product_id'], 'quantity' => $product['quantity'], 'instruction' => $product['instruction'], 'table_id' => $this->table]);
        // }
        // $command->save();
        // $this->reset('table');
        // $this->emit('alert', 'La comanda se creo correctamente');

        // return 

        $numero = 4451359565;

        $url = 'https://wa.me/'.$numero.'?text='.urlencode($this->actualOrder = $this->makeOrder());
            
        return redirect()->away($url);

    }


    function makeOrder()
    {
        $cadena = '';
        foreach ($this->selectedProducts as $product) 
        {
            $cadena = $cadena . $product['quantity']. 'X ' . $product['name'] . '\n';
            // $command->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'instruction' => $product['instruction']]);
            // $command->orders()->create(['user_id' => Auth::user()->id, 'product_id' => $product['product_id'], 'quantity' => $product['quantity'], 'instruction' => $product['instruction'], 'table_id' => $this->table]);
        }

        return $cadena;
        
    }

}
