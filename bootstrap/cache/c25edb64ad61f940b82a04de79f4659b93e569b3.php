<?php $__env->startSection('title', 'Edit Product'); ?>
<?php $__env->startSection('data-page-id', 'adminProduct'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Start Product Display -->
    <div class="edit-product grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <h2>Edit <?php echo e($product->name); ?></h2>
                <hr>
            </div>
        </div>

        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <form method="post" action="/admin/product/edit" enctype="multipart/form-data">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Name:
                        <input type="text" name="name" value="<?php echo e($product->name); ?>">
                    </label>
                </div>
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Price:
                        <input type="text" name="price" placeholder="Product Price" value="<?php echo e($product->price); ?>">
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Category:
                        <select name="category" id="product-category">
                            <option value="<?php echo e($product->category->id); ?>">
                                <?php echo e($product->category->name); ?>

                            </option>

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </label>
                </div>
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Subcategory:
                        <select name="subcategory" id="product-subcategory">
                            <option value="<?php echo e($product->subCategory->id); ?>">
                                <?php echo e($product->subCategory->name); ?>

                            </option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Quantity:
                        <select name="quantity">
                            <option value="<?php echo e($product->quantity); ?>">
                                <?php echo e($product->quantity); ?>

                            </option>

                            <?php for($i = 1; $i <= 50; $i++): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                    </label>
                </div>
                <div class="cell small-12 medium-6 large-6">
                    <br>
                    <div class="input-group">
                        <span class="input-group-label">Product Image</span>
                        <input class="input-group-field" type="file" name="productImage">
                    </div>
                </div>

                <div class="cell small-12">
                    <label>Product Description:
                        <textarea name="description" placeholder="Write the product description"><?php echo e($product->description); ?></textarea>
                    </label>
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <input class="button success" type="Submit" value="Update Product">
                </div>
            </div>
        </form>

    </div>
    <!-- End Product Display -->

    <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mazhar/www/practice/php/eTrade/resources/views/admin/products/edit.blade.php ENDPATH**/ ?>