<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/public/favicon.ico" type="image/x-icon">
		<title>Camagru - <?php if ($match_route->_name != null) echo $match_route->_name; ?></title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		<link href="/public/all.css" rel="stylesheet">
	</head>
<body class="Site">
	<nav class="navbar" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item" href="<?= $fullDomain ; ?>"><?php require $root.'/public/img/logo.html'; ?></a>
			<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>
		<div id="navbarBasicExample" class="navbar-menu">
			<div class="navbar-start">
					<a class="navbar-item" href="/galery"  >Galerie</a>
					<a class="navbar-item" href="/my-galery" >Ma page</a>
					<a class="navbar-item" href="/montage" >Montage</a>
		</div>
		<div class="navbar-end">
			<div class="navbar-item">
				<div class="buttons">
					<?php if ($auth === true) { ?>
					<a class="button is-primary" href="/my-account"> <strong> My account</strong></a>
					<a class="button is-light" href="/sign-out">Log out</a>
					<?php } else { ?>
					<a class="button is-primary" href="/sign-up"><strong> Sign-Up</strong></a>
					<a class="button is-light"   href="/sign-in">Sign-In</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</nav>


<section   class="section Site-content"   >

<div id="notification">
</div>

<script>
function notification(text){
	notif = document.getElementById("notification");
	var element = document.createElement("div");
	element.className = "notification"
	element.innerHTML = "<p>"+text+"</p>";
	notif.appendChild(element);
}
</script>



<script>
document.addEventListener('DOMContentLoaded', () => {
  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {
    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {
        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  }
});
</script>

