<!DOCTYPE html>
<html>
<head>
	<title>sogn</title>

</head>
<body>

	<input type="text" name="link" id="link" value="{{$id}}"><br>
	<p></p>
	<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div id="player"></div>

    <script>
    	// $(document).ready(function(){});
    		// 2. This code loads the IFrame Player API code asynchronously.
    		
	      
    </script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		var link = $('#link').val();
    		$('p').text(link);

    		var tag = document.createElement('script');

	      tag.src = "https://www.youtube.com/iframe_api";
	      var firstScriptTag = document.getElementsByTagName('script')[0];
	      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	      // 3. This function creates an <iframe> (and YouTube player)
	      //    after the API code downloads.
	      // var player;
	      // function onYouTubeIframeAPIReady(){

	      // }
	      window.onYouTubeIframeAPIReady=function() {
	        player = new YT.Player('player', {
	          height: '390',
	          width: '640',
	          videoId: link,
	          events: {
	            'onReady': onPlayerReady,
	            'onStateChange': onPlayerStateChange
	          }
	        });
	        
	      }

	      // 4. The API will call this function when the video player is ready.
			function onPlayerReady(event) {
			event.target.playVideo();
			}

			// 5. The API calls this function when the player's state changes.
			//    The function indicates that when playing a video (state=1),
			//    the player should play for six seconds and then stop.
			var done = false;
			function onPlayerStateChange(event) {
			// if (event.data == YT.PlayerState.PLAYING && !done) {

			//   done = true;
			// }
				if(event.data == 0){
					// player.cueVideoById({videoId:'ptyxHsR8acY'});
					// player.playVideo();
					window.location.replace("index");
				}
			}
	      	
    	});
    </script>
</body>
</html>