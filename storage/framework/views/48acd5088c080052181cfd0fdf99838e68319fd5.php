<?php $__env->startSection('content'); ?>
	<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
    	<div class="bg-white py-3 px-4 shadow rounded">
		<h1 class="display-4 text-center"><?php echo e($post->title); ?></h1>
		<hr>
		<img class="img-fluid img-thumbnail" src="<?php echo e(asset('images').'/'.$post->image_url); ?>" alt="">
		<div><?php echo $post->body; ?></div>
		<small>Written on <?php echo e($post->created_at->diffForHumans()); ?> by <?php echo e($post->user->name); ?></small><br>
		<?php if(!Auth::guest()): ?>
			<?php if(Auth::user()->id == $post->user_id): ?>
				<a href="<?php echo e(route('posts.edit',$post)); ?>" class="btn btn-dark btn-sm" title="">EDIT</a>	
				<a href="<?php echo e(route('posts.destroy',$post)); ?>" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('delete-post').submit();" title="">DELETE</a>
				<form id="delete-post" action="<?php echo e(route('posts.destroy',$post)); ?>" class="d-none" method="post" accept-charset="utf-8"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
			<?php endif; ?>
		<?php endif; ?>
		<a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary btn-sm float-right" title="">Go Back</a>
		</div>
	</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\url\resources\views/posts/show.blade.php ENDPATH**/ ?>