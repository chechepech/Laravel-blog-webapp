<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
    	<div class="bg-white py-3 px-4 shadow rounded">    	
		<h1 class="display-4 text-center">POSTS</h1>
		<hr>
		<?php if(count($posts)>0): ?>
			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="well">
				<img class="img-fluid img-thumbnail" src="<?php echo e(asset('images').'/'.$post->image_url); ?>" alt="">
				<h3><a href="<?php echo e(route('posts.show',$post)); ?>" title=""><?php echo e($post->title); ?></a></h3>
				<small>Written on <?php echo e($post->created_at->diffForHumans()); ?> by <?php echo e($post->user->name); ?></small>		
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php echo e($posts->links()); ?>

		<?php else: ?>
		<p class="lead">No posts FOUND!</p>
		<?php endif; ?>
	</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\url\resources\views/posts/index.blade.php ENDPATH**/ ?>