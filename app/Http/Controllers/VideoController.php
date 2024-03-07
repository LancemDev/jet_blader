<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $success = false;
        // Store the thumbnail in the thumbnails folder
        $thumbnail_path = $request->thumbnail->store('thumbnails', 'public');
        // Store the video in the videos folder
        $original_file_path = $request->video->store('videos', 'public');
        // get the user id
        $user_id = auth()->user()->id;

        // Create a new video
        $video = Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'original_file_path' => $original_file_path,
            'thumbnail_path' => $thumbnail_path,
            'user_id' => $user_id,
            'tags' => $request->tags,
            
        ]);

        if ($video) {
            $success = true;
        }

        return redirect()->route('home')->with('success', $success);
    }
}
