<!DOCTYPE html>
<html>
<head>
    <title>Micro Bloging</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('style.css')); ?>">
    <?php echo $__env->yieldContent('header_style'); ?>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            Home
        </a>
        <!-- Left Side Of Navbar -->
        <?php if( isset(Auth::user()->role) && Auth::user()->role == 'admin'): ?>
        <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('posts')); ?>"><?php echo e(__('Posts')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('post.create')); ?>"><?php echo e(__('New post')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('comments')); ?>"><?php echo e(__('Comments')); ?></a>
                        </li>
                    </ul>
        <?php else: ?>
        <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('user_posts')); ?>"><?php echo e(__('My Posts')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('user_post.create')); ?>"><?php echo e(__('New post')); ?></a>
                        </li>
                        
        </ul>
        <?php endif; ?>
        

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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" >
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
    </div>
</nav>
<main class="py-4">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">This is a blog on Laravel 7</h1>
            <p class="lead">Well, I should create a new blog from scratch on Laravel 8. What am I waiting for? :)</p>
        </div>
    </div>
</div>
</div>
<?php echo $__env->yieldContent('footer_script'); ?>
</body>
</html>

<?php /**PATH /home/bjl/Documents/Metetials/blog1/laravel-microblog/resources/views/layouts/front.blade.php ENDPATH**/ ?>