<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Survey: <?php echo e($survey->name); ?> for <?php echo e($responderName); ?>

                    <span class="pull-right" id="my_timer" style="color: #5194d5; font-size: 150%; font-weight: bold;">00:00:<?php echo e($respondTime); ?></span>
                </div>

                <div class="panel-body">
                    <?php echo $__env->make('questions.showtest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>