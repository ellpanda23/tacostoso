<?php

namespace App\Http\Livewire\Admin\Command;

use App\Models\Command;
use Livewire\Component;

use Livewire\WithPagination;

class ShowCommands extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search, $status;

    public function render()
    {

        $commands = Command::where(function ($query)
                            {
                                if (!empty($this->status)) {
                                    $query->where('status', $this->status);
                                }
                            })
                            
                            ->whereHas('user', function ($query) {
                                $query->where('name', 'LIKE', '%'.$this->search.'%');
                            })
                            ->paginate(8);

        return view('livewire.admin.command.show-commands', compact('commands'));
    }
}
