<?php $__env->startSection('title'); ?>
Forum
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div style="margin-left: 120px;margin-right: 120px;">
    <a href="/create" class="btn btn-primary" >New Thread</a>
    <br><br>
    <div class="list-group">
    	<?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<?php echo e($content->topic); ?>

    	  <div href="#" class="list-group-item" >
    	    <span class="pull-right"><?php echo e($content->created_at->diffForHumans()); ?></span>
	        <h4 class="list-group-item-heading"><?php echo e($content->user->name); ?></h4>
	        <p class="list-group-item-text"><?php echo e($content->content); ?></p>
	        <br>
	      </div>
	      <p>Comments</p>
	      <div style="margin-left: 50px;">
		    <?php $__currentLoopData = $content->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<div href="#" class="list-group-item" style="height: 30%;">
		    	    <span class="pull-right"><?php echo e($comment->created_at->diffForHumans()); ?></span>
			        <h4 class="list-group-item-heading"><?php echo e($comment->user); ?></h4>
			        <p class="list-group-item-text"><?php echo e($comment->comment); ?></p>
			        <br>
			    </div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	    <form class="form-horizontal form-inline " action="/comment" method="post" style="margin-top: 5px;">

	     <?php echo e(csrf_field()); ?>

	     	<input type="hidden" name="post_id" value="<?php echo e($content->id); ?>">
		    <input class="form-control" name="comment" type="text" style="width: 65%; margin-left: 50px;"> 
		    <input class="btn" type="submit" value="Comment" style="width: 28%;">
    	</form>
    	<br>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>