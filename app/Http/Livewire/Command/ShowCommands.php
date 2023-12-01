<?php

namespace App\Http\Livewire\Command;

use App\Models\Command;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowCommands extends Component
{

    public $sort, $search, $direction;

    public function render()
    {
        // $commands = Command::paginate(8);

        $commands = Command::where('status', Command::ACTIVE)
                            ->orderByRaw("user_id = ".Auth::user()->id." DESC")
                            ->orderBy('created_at', 'desc') // Ordenar por fecha de creación descendente
                            ->paginate(8);

        return view('livewire.command.show-commands', compact('commands'));
    }
}
