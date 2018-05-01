<?php $__env->startSection('action-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new client</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('client.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('client_name') ? ' has-error' : ''); ?>">
                            <label for="client_name" class="col-md-4 control-label">Client Name</label>

                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control" name="client_name" value="<?php echo e(old('client_name')); ?>" required autofocus>

                                <?php if($errors->has('client_name')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('client_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('client_code') ? ' has-error' : ''); ?>">
                            <label for="client_code" class="col-md-4 control-label">Client Code</label>

                            <div class="col-md-6">
                                <input id="client_code" type="text" class="form-control" name="client_code" value="<?php echo e(old('client_code')); ?>" required>
                                <?php if($errors->has('client_code')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('client_code')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('client_desc') ? ' has-error' : ''); ?>">
                            <label for="client_desc" class="col-md-4 control-label">Client Description</label>

                            <div class="col-md-6">
                                <input id="client_desc" type="text" class="form-control" name="client_desc" value="<?php echo e(old('client_desc')); ?>" required>
                                <?php if($errors->has('client_desc')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('client_desc')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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

<?php echo $__env->make('system-mgmt.client.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>