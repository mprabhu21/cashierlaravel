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
            Product Detail
        </div>
    </div>
    <hr />
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-2 row-cols-xl-12 justify-content-center">
                
               <div class="col-xs-4 item-photo">
                    <img style="max-width:100%;" src="https://ak1.ostkcdn.com/images/products/8818677/Samsung-Galaxy-S4-I337-16GB-AT-T-Unlocked-GSM-Android-Cell-Phone-85e3430e-6981-4252-a984-245862302c78_600.jpg" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo e($product->product_name); ?> - <?php echo e($product->product_code); ?></h3>    
                    <h5 style="color:#337ab7"><a href="#"><?php echo e($product->product_name); ?></a> · <small style="color:#337ab7">(<?php echo e(array_rand(range(1000, 15000))); ?> reviews)</small></h5>
        
                    <!-- Precios -->
                    <h6 class="title-price"><small>Offer Price</small></h6>
                    <h3 style="margin-top:0px;">₹ <?php echo e($product->product_price); ?></h3>
        
                    <!-- Detalles especificos del producto -->
                    <div class="section">
                        <h6 class="title-attr" style="margin-top:15px;" ><small>COLOR</small></h6>                    
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr"><small>White</small></h6>                    
                        <div>
                            <div class="attr2">16 GB</div>
                            <div class="attr2">32 GB</div>
                        </div>
                    </div>                    
        
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><a href="/purchase/<?php echo e($product->id); ?>"> Buy Now</a></button>
                    </div>                                        
                </div>
            
        </div>        
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>