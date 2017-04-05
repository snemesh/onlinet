<?php $__env->startSection('content'); ?>

    <?php echo Form::open(['createlink'=>'createlink']); ?>


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <a class="list-group-item active">
                                    Current suray: <?php echo e($Survey->name); ?>

                                </a>
                                <div class="list-group-item">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="">Survey's link:</label>
                                            <input type="text" class="form-control" name="survey_link"
                                                   value="<?php echo e($encodeLink); ?>">
                                            <p class="help-block">This test will be avalible <?php echo e($validTime); ?> minutes by defoult</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description for the survey:</label>
                                            <textarea type="text" class="form-control" name="discription">
                                                <?php echo e($Survey->description); ?>

                                            </textarea>
                                            <p class="help-block">You can use this survey with the link only one time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary pull-left" href="/home">Back</a>
                            <button id="checkid" type="submit" class="btn btn-primary pull-right">Save link</button>
                            <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    <?php echo Form::token() . Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>