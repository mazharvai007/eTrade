<?php $__env->startSection('title', 'Manage Inventory'); ?>
<?php $__env->startSection('data-page-id', 'adminProduct'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Start Category Display -->
    <div class="products grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <h2>Manage Inventory Items</h2>
                <hr>
            </div>
        </div>

        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <a href="/admin/product/create" class="button float-right">
                    <i class="fa fa-plus"></i> Add New Product
                </a>
            </div>
        </div>

        <div class="grid-x grid-margin-x">
            <div class="cell large-12 small-12 medium-12">
                <?php if(count($products)): ?>
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Sub-Category</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <img src="/<?php echo e($product['image_path']); ?>" alt="<?php echo e($product['name']); ?>" width="40" height="40">
                                    </td>
                                    <td><?php echo e($product['name']); ?></td>
                                    <td><?php echo e($product['price']); ?></td>
                                    <td><?php echo e($product['quantity']); ?></td>
                                    <td><?php echo e($product['category_name']); ?></td>
                                    <td><?php echo e($product['sub_category_name']); ?></td>
                                    <td><?php echo e($product['added']); ?></td>
                                    <td>
                                        <span data-tooltip class="top" tabindex="2" title="Edit Product">
                                           <a href="/admin/product/<?php echo e($product['id']); ?>/edit"><i class="fa fa-edit"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <!-- Display Pagination -->
                    <?php echo $links; ?>

                <?php else: ?>
                    <h3>You have not created any products</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- End Category Display -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mazhar/www/practice/php/eTrade/resources/views/admin/products/inventory.blade.php ENDPATH**/ ?>