<?php echo Form::open(['/creatsurvay'=>'creatsurvay']); ?>


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
        Creating new survay...
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Enter name for the survay:</label>
                        <input type="text" class="form-control" name="survayname">
                        <p class="help-block">This survay will store on the database</p>
                    </div>
                    <div class="form-group">
                        <label for="">Enter description for the survay:</label>
                        <textarea type="text" class="form-control" name="survaydiscription"></textarea>
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
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Qestion</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <input id="checkquestion" type="checkbox" value=<?php echo e($question->id); ?>>
                                                </td>
                                                <td>
                                                    <?php echo $question->question_name; ?>

                                                </td>
                                                <td>

                                                    <a href="#" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
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



