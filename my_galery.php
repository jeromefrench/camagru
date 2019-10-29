<?php
if ($_SESSION['logon'] == false)
{
	echo "Please register before use";
	return;
}
?>


<h1>My galery</h1>
<div id="my_galery">
	<div id="main">
		<?php include 'pastille.html';?>
		<?php include 'video.html';?>
	</div>
	<?php include 'side.html';?>
</div>

<script>

function add_image_on_side(src){
	const img2 = document.createElement("img");
	img2.src = src;
	img2.id = "imgscreenshot";
	const side = document.querySelector("#side");
	side.appendChild(img2);
}

const constraints = {
  video: true
};

const video = document.querySelector('video');

navigator.mediaDevices.getUserMedia(constraints).
	  then((stream) => {video.srcObject = stream});

/* const captureVideoButton = document.querySelector('#screenshot .capture-button'); */
const screenshotButton = document.querySelector('#screenshot-button');

/* const img = document.querySelector('#imgscreenshot'); */
const canvas = document.createElement('canvas');

/* captureVideoButton.onclick = function() { */
/*   navigator.mediaDevices.getUserMedia(constraints). */
/*     then(handleSuccess).catch(handleError); */
/* }; */

screenshotButton.onclick = video.onclick = function() {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  // Other browsers will fall back to image/png

add_image_on_side(canvas.toDataURL('image/webp'));


  /* img.src = canvas.toDataURL('image/webp'); */
};

/* function handleSuccess(stream) { */
/*   screenshotButton.disabled = false; */
/*   video.srcObject = stream; */
/* } */
</script>

