<?php $__env->startSection('header_style'); ?>
<style>
    body{margin-top:20px;}

/*==================================================
  Post Contents CSS
  ==================================================*/

.post-content{
  background: #f8f8f8;
  border-radius: 4px;
  width: 100%;
  border: 1px solid #f1f2f2;
  margin-bottom: 20px;
  overflow: hidden;
  position: relative;
}

.post-content img.post-image, video.post-video, .google-maps{
  width: 100%;
  /*height: auto;*/
  height: 400px;
}

.post-content .google-maps .map{
  height: 300px;
}

.post-content .post-container{
  padding: 20px;
}

.post-content .post-container .post-detail{
  margin-left: 65px;
  position: relative;
}

.post-content .post-container .post-detail .post-text{
  line-height: 24px;
  margin: 0;
}

.post-content .post-container .post-detail .reaction{
  position: absolute;
  right: 0;
  top: 0;
}

.post-content .post-container .post-detail .post-comment{
  display: inline-flex;
  margin: 10px auto;
  width: 100%;
}

.post-content .post-container .post-detail .post-comment img.profile-photo-sm{
  margin-right: 10px;
}

.post-content .post-container .post-detail .post-comment .form-control{
  height: 30px;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
  margin: 7px 0;
  min-width: 0;
}

img.profile-photo-md {
    height: 50px;
    width: 50px;
    border-radius: 50%;
}

img.profile-photo-sm {
    height: 40px;
    width: 40px;
    border-radius: 50%;
}

.text-green {
    color: #8dc63f;
}

.text-red {
    color: #ef4136;
}

.following {
    color: #8dc63f;
    font-size: 12px;
    margin-left: 20px;
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="post-content">
            
            <?php if(!empty($post)): ?>
              <!-- <img src="https://via.placeholder.com/400x150/FFB6C1/000000" alt="post-image" class="img-responsive post-image"> -->
              <img  class="img-responsive post-image" src="<?php echo e(asset('images/posts/'.$post->image)); ?>" alt='No Image'/>
              <div class="post-container">
              <h3 style="text-align: center;"><?php echo e($post->title); ?></h3>
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left">
                <div class="post-detail">
                  <div class="user-info">
                    <h5><span class="profile-link"><?php echo ucfirst($post->user->name??'Nil'); ?></span> <span class="following"></span></h5>
                    <p class="text-muted">Published on <?php echo $post->created_at; ?></p>
                  </div>
                  <div class="reaction">
                  <?php if(isset(Auth::user()->role)): ?>
                    <?php if(Auth::user()->role == 'admin'): ?>
                    <a href="<?php echo e(route('post.edit',$post->id)); ?>"><input type="button" value="Edit Post" class="btn btn-sm btn-outline-success py-0" style="font-size: 0.8em;"></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('user_post.edit',$post->id)); ?>"><input type="button" value="Edit Post" class="btn btn-sm btn-outline-success py-0" style="font-size: 0.8em;"></a>
                    <?php endif; ?>
                  <?php endif; ?>
                  
                    <a class="btn text-green"><i data-action='like' data-id = "<?php echo $post->id; ?>" class="like-dislike fa fa-thumbs-up"></i> <span id="like_count_<?php echo $post->id; ?>"><?php echo $post->likes; ?></span></a>
                    <a class="btn text-red"><i data-action='dislike' data-id = "<?php echo $post->id; ?>" class="like-dislike fa fa-thumbs-down"></i><span id="dislike_count_<?php echo $post->id; ?>"><?php echo $post->dislikes; ?></span></a>
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-text">
                    <p><?php echo nl2br($post->content); ?> <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                  </div>

                  <?php if(isset($post->comments)): ?>
                  <div class="line-divider"></div>
                      <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="post-comment" id="comment_<?php echo e($comment->id); ?>">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="profile-photo-sm">
                        <p><span class="profile-link"><b><?php echo $comment->user->name??'Nil'; ?></b> </span><i class="em em-laughing"></i> <span id="backend_comment_<?php echo e($comment->id); ?>"> - <?php echo e($comment->comment); ?></span> 
                        </br><small class="text-muted"><?php echo $comment->created_at; ?></small></p>
                        <?php if( isset(Auth::user()->id) && Auth::user()->id == $comment->user_id): ?>
                          &nbsp&nbsp&nbsp<a data-id="<?php echo e($comment->id); ?>" class="pull-right fa fa-edit edit_my_comment"></a>
                        <?php endif; ?>
                      </div>

                    <div id="edit_comment_<?php echo e($comment->id); ?>" style="display:none">
                      <div class="post-comment"  >
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm">
                        <input type="text" id="new_comment_<?php echo e($comment->id); ?>" name="new_comment_<?php echo e($comment->id); ?>" class="form-control" value="<?php echo e($comment->comment); ?>">
                        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>" />
                      </div>
                      
                      <div class="post-comment">
                      <input data-id="<?php echo e($comment->id); ?>" type="submit" class="submit_edit btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Update Comment" />
                      &nbsp&nbsp<input data-id="<?php echo e($comment->id); ?>" type="submit" class="cancel_edit btn btn-sm btn-outline-info py-0" style="font-size: 0.8em;" value="Cancel" />
                      
                      </div>
                    </div>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>

                  <?php if(auth()->guard()->guest()): ?>
                  login to post a comment
                  <?php else: ?>
                    <form method="post" action="<?php echo e(route('comment.add')); ?>">
                              <?php echo csrf_field(); ?>
                      <div class="post-comment">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm">
                        <input type="text" name="comment" class="form-control" placeholder="Post a comment">
                        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>" />
                      </div>
                      
                      <div class="post-comment">
                      <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Post Comment" />
                      </div>
                      
                    </form>
                    <?php endif; ?>
                </div>
              </div>
            
            
            <?php else: ?>
            <div class="post-container text-center">
             Post Removed By User.
             </div>
            <?php endif; ?>
            
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_script'); ?>
<script> 


