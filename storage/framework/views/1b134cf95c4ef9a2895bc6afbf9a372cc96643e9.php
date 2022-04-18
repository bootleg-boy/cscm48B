<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <?php if($errors->any()): ?>
  <div class="alert alert-danger">
  <ul>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li><?php echo e($error_message); ?></li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul> 
  </div>
  <?php endif; ?>
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">

                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <form enctype="multipart/form-data" method="post" action="<?php echo e(route('post.update', $post->id)); ?> ">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo e($post->title); ?>"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="6" required><?php echo e($post->content); ?></textarea>
                                </div>
                                <div class="form-group">
                                <img style="width:100px;height:100px" class="img-responsive post-image" src="<?php echo e(asset('images/posts/'.$post->image)); ?>" alt='No Image'/>
                                <input type="file" class="form-control" name="post_image"/>
                                <br>
                                <div class="alert alert-info">
                                    Recommended image size: 400px x 150px<br>
                                    Recommended image formats: jpeg,png,jpg<br>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Update"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bjl/Documents/Metetials/blog1/laravel-microblog/resources/views/admin/post/edit.blade.php ENDPATH**/ ?>