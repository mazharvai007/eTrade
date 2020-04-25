<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="dashboard">
        <div class="row expanded">
            <h2>Dashboard</h2>
            <?php echo e($admin); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mazhar/www/practice/php/eTrade/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>