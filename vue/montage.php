<div class="columns">
	<div class="column  is-1"  style="border:solid 2px red;"   >
		ONE
	</div>
	<div class="column  is-7     "   style="border:solid 2px red;" >
		HEIGHT

		<div class="columns" id="pastille">
			<div class="column is-one-quarter">
				<figure class="image is-4by3">
					<img src="img/coeur.png"/>
				</figure>
				<input id="r1" type="radio" checked="checked" name="radio" value="img/coeur.png">
			</div>
			<div class="column is-one-quarter">
				<figure class="image is-4by3">
					<img src="img/spider.png"/>
				</figure>
				<input id="r2" type="radio" name="radio" value="img/spider.png">
			</div>
			<div class="column is-one-quarter">
				<figure class="image is-4by3">
					<img src="img/wings.png"/>
				</figure>
				<input id="r3" type="radio" name="radio" value="img/wings.png">
			</div>
			<div class="column is-one-quarter"  style="border:solid 2px red;"  >
				<figure class="image is-4by3"  style="border:solid 2px green;" >
				<img src="img/cadre.png"/>
				</figure>
				<input id="r4" type="radio" name="radio" value="img/cadre.png">
			</div>
		</div>

<div id="cam">

</div>

	
</div>

	<!-- <canvas style="display:none;"></canvas> -->
	<!-- <form enctype="multipart/form-data" method="post" action=/montage> -->
		<!-- <p style="display:none" id="get_file"> -->
			<!-- Veuillez choisir une photo de vous</br> -->
			<!-- <input type="file" name="myFile"></br> -->
			<!-- <input type="submit" name="submit"> -->
		<!-- </p> -->
		<!-- <input style="display:none" type="button" name="screenShot" value="Take ScreenShot" id="screenshot-button"> -->
	<!-- </form> -->

<div class="column  is-3"   style="border:solid 2px red;" >
	<div id="side">
	</div>
</div>
<div class="column  is-1"  style="border:solid 2px red;">
</div>

</div>

<script type="text/javascript" >

	var xmlhttp = new XMLHttpRequest();

	function getFilterName(){
		if (document.getElementById('r1').checked) {
			return filter = document.getElementById('r1').value;
		}
		else if (document.getElementById('r2').checked) {
			return filter = document.getElementById('r2').value;
		}
		else if (document.getElementById('r3').checked) {
			return filter = document.getElementById('r3').value;
		}
		else if (document.getElementById('r4').checked) {
			return filter = document.getElementById('r4').value;
		}
	}

	function addOnSide(src){
		var side = document.querySelector('#side');
		const pic = document.createElement("img");
		pic.src = src;
		var figure = document.createElement("figure");
		figure.class = "image is-4by3";
		figure.append(pic);
		side.insertBefore(figure, side.firstChild);
	}

	function addFilter(src, filter, type){
		var formdata = new FormData();
		formdata.append('file', src);
		formdata.append('filter', filter);
		formdata.append('type', type);
		xmlhttp.open("POST", "image.php");
		/* xmlhttp.setRequestHeader('Content-Type', 'multipart/form-data'); */
		xmlhttp.send(formdata);
	}

	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var src = this.responseText.replace(/[\n\t\r]/g,"").trim();
			addOnSide(src);
		}
	}

	const constraints = {
		video: true
	};


	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		var cam = document.querySelector('#cam');
		cam.innerHTML = '<video style="margin-left: auto; margin-right: auto; display: block;" autoplay></video>';
		cam.innerHTML += '<input type="button" name="screenShot" value="Take ScreenShot" id="screenshot-button">';
		var video = document.querySelector('video');
		video.srcObject = stream;

		const screenshotButton = document.querySelector('#screenshot-button');
		const canvas = document.createElement('canvas');

		screenshotButton.onclick = video.onclick = function() {
			canvas.width = video.videoWidth;
			canvas.height = video.videoHeight;
			canvas.getContext('2d').drawImage(video, 0, 0);
			filter = getFilterName();
			addFilter(canvas.toDataURL('image/png'), filter, "webcam");
		}
	}).catch(function(err) {
		console.log("lutilisateur a refuser");

//ajouter le formulaire

	});
</script>
