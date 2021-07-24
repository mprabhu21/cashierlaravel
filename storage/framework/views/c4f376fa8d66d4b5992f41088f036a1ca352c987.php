<?php $__env->startSection('content'); ?>
<style>
    .content {
        text-align: center;
    }    
    .title {
        font-size: 24px;
        padding-top: 10px;
    }
</style>
<div class="content">
        <div class="title m-b-md">
            My Orders
        </div>
    </div>
    <hr />
<section class="py-5">    
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Currency</th>
                    <th>Receipt</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->product->product_name); ?></td>
                    <td><?php echo e($order->stripe_price / 100); ?></td>
                    <td><?php echo e($order->stripe_currency); ?></td>
                    <td><a href="<?php echo e($order->stripe_receipt_url); ?>">Receipt</a></td>
                    <td><?php echo e($order->stripe_status); ?></td>
                </tr>							
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($orders) == 0): ?>
                <tr>
                    <td colspan="5" align="center">No Records Found.</td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="d-flex justify-content-center">
                <?php echo $orders->links(); ?>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>