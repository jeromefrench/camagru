<div class="columns">
	<div class="column  is-1">
	</div>
	<div class="column  is-7" >
		<div class="columns" id="pastille">
			<div class="column is-one-quarter">
				<figure class="image is-4by3">
					<img src="/public/img/coeur.png"/>
				</figure>
				<input id="r1" type="radio" checked="checked" name="radio" value="coeur.png">
			</div>
			<div class="column is-one-quarter">
				<figure class="image is-4by3">
					<img src="/public/img/spider.png"/>
				</figure>
				<input id="r2" type="radio" name="radio" value="spider.png">
			</div>
			<div class="column is-one-quarter">
				<figure class="image is-4by3">
					<img src="/public/img/wings.png"/>
				</figure>
				<input id="r3" type="radio" name="radio" value="wings.png">
			</div>
			<div class="column is-one-quarter">
				<figure class="image is-4by3">
				<img src="/public/img/cadre.png"/>
				</figure>
				<input id="r4" type="radio" name="radio" value="cadre.png">
			</div>
		</div>

<div id="cam">

	<div id="the_form">
	</div>

<?php if (isset($answer) && isset($answer['uploadPic']) && $answer['uploadPic'] == true){  ?>
	<figure class="image">
		<img id="picUploaded" src="/public/photo_upload/<?= $login ; ?>" >
	</figure>
<div class="control  has-text-centered" style="margin-top:20px;">
	<input type="button" class="button is-link" name="screenShot" value="Take ScreenShot" id="screenshot-button">
</div>

<script>
		const screenshotButton = document.getElementById("screenshot-button");
		const canvas = document.createElement('canvas');
		const photo = document.getElementById("picUploaded");
		screenshotButton.onclick = function() {
  			canvas.width = photo.videoWidth;
  			canvas.height = photo.videoHeight;
  			canvas.getContext('2d').drawImage(photo, 0, 0);
			filter = getFilterName();
			addFilter("/photo_upload/"+login, filter, "photo");
		}
</script>



<?php }?>

</div>

</div>

<div class="column  is-3">
	<div id="side">
	</div>
</div>
<div class="column  is-1">
</div>

</div>

<script type="text/javascript" > var login = '<?php echo $login; ?>'; </script>

<script type="text/javascript" >
	var xmlhttp = new XMLHttpRequest();
	var askForm = new XMLHttpRequest();

	const constraints = {
		video: true
	};

	askForm.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var the_form_div = document.querySelector('#the_form');
			const divElem = document.createElement("div");
			divElem.innerHTML = this.responseText;
			the_form_div.append(divElem);
	console.log("hello world")
	elem = document.getElementById("file")
	console.log(elem);
	elem.onchange = function() {
		console.log("je submit");
		document.getElementById("form").submit();
	};
		}
	}

	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		var cam = document.querySelector('#cam');
		cam.innerHTML = '<video style="margin-left: auto; margin-right: auto; display: block;" autoplay></video>';
		cam.innerHTML += '<div class="control  has-text-centered" style="margin-top:20px;"><input type="button" class="button is-link" name="screenShot" value="Take ScreenShot" id="screenshot-button"></div>';
		var video = document.querySelector('video');
		video.srcObject = stream;

		const screenshotButton = document.getElementById("screenshot-button");
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
		askForm.open("POST", "/public/formulaire_up.php");
		askForm.send();
});

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
		pic.src = "/public/"+src;
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
		xmlhttp.open("POST", "/public/image.php");
		/* xmlhttp.setRequestHeader('Content-Type', 'multipart/form-data'); */
		xmlhttp.send(formdata);
	}

	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var src = this.responseText.replace(/[\n\t\r]/g,"").trim();
			addOnSide(src);
		}
	}

</script>
