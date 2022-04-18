<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="display-comment">
        <?php if($comment->user_id): ?>
        <strong><?php echo e($comment->user->name); ?></strong>
        <?php else: ?>
        <strong>Anon</strong>
        <?php endif; ?>
        <p><?php echo e($comment->comment); ?></p>
        <a href="" id="reply"></a>
        <form method="post" action="<?php echo e(route('reply.add')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <textarea name="comment" class="form-control" cols="40" rows="1" minlength="2" maxlength="1000" required></textarea>
                <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="hidden" name="post_id" value="<?php echo e($post_id); ?>" />
                <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>" />
                <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
            </div>
        </form>

        <?php echo $__env->make('frontend.partials.replies', ['comments' => $comment->replies], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/bjl/Documents/Metetials/blog1/laravel-microblog/resources/views/frontend/partials/replies.blade.php ENDPATH**/ ?>