jQuery(document).ready(function(){
    jQuery('.like-dislike').click(function(e){
      var data_id = $(this).attr("data-id");
      var action = $(this).attr("data-action");

      e.preventDefault();
      $.ajax({
        dataType: 'json',
        type:'POST',
        url:"<?php echo e(route('post.like_dislike')); ?>",
        data:{  "_token": "<?php echo e(csrf_token()); ?>",action:action, data_id:data_id },
        success:function(data){
          if(!data.status){
            alert(data.message)
          } else {
            $("#like_count_"+data_id).html(data.message.likes);
            $("#dislike_count_"+data_id).html(data.message.dislikes);
          }
          }
        });
    });

    jQuery('.edit_my_comment').click(function(e){

      var data_id = $(this).attr("data-id");
 
      $("#comment_"+data_id).hide();
      $("#edit_comment_"+data_id).show();
    });

    jQuery('.cancel_edit').click(function(e){

      var data_id = $(this).attr("data-id");

      $("#comment_"+data_id).show();
      $("#edit_comment_"+data_id).hide();
    });

    jQuery('.submit_edit').click(function(e){

      var data_id = $(this).attr("data-id");
      var comment = $("#new_comment_"+data_id).val();

      e.preventDefault();
      $.ajax({
        dataType: 'json',
        type:'POST',
        url:"<?php echo e(route('post.update_comment')); ?>",
        data:{  "_token": "<?php echo e(csrf_token()); ?>",comment:comment, data_id:data_id },
        success:function(data){
          if(!data.status){
            alert(data.message)
          } else {
            $("#comment_"+data_id).show();
            $("#edit_comment_"+data_id).hide();
            $("#backend_comment_"+data_id).html(data.message);
          }
          }
        });
    });

   

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bjl/Documents/Metetials/blog1/laravel-microblog/resources/views/frontend/single.blade.php ENDPATH**/ ?>