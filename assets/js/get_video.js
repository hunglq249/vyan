$(document).ready(function(){
	getVideo();

	muteVideo();
});

var $tvc = $('#tvc');

function getVideo(){
	$tvc.vide({
		mp4: HOSTNAME + 'assets/video/tvc.mp4'
	},{
		volume: 1,
		muted: false,
		loop: true,
		posterType: 'detect'
	});

	//$tvc.append('<button id="btnMute"><i class="fas fa-volume-up"></i></button>');
}

function muteVideo(){
	var $btn_muted = $tvc.find('#btnMute');
	var $video = $tvc.find('video');

	$btn_muted.on('click', function(){
		$btn_muted.find('i').toggleClass('fa-volume-mute fa-volume-up');

		if($video.muted === false){
			$video.muted = true
		} else {
			$video.muted = false
		}
	})
}
