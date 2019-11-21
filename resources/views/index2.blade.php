<!DOCTYPE html>
<html>
<head>
	<title>SONG</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
	<div class="player-container">
    	<div id="player"></div>
    	<div class="request">
    		<a href="request">Request a song</a>
    	</div>
	</div>
 	<div id="msg"></div>

	{{-- <button onclick="getMessage()"> click</button>
	<button onclick="getID()">getid</button>
 --}}
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
    	var idd;
    	function getMessage() {
	            $.get('getmsg',function(data){
	            	$('#msg').html(data);
	            });
	         }

	    function getID(){
	    	idd =  document.getElementById("msg").textContent;
	    	document.getElementById("get").innerHTML = idd;
	    } 

    	$(document).ready(function(){
    		var tag = document.createElement('script');
		    tag.src = "https://www.youtube.com/iframe_api";
		    var firstScriptTag = document.getElementsByTagName('script')[0];
		    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	      // 3. This function creates an <iframe> (and YouTube player)
	      //    after the API code downloads.
		    window.onYouTubeIframeAPIReady=function() {
		        player = new YT.Player('player', {
					width: '640',
					videoId:'Uiso9XERHGA',
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
			function onPlayerStateChange(event) {
				//check if event data change
				if(event.data == 0){

					//Using AJAX to get videoID 
					$.get('getmsg',function(data){
		            	//pass the ID of video into a div
		            	$('#msg').html(data);
		            	//pass the ID value to variable
		            	idd =  document.getElementById("msg").textContent;
		            	//queue and play video 
		    			player.cueVideoById({videoId:idd});
						player.playVideo();
						
		            });

				}
			}
    	});
    </script>
</body>
</html>