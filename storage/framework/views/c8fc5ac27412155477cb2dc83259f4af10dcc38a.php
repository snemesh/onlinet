<?php echo Form::open(['testing'=>'createlink']); ?>


<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a class="list-group-item active">
                        Current question:
                    </a>
                    <div class="list-group-item">
                        <div class="panel-body">
                            <div class="row">
                                <span><?php echo e($questions->question_name); ?></span>
                                <input type="hidden" name="question_id" value="<?php echo e($questions->id); ?>">
                                <ul>
                                    <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answerforquestion" id="answer" value=<?php echo e($answer->id); ?>>
                                                <?php echo e($answer->users_anwser); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button id="checkid" type="submit" class="btn btn-primary pull-right">Save answer</button>
                <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
            </div>
        </div>
    </div>


<?php echo Form::token() . Form::close(); ?>



