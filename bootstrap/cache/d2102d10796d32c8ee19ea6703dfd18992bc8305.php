<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('data-page-id', 'home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="home cell large-12 medium-12 small-12">
                <section class="hero">
                    <div class="hero-slider">
                        <div><img src="/images/sliders/slide_1.jpg" alt="eTrade"></div>
                        <div><img src="/images/sliders/slide_2.jpg" alt="eTrade"></div>
                        <div><img src="/images/sliders/slide_3.jpg" alt="eTrade"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mazhar/www/practice/php/eTrade/resources/views/home.blade.php ENDPATH**/ ?>