<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Post</th>
                    <th>Published On</th>
                    <th>Likes</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo $loop->iteration; ?></td>
                        <td><?php echo $post->title; ?></td>
                            <td><?php echo (strlen($post->content) > 300) ? substr($post->content,0,300).'...' : $post->content; ?></td>
                            <td><?php echo date("F jS, Y", strtotime($post->created_at)); ?></td>
                            <td>
                            <div class="reaction">
                                <a class="btn text-green"><i class="fa fa-thumbs-up"></i> <?php echo e($post->likes); ?></a>
                                <a class="btn text-red"><i class="fa fa-thumbs-down"></i> <?php echo e($post->dislikes); ?></a>
                            </div>
                            </td>
                            <td>
                                <a href="<?php echo e(route('front.show', $post->id)); ?>" class="btn btn-sm btn-outline-primary py-0" style="font-size: 0.8em;">Read Post</a>
                                <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="btn btn-sm btn-outline-success py-0" style="font-size: 0.8em;">Edit Post</a>
                                <form action="<?php echo e(route('post.destroy', $post->id)); ?>" method="POST">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger py-0">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>

                <?php echo $posts->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bjl/Documents/Metetials/blog1/laravel-microblog/resources/views/admin/post/index.blade.php ENDPATH**/ ?>