<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;

class VideoCard extends Component
{
    public $videos;

    public function mount()
    {
        $this->videos = Video::all();
    }
    public function render()
    {
        return view('livewire.video-card');
    }
}
