

<form id="the-form" action="image.php" enctype="multipart/form-data">
<input type="text" name="testa">
  <input name="file" type="file">
  <input type="submit" value="Upload" />
</form>




<script>

var form = document.getElementById('the-form');

  var xhr = new XMLHttpRequest();


form.onsubmit = function() {
  var formData = new FormData(form);
  /* formData.append('myfile', file); */

  // Add any event handlers here...
  xhr.open('POST', form.getAttribute('action'), true);
  xhr.send(formData);


  return false; // To avoid actual submission of the form
}


xhr.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		console.log(this);

	}
};

</script>
