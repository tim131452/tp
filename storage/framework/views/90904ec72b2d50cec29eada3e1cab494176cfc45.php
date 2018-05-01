<?php $__env->startSection('action-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update department</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('department.update', ['id' => $department->id])); ?>">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($department->name); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('dept_head') ? ' has-error' : ''); ?>">
                            <label for="dept_head" class="col-md-4 control-label">Department Head</label>

                            <div class="col-md-6">
                                <input id="dept_head" type="text" class="form-control" name="dept_head" value="<?php echo e($department->dept_head); ?>" required autofocus>

                                <?php if($errors->has('dept_head')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('dept_head')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('system-mgmt.department.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>