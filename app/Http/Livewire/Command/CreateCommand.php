<?php

namespace App\Http\Livewire\Command;

use App\Models\Category;
use App\Models\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CreateCommand extends Component
{

    use WithPagination;

    public $search, $category, $categories = [];
    public $command;

    protected $listeners = ['commandCreated' => 'refreshCommand', 'render'];

    public function mount()
    {
        $this->categories = Category::pluck('name', 'id');
        $this->category = Category::first()->id;
        // $this->command = Command::create(['user_id' => Auth::user()->id]);
        $this->command = new Command();
    }

    public function render()
    {
        $products = Product::where('status', Product::AVAILABLE)
                            ->where('category_id', $this->category)
                            ->where('name', 'LIKE', '%'.$this->search.'%')
                            ->paginate(8);

        return view('livewire.command.create-command', compact('products'));
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function refreshCommand($id)
    {
        $this->command = Command::find($id);
        $this->emit('render');
    }

    public function loadCommand(Command $command)
    {
        $this->command = $command;
    }



}
