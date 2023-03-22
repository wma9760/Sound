<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Dashboard | Miraculous-Tempor consequat Re </title>
    <link rel="shortcut icon" href="{{ url('frontend/images/sites/favicon.png') }}">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
    integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
     html {
  height: 100%;
  height: 100vh;
  padding: 0;
}
body ,.player-wrapper,.js-player,.player-wrapper .plyr video,
 .player-wrapper .plyr iframe, .player-wrapper .plyr__video-wrapper video, .player-wrapper .plyr__video-wrapper iframe, .player-wrapper
 .plyr__poster video, .player-wrapper .plyr__poster iframe{
  min-height: 100%;
  height: 100vh;
  padding: 0;
  @foreach ($data as $vedio)

  background:transparent url({{$vedio->vedioimage}}) no-repeat 0 0;
  -webkit-background-size:cover !important;
  -moz-background-size:cover !important;
  -o-background-size:cover !important;
  background-size:cover !important;

  @endforeach
}


    </style>
</head>
<body>
    @foreach ($data as $vedio)
<div class="player-wrapper container-fluid">

        <video poster="{{$vedio->vedioimage}}" class="js-player" id="myVideo"
          autoplay controls  width="100%">
            <source src="/frontend/storage/vedio/{{$vedio->vedio}}"/></video>
            </div>
    @endforeach
</body>
<script>
var x = document.getElementById("myVideo").autoplay;

// document.addEventListener('DOMContentLoaded', () => {
//      const controls = [
//          controls
//         // 'play-large', // The large play button in the center
//         // 'restart', // Restart playback
//         // 'rewind', // Rewind by the seek time (default 10 seconds)
//         // 'play', // Play/pause playback
//         // 'fast-forward', // Fast forward by the seek time (default 10 seconds)
//         // 'progress', // The progress bar and scrubber for playback and buffering
//         // 'current-time', // The current time of playback
//         // 'duration', // The full duration of the media
//         // 'mute', // Toggle mute
//         // 'volume', // Volume control
//         // 'captions', // Toggle captions
//         // 'settings', // Settings menu
//         // 'pip', // Picture-in-picture (currently Safari only)
//         // 'airplay', // Airplay (currently Safari only)
//         // 'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
//         // 'fullscreen' // Toggle fullscreen
//     ];
//     const player = Plyr.setup('.js-player', { controls  });


// });


</script>
</html>