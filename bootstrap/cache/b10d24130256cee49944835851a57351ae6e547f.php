<div class="grid-x grid-margin-x">
    <div class="cell large-12 medium-12 small-12">
        <?php if(@count($errors)): ?>
            <div class="callout alert" data-closable>
                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_array): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $error_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error_item); ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if(isset($success) || \App\Classes\Session::has('success')): ?>
            <div class="callout success" data-closable>
                <?php if(isset($success)): ?>
                    <?php echo e($success); ?>

                <?php elseif(\App\Classes\Session::has('success')): ?>
                    <?php echo e(\App\Classes\Session::flash('success')); ?>

                <?php endif; ?>

                <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/mazhar/www/practice/php/eTrade/resources/views/includes/message.blade.php ENDPATH**/ ?>