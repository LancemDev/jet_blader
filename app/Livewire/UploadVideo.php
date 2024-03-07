<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadVideo extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public array $tags = [];
    public $video;
    public $thumbnail;
    public function submitForm() {
        dd($this->all());
    }
    public function render()
    {
        return view('livewire.upload-video');
    }
}
