<?php echo Form::open(['action' => 'QuestionController@correctQuestionAndAnsers']); ?>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="panel panel-default">

    <div class="panel-heading">
        Edit the question...
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <form role="form" action="">
                    <div class="form-group">
                        <label for="">Edit your question:</label>
                        <input type="hidden" name="id" value="<?php echo e($editQuestion->id); ?>">
                        <input type="text" class="form-control" name="editquestion" value="<?php echo e($editQuestion->question_name); ?>">
                        <p class="help-block">We will store this question on the database</p>
                    </div>
                    <div class="form-group">
                        <label for="">Please correct the description for the question:</label>
                        <textarea type="text" class="form-control" name="editdiscription"><?php echo e($editQuestion->description); ?></textarea>
                        <p class="help-block">We will store this chenges on the database</p>
                    </div>
                    <div>
                        <div class="form-group">
                            <a class="list-group-item active">
                                Answers for the questions:
                            </a>
                            <a class="list-group-item">
                                <div class="panel-body">
                                    <div class="row">

                                        <?php $__currentLoopData = $editAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editAnswer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" name=<?php echo e("idOfAnswer".$editAnswer->id); ?> value="<?php echo e($editAnswer->id); ?>">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Edit answer option1"
                                                                 name=<?php echo e("answer".$editAnswer->id); ?> value="<?php echo e($editAnswer->users_anwser); ?>">
                                            </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Edit the right answer:</label>
                        <input class="form-control" name="right_answer" placeholder="Enter anwer" value="<?php echo e($editQuestion->answer); ?>">
                    </div>
                    <a class="btn btn-primary pull-left" href='/question'>Back</a>
                    <button type="submit" class="btn btn-primary pull-right">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo Form::token() . Form::close(); ?>


