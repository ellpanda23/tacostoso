<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function render()
    {
        $products = Product::with('category')
                            ->where('name', 'LIKE', '%'.$this->search.'%')
                            ->paginate(8);
        return view('livewire.admin.product.show-products', compact('products'));
    }
}
