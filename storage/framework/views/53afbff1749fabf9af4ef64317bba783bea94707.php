<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
          <?php echo e(config('app.name', 'BLOG')); ?>

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('/about')); ?>">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('/services')); ?>">SERVICES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('posts.index')); ?>">BLOG</a>
      </li>

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            <?php if(auth()->guard()->guest()): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
              </li>
              <?php if(Route::has('register')): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                </li>
              <?php endif; ?>
            <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(url('/dashboard')); ?>" title="">DASHBOARD</a>
                </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                  </form>
                </div>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav><?php /**PATH C:\AppServ\www\url\resources\views/nav/navbar.blade.php ENDPATH**/ ?>