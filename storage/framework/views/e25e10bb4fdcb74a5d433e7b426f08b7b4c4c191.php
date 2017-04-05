<div class="panel panel-default">
    <div class="panel-heading">
        List of Survay
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="/creatsurvay">New Survay</a>
                <?php if( !is_null( $survays) ): ?>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Survay name</th>
                                <th>Description</th>
                                <th><span class="pull-right">Edit</span></th>
                                <th><span class="pull-right">Delete</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $__currentLoopData = $survays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th scope="row"><?php echo e($survay->id); ?></th>
                                    <td><a href="<?php echo e("/test/$survay->id"); ?>"><?php echo e($survay->name); ?></a></td>
                                    <td><?php echo e($survay->description); ?></td>
                                    <td><a href="<?php echo e("/editsurvay/{$survay->id}"); ?>"><span class="glyphicon glyphicon-pencil pull-right"></span></a></td>
                                    <td><a href=<?php echo e("/deletesurvay/{$survay->id}"); ?>><span class="glyphicon glyphicon-trash  pull-right"></span> </a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h3>Your list of survays is empty. Please create new one.</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

