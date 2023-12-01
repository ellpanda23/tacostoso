<?php

namespace App\Http\Livewire\Admin\Cash;

use App\Models\Cash;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class CashFlow extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search, $type, $transactios, $cash;

    protected $listeners = ['render'];

    function mount()
    {
        $this->cash = Cash::latest()->first();
        $this->transactios = Transaction::all();
    }

    public function render()
    {


        $movements = $this->cash->movements()
            ->where(function ($query) {
                if (!empty($this->type)) {
                    $query->where('type', $this->type);
                }
            })
            ->where(function ($query) {
                $query->where('description', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('amount', 'LIKE', '%' . $this->search . '%');
            })
            ->paginate(8);

        return view('livewire.admin.cash.cash-flow', compact('movements'));
    }
}
