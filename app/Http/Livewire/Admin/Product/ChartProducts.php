<?php

namespace App\Http\Livewire\Admin\Product;

use App\Charts\ProductChart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChartProducts extends Component
{
    public $product, $products = [];

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        $data = Order::with('command')
                ->whereHas('command', function ($query) {
                    $query->where('status', 2);
                })
                ->select(
                    'product_id',
                    DB::raw('SUM(quantity) as total_quantity'),
                )
                ->groupBy('product_id')
                ->orderBy('product_id')
                ->get();
        $productChart = new ProductChart;
        $productChart->labels($data->pluck('product.name'));
        $productChart->dataset('Cantidad Vendida', 'bar', $data->pluck('total_quantity'));


        return view('livewire.admin.product.chart-products', compact('productChart'));
    }
}
