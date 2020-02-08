<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mg-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissable fade show" role="alert"><?php echo e(session('success')); ?><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
</div>
<?php endif; ?>
<?php if(session('error')): ?>
<div class="alert alert-danger">
		<?php echo e(session('error')); ?>

</div>
<?php endif; ?><?php /**PATH C:\AppServ\www\url\resources\views/message.blade.php ENDPATH**/ ?>