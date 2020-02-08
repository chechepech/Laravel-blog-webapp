<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{csrf_token()}}">	
	<title>{{config('app.name','Blog')}}</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div id="app" class="d-flex h-screen justify-content-between flex-column">
		<header id="header" class="">
		@include('nav.navbar')			
		@include('message')
		</header><!-- /header -->		
		<main class="py-3">
			@yield('content')
		</main>
		<footer class="bg-white text-center text-black-50 py-3 shadow">
			{{config('app.name')}} | Copyright @ {{date('Y')}}
		</footer>			
	</div>
	<script src="{{asset('js/app.js')}}" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8" defer>
	ClassicEditor .create(document.querySelector('#editor')) .catch(error => {console.error(error);});
	</script>
	<script type="text/javascript" charset="utf-8">document.querySelector('.custom-file-input').addEventListener('change',function(e){var fileName = document.getElementById('CustomFile').files[0].name;var nextSibling = e.target.nextElementSibling; nextSibling.innerText = fileName;});
	</script>
</body>
</html