<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;

class Home extends Component
{
    public $playing = false;

    public function toggleVideo()
    {
        $this->playing = !$this->playing;
    }

    public function render()
    {
        return view('livewire.home');
    }
    public $videos;

    public function mount()
    {
        // Fetch videos from the database
        $this->videos = Video::all();
    }
    public function like($videoId)
    {
        // Logic for liking a video
    }

    public function dislike($videoId)
    {
        // Logic for disliking a video
    }
}
