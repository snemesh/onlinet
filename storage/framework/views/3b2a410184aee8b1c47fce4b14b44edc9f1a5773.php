<div class="panel panel-default">
    <div class="panel-heading">
        List of questions
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <a href="/createquestion">New question</a>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Qestion</th>
                            <th>Description</th>
                            <th>Right answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $questionList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($question->id); ?></th>
                                <td><?php echo e($question->question_name); ?></td>
                                <td><?php echo e($question->description); ?></td>
                                <td><?php echo e($question->answer); ?></td>
                                <td><a href=<?php echo e("/delete/{$question->id}"); ?>>Delete </a><a href="<?php echo e("/edit/{$question->id}"); ?>">Edit</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

