<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class TestIndex extends Component
{


    public function render()
    {
        $data = User::all();
        return view('livewire.test-index', [
            'data' => $data
        ]);
    }
}