<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="<?php echo e(url('/home')); ?>">Surveys</a></li>
                        <li><a href="<?php echo e(url('/question')); ?>">Questions</a></li>
                        <li><a href="<?php echo e(url('/reports')); ?>">Reports</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <?php echo $__env->make('questions.surwayslist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>