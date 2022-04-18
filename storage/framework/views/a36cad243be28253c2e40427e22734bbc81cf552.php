<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <th>#</th>
                    <th>Notification</th>
                    <th>Published On</th>
                    <th>View Status</th>
                    <th>View Post</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($post->text); ?></td>
                            <td><?php echo date("F jS, Y", strtotime($post->created_at)); ?></td>
                            <td>
                            <?php if($post->notification_viewed): ?>
                                Viewed
                            <?php else: ?>
                                Not Viewed
                            <?php endif; ?>


                            </td>

                            <td><a target="_blank" href="<?php echo e(route('update_notification',$post->id)); ?>"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>

                <?php echo $notifications->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bjl/Documents/Metetials/blog1/laravel-microblog/resources/views/user/post/notifications.blade.php ENDPATH**/ ?>