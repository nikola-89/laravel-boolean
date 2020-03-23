<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="https://www.boolean.careers/images/favicon/favicon.ico" type="image/x-icon">
	<title>Boolean</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<script src="{{asset('js/app.js')}}"></script>
</head>

<body>
	<header>
		<div class="container-fluid">
			<nav class="boolean__navbar">
				<a class="boolean__navbar__logo" href="#">
					<img src="https://www.boolean.careers/images/common/logo.png" alt="Boolean Careers">
				</a>
				<ul class="boolean__navbar__items">
					<li class="boolean__navbar__items__item">
						<a class="nav-link {{(request()->is('/')) ? 'active' : ''}}" href="{{route('static_page.home')}}">Home</a>
					</li>
					<li class="boolean__navbar__items__item">
						<a class="nav-link" href="">Corso</a>
					</li>
					<li class="boolean__navbar__items__item">
						<a class="nav-link {{(request()->is('carriere')) ? 'active' : ''}}" href="{{route('student.index')}}">Dopo il corso</a>
					</li>
					<li class="boolean__navbar__items__item">
						<a class="nav-link" href="">Lezione Gratuita</a>
					</li>
					<li class="boolean__navbar__items__item boolean__navbar__button">
						<a class="nav-link" href="">Candidati ora</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>