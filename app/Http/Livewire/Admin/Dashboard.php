<?php

namespace App\Http\Livewire\Admin;

use App\Models\Command;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{

    public $todayCommands;

    public function mount()
    {
        $this->todayCommands = Command::whereDate('created_at', Carbon::today())->count();

    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
