<?php $__env->startSection('title', 'Create Product'); ?>
<?php $__env->startSection('data-page-id', 'adminProduct'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Start Product Display -->
    <div class="add-product grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <h2>Add Inventory Item</h2>
                <hr>
            </div>
        </div>

        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <form method="post" action="/admin/product/create" enctype="multipart/form-data">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Name:
                        <input type="text" name="name" placeholder="Product Name" value="<?php echo e(\App\Classes\Request::old('post', 'name')); ?>">
                    </label>
                </div>
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Price:
                        <input type="text" name="price" placeholder="Product Price" value="<?php echo e(\App\Classes\Request::old('post', 'price')); ?>">
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Category:
                        <select name="category" id="product-category">
                            <option value="<?php echo e(\App\Classes\Request::old('post', 'category') ? : ''); ?>">
                                <?php echo e(\App\Classes\Request::old('post', 'category') ? : '---Select Category---'); ?>

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
                            <option value="<?php echo e(\App\Classes\Request::old('post', 'subcategory') ? : ''); ?>">
                                <?php echo e(\App\Classes\Request::old('post', 'subcategory') ? : '---Select SubCategory---'); ?>

                            </option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Quantity:
                        <select name="quantity">
                            <option value="<?php echo e(\App\Classes\Request::old('post', 'quantity') ? : ''); ?>">
                                <?php echo e(\App\Classes\Request::old('post', 'quantity') ? : '---Select Quantity---'); ?>

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
                        <textarea name="description" placeholder="Write the product description"><?php echo e(\App\Classes\Request::old('post', 'description')); ?></textarea>
                    </label>
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <button class="button alert" type="reset">Reset</button>
                    <input class="button success" type="Submit" value="Save Product">
                </div>
            </div>
        </form>

    </div>
    <!-- End Product Display -->

    <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mazhar/www/practice/php/eTrade/resources/views/admin/products/create.blade.php ENDPATH**/ ?>