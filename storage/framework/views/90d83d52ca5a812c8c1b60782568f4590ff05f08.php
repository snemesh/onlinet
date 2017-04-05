<div class="panel panel-default">
    <div class="panel-heading">
        Report
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">

                <?php if( !is_null( $reports) ): ?>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Responder name</th>
                                <th>Survey name</th>
                                <th>Total Questions</th>
                                <th>Total Right Answers</th>
                                <th>Percent of Right Answers, %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th scope="row"><?php echo e($key); ?></th>
                                    <td><?php echo e($report['responderName']); ?></td>
                                    <td><?php echo e($report['survey']); ?></td>
                                    <td><?php echo e($report['TotalQuestions']); ?></td>
                                    <td><?php echo e($report['TotalRightAnswers']); ?></td>
                                    <td><?php echo e(round($report['percentage'],1)); ?>%</td>


                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h3>We don't have any results.</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

