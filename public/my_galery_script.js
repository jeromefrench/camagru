
var xmlhttp = new XMLHttpRequest();

function add_image_on_side(src){
	var formdata = new FormData();
	formdata.append('file', src);
	xmlhttp.open("POST", "image.php");
	/* xmlhttp.setRequestHeader('Content-Type', 'multipart/form-data'); */
	xmlhttp.send(formdata);
}

	var xmlhttp2 = new XMLHttpRequest();

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
		const side = document.querySelector("#side");
		side.appendChild(img2);
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


const constraints = {
  	video: true
};
const video = document.querySelector('video');
navigator.mediaDevices.getUserMedia(constraints).  then((stream) => {video.srcObject = stream});
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
	add_image_on_side(canvas.toDataURL('image/png'));
  	/* img.src = canvas.toDataURL('image/webp'); */
};
/* function handleSuccess(stream) { */
/*   screenshotButton.disabled = false; */
/*   video.srcObject = stream; */
/* } */
