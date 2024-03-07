<div class="container">
    @if ($videos->count())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($videos as $video)
                <div class="col rounded overflow-hidden shadow-sm border border-gray-200 m-2">
                    @if ($video->thumbnail_path)
                        <!-- Added an ID to the image for JavaScript -->
                        <img src="{{ asset('storage/'.$video->thumbnail_path) }}" class="w-full h-48 object-cover video-thumbnail" alt="{{ $video->title }} Thumbnail" data-video="{{ asset('storage/'.$video->original_file_path) }}">
                    @else
                        <img src="{{ asset('thumbnails/placeholder.jpg') }}" class="w-full h-48 object-cover video-thumbnail" alt="Placeholder Thumbnail">
                    @endif
                    <!-- <div class="p-6 bg-pink">
                        <a href="#" class="px-3 py-2 text-white bg-blue-500 hover:bg-blue-700 rounded-md watch-video">Watch Video</a>
                    </div> -->
                    <div class="col rounded overflow-hidden shadow-sm  ">
                    <div class="p-6">
                        <h5 class="card-title text-xl font-bold leading-tight">{{ $video->title }}</h5>
                        <p class="card-text text-gray-700">{{ Str::limit($video->description, 100) }}</p>
                    </div>
                </div>
                </div>
                
                <!-- Card for title and description -->
                
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No videos found.</div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentlyPlaying = null; // Variable to store the currently playing video

        // Get all video thumbnails
        var thumbnails = document.querySelectorAll('.video-thumbnail');

        // Add click event listener to each thumbnail
        thumbnails.forEach(function(thumbnail) {
    thumbnail.addEventListener('click', function() {
        // Get the video source from the data attribute
        var videoSource = thumbnail.getAttribute('data-video');

        // Check if there is a currently playing video
        if (currentlyPlaying) {
            // Pause the currently playing video
            currentlyPlaying.pause();
        }

        // Create a video element dynamically
        var videoElement = document.createElement('video');
        videoElement.setAttribute('controls', true);

        // Create a source element for the video
        var sourceElement = document.createElement('source');
        sourceElement.setAttribute('src', videoSource);
        sourceElement.setAttribute('type', 'video/mp4');

        // Append the source element to the video element
        videoElement.appendChild(sourceElement);

        // Replace the thumbnail with the video element
        thumbnail.parentNode.replaceChild(videoElement, thumbnail);

        // Play the video
        videoElement.play();

        // Set the currently playing video to the new video element
        currentlyPlaying = videoElement;

        // Add an event listener to remove the video element when playback ends
        videoElement.addEventListener('ended', function() {
            // Create a new thumbnail image element
            var thumbnailImage = document.createElement('img');
            thumbnailImage.setAttribute('src', thumbnail.getAttribute('src'));
            thumbnailImage.setAttribute('class', thumbnail.getAttribute('class'));
            thumbnailImage.setAttribute('alt', thumbnail.getAttribute('alt'));
            thumbnailImage.setAttribute('data-video', thumbnail.getAttribute('data-video'));

         
        });
    });
});

    });
</script>