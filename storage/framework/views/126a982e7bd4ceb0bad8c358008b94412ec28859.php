<?php echo Form::open(['/editsurvay'=>'editsurvay']); ?>


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
        Edit your survey
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Edit name for the survey:</label>
                        <input type="text" class="form-control" name="survayname" value=<?php echo e($editSurvey->name); ?>>
                        <p class="help-block">This changes will store on the database</p>
                    </div>
                    <div class="form-group">
                        <label for="">Correct description for the survey:</label>
                        <textarea type="text" class="form-control" name="survaydiscription"><?php echo e($editSurvey->discription); ?></textarea>
                        <p class="help-block">We will store this description on the database</p>
                    </div>
                    <div>
                        <div class="form-group">
                            <a class="list-group-item active">
                                List of questions:
                            </a>
                            <div class="list-group-item">
                                <div class="panel-body">
                                    <div class="row">

                                        <?php if( isset($editSurveyQuestions[0]) ): ?>

                                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php $__currentLoopData = $editSurveyQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editSurveyQuestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <input checked id="checkquestion" type="checkbox" name="editSurveyQuestion" value=<?php echo e($editSurveyQuestion->id); ?> >
                                                    </td>
                                                    <td>
                                                        <?php echo $editSurveyQuestion->question_name; ?>

                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary pull-right" href= <?php echo "/edit/$editSurveyQuestion->id"; ?> >View Question</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                        <?php else: ?>
                                            <div class="alert alert-warning" >
                                                <h5>
                                                    <p class="text-center">
                                                        You haven't questions for this survey, please delete it and create new one.
                                                    </p>
                                                </h5>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary pull-left" href="/home">Back</a>
                    
                    <button id="checkid" type="submit" class="btn btn-primary pull-right">Save survay</button>
                    <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
            </div>
        </div>
    </div>
</div>

<?php echo Form::token() . Form::close(); ?>



