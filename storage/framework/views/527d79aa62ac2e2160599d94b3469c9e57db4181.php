<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">	
	<title><?php echo e(config('app.name','Blog')); ?></title>
	<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
	<div id="app" class="d-flex h-screen justify-content-between flex-column">
		<header id="header" class="">
		<?php echo $__env->make('nav.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>			
		<?php echo $__env->make('message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</header><!-- /header -->		
		<main class="py-3">
			<?php echo $__env->yieldContent('content'); ?>
		</main>
		<footer class="bg-white text-center text-black-50 py-3 shadow">
			<?php echo e(config('app.name')); ?> | Copyright @ <?php echo e(date('Y')); ?>

		</footer>			
	</div>
	<script src="<?php echo e(asset('js/app.js')); ?>" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8" defer>
	ClassicEditor .create(document.querySelector('#editor')) .catch(error => {console.error(error);});
	</script>
	<script type="text/javascript" charset="utf-8">document.querySelector('.custom-file-input').addEventListener('change',function(e){var fileName = document.getElementById('CustomFile').files[0].name;var nextSibling = e.target.nextElementSibling; nextSibling.innerText = fileName;});
	</script>
</body>
</html<?php /**PATH C:\AppServ\www\url\resources\views/layouts/app.blade.php ENDPATH**/ ?>