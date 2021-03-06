<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role & Permission
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('user-management/role')); ?>"><i class="fa fa-dashboard"></i> User Management</a></li>
        <li class="active">Role & Permission</li>
      </ol>
    </section>
    <?php echo $__env->yieldContent('action-content'); ?>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>