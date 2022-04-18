  

<style>
.jumbotron {
    width:100%
}
.lef-image {

    width: 150px;
    height: 100px;
    float: right;    
    margin: 0 0 0 15px;
}

.content-contaner-right{
  background-color:#ddd;
  min-height:250px;
  position: relative
}

table{
  position: absolute; 
  top: 50%; 
  left: 50%; 
  transform: translate(-50%, -50%); 
  height:100%;
  width:100%;
}

td{
  text-align:center;
}
</style>

<?php $__env->startSection('content'); ?>

<?php if(count($posts)): ?>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="container">
            <div class="row ">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="jumbotron">
                    <h3 style="text-align: center;"><?php echo e($post->title); ?></h3>
                    <img class="lef-image" src="<?php echo e(asset('images/posts/'.$post->image)); ?>" alt='No Image'/>
                        <p align="justify" class="lead"><?php echo (strlen($post->content) > 400) ? substr($post->content,0,400).'...' : $post->content; ?></p>
                        <a href="<?php echo e(route('front.show',$post->id)); ?>"
                                   class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">Show Post</a>
                                   <br>
                                   <span class="pull-right">Posted By <?php echo e(ucfirst($post->user->name)); ?> on <?php echo e(date("F jS, Y", strtotime($post->created_at))); ?>

                                   
                                   &nbsp;&nbsp;&nbsp;
                                   <i data-action='like' data-id = "<?php echo $post->id; ?>" class="like-dislike fa fa-thumbs-up"></i> <span id="like_count_<?php echo $post->id; ?>"><?php echo $post->likes; ?></span>
                                    <i data-action='dislike' data-id = "<?php echo $post->id; ?>" class="like-dislike fa fa-thumbs-down"></i><span id="dislike_count_<?php echo $post->id; ?>"><?php echo $post->dislikes; ?></span>
                                   </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php echo $posts->links(); ?>

            
        </div>
    </div>
</div>
<?php else: ?>
<div class="content-contaner-right">                            
  <table>
    <tr>
      <td >No Data Found</td>
    </tr>
  </table>  
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bjl/Documents/Metetials/blog1/laravel-microblog/resources/views/frontend/index.blade.php ENDPATH**/ ?>