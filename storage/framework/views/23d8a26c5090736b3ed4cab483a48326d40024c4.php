<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">DASHBOARD</div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>                    
                    <p class="h3">Blog Posts <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-dark btn-sm float-right" title="">NEW POST</a></p>
                    <?php if(count($posts)>0): ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">POST</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($post->id); ?></th>
                                <td><?php echo e($post->title); ?></td>
                                <td><a href="<?php echo e(route('posts.edit',$post)); ?>" title="" class="btn btn-dark btn-sm float-right">EDIT</a></td>
                                <td>
                                <a href="#" class="btn btn-secondary btn-sm" onclick="event.preventDefault(); document.getElementById('delete-post').submit();" title="">DELETE</a>
    <form id="delete-post" action="<?php echo e(route('posts.destroy',$post)); ?>" class="d-none" method="post" accept-charset="utf-8"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <p class="lead">You have no posts!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\url\resources\views/dashboard.blade.php ENDPATH**/ ?>