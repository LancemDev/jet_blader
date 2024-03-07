<?php

namespace App\Livewire;

use Livewire\Component;

class Chatty extends Component
{
    public $message;
    public $loading = false;
    public function render()
    {
        return view('livewire.chatty');
    }
}
