var xmlhttp = new XMLHttpRequest();
var xmlhttp2 = new XMLHttpRequest();
<<<<<<< HEAD

function addFilter(src, filter, type){
=======
const constraints = {
  	video: true
};

function add_image_on_side(src, filter, type){
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
	var formdata = new FormData();
	console.log(src);
	formdata.append('file', src);
	formdata.append('filter', filter);
	formdata.append('type', type);
	xmlhttp.open("POST", "image.php");
	/* xmlhttp.setRequestHeader('Content-Type', 'multipart/form-data'); */
	xmlhttp.send(formdata);
}

xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		console.log(this);
		const img2 = document.createElement("img");

		img2.src = "image_3.png";
		var string = this.responseText.replace(/[\n\t\r]/g,"").trim();
		console.log("salut");
		console.log(string);
		img2.src = string;
		console.log(img2.scr);
		// img2.id = "imgscreenshot";


	side.insertBefore(img2, side.firstChild);

		var formdata2 = new FormData();
		formdata2.append('file2', string);
		formdata2.append('login', login);
		xmlhttp2.open("POST", "image2.php");
		xmlhttp2.send(formdata2);
	}
};

xmlhttp2.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200)
	{
		console.log("hello");
		console.log(this.responseText);
	}
};

function on_creer_le_bouton(photo_bool)
{
	const screenshotButton = document.querySelector('#screenshot-button');
	const canvas = document.createElement('canvas');
	const photo_elem = document.querySelector('#photo');

	screenshotButton.style.display = "inline";
	screenshotButton.onclick = video.onclick = function() {
		console.log(photo_bool);
		if (photo_bool == 1)
		{
  			canvas.width = photo.videoWidth;
  			canvas.height = photo.videoHeight;
  			canvas.getContext('2d').drawImage(photo, 0, 0);
		}
		else
		{
  			canvas.width = video.videoWidth;
  			canvas.height = video.videoHeight;
  			canvas.getContext('2d').drawImage(video, 0, 0);
		}
<<<<<<< HEAD
		//get the filter name
=======
		//get the filter nameh
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
		if (document.getElementById('r1').checked) {
  			filter = document.getElementById('r1').value;
		}
		else if (document.getElementById('r2').checked) {
  			filter = document.getElementById('r2').value;
		}
		else if (document.getElementById('r3').checked) {
  			filter = document.getElementById('r3').value;
		}
		else if (document.getElementById('r4').checked) {
  			filter = document.getElementById('r4').value;
		}
		if (photo_bool == 1)
		{
<<<<<<< HEAD
			addFilter("/photo_upload/"+login, filter, "photo");
		}
		else
		{
			addFilter(canvas.toDataURL('image/png'), filter, "webcam");
=======
			add_image_on_side("/photo_upload/"+login, filter, "photo");
		}
		else
		{
			add_image_on_side(canvas.toDataURL('image/png'), filter, "webcam");
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
		}
	};
}
