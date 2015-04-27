// Custom settings for video player
jQuery(document).ready(function ($) {
	console.log('Loaded');

	
	// Fullscreen when video plays
	$('.wp-video-shortcode').on("play", function() {
	    this.player.enterFullScreen();
	    console.log(this.player);
	    console.log('Play');
	});

	// Exit fullscreen when video pauses
	$('.wp-video-shortcode').on("pause", function() {
	    this.player.exitFullScreen();
	    console.log('Pause');
	});

	// Control for switching movie source
	$('.control a').click(function(){
		console.log('clicked');
        var $url = $( this ).attr( 'data-bind' );
        $('.wp-video-shortcode').attr( "src", $url );
        $('.wp-video-shortcode source').attr( "src", $url );
        console.log($url);
        return false;
    });

	// Play the movie when the user chooses an option
    $('.wp-video-shortcode').on("canplay", function(){
    	var $player = this.player;
        $('.control a').click(function(){
            $player.play();
        });
    });
});