<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Stom Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist_plyr/plyr.css">
</head>
<body>

{{--<div class="plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls" id="player">--}}
{{--    <iframe--}}
{{--        src="https://www.youtube.com/embed/bTqVqk7FSmY?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"--}}
{{--        allowfullscreen--}}
{{--        allowtransparency--}}
{{--        allow="autoplay"--}}
{{--    ></iframe>--}}
{{--</div>--}}

<div id="player" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY" class="plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls"></div>



<script src="/dist_plyr/plyr.js"></script>
<script>
    const player = new Plyr('#player');
</script>
</body>
</html>
