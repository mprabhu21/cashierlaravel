<?php $__env->startSection('content'); ?>

<style>
    .alert.parsley {
        margin-top: 5px;
        margin-bottom: 0px;
        padding: 10px 15px 10px 15px;
    }
    .check .alert {
        margin-top: 20px;
    }
    .credit-card-box .panel-title {
        display: inline;
        font-weight: bold;
    }
    .credit-card-box .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 100%;
    }
    .credit-card-box .display-tr {
        display: table-row;
    }
    .content {
        text-align: center;
    }
    .label {
        text-align: left;
    }
    .title {
        font-size: 24px;
        padding-top: 10px;
    }
</style>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="panel-body">
    <div class="col-md-12">
        <div class="content">
            <div class="title m-b-md">
                Stripe Payment
            </div>
        </div>
        <hr />
        <div class="content" >
            <div class="col-md-2" style="float: left;"></div>
            <div class="col-md-4"  style="float: left;">
                <div class="col-md-12 label"><h4><?php echo e($product->product_name); ?> - <?php echo e($product->product_code); ?></h4></div>
                <hr />
                <div class="col-md-12 label"><h4> </h4></div>
                <div class="col-md-12 label"><h6><?php echo e($product->product_description); ?></h6></div>
                <div class="col-md-12 label"><h4>₹<?php echo e($product->product_price); ?></h4></div>
                <div class="col-md-12 label"><h4>Quantity : <?php echo e($product->product_quantity); ?></h4></div>
            </div>            
            <div class="col-md-3" style="float: left;">
    <?php echo Form::open(['url' => route('order-post'), 'data-parsley-validate', 'id' => 'payment-form']); ?>

        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong><?php echo e($message); ?></strong>
        </div>
        <?php endif; ?>                
        <div class="form-group" id="cc-group">
            <?php echo Form::label(null, 'Credit card number:'); ?>

            <?php echo e(Form::hidden('product_id', $product->id)); ?>            
            <input type="hidden" name="payment_method" value="card" class="payment-method">
            <?php echo Form::text(null, null, [
                'class'                         => 'form-control',
                'required'                      => 'required',
                'data-stripe'                   => 'number',
                'data-parsley-type'             => 'number',
                'maxlength'                     => '16',
                'data-parsley-trigger'          => 'change focusout',
                'data-parsley-class-handler'    => '#cc-group'
                ]); ?>

        </div>
        <div class="form-group" id="ccv-group">
            <?php echo Form::label(null, 'CVC (3 or 4 digit number):'); ?>

            <?php echo Form::text(null, null, [
                'class'                         => 'form-control',
                'required'                      => 'required',
                'data-stripe'                   => 'cvc',
                'data-parsley-type'             => 'number',
                'data-parsley-trigger'          => 'change focusout',
                'maxlength'                     => '4',
                'data-parsley-class-handler'    => '#ccv-group'
                ]); ?>

        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group" id="exp-m-group">
                <?php echo Form::label(null, 'Ex. Month'); ?>

                <?php echo Form::selectMonth(null, date('m'), [
                    'class'                 => 'form-control',
                    'required'              => 'required',
                    'data-stripe'           => 'exp-month'
                ], '%m'); ?>

            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group" id="exp-y-group">
                <?php echo Form::label(null, 'Ex. Year'); ?>

                <?php echo Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                    'class'             => 'form-control',
                    'required'          => 'required',
                    'data-stripe'       => 'exp-year'
                    ]); ?>

            </div>
            </div>
        </div>
            <div class="form-group">
                <?php echo Form::submit('Place order!', ['class' => 'btn btn-lg btn-block btn-primary btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']); ?>

            </div>
            <div class="row">
            <div class="col-md-12">
                <span class="payment-errors" style="color: red;margin-top:10px;"></span>
            </div>
            </div>
        <?php echo Form::close(); ?>

        </div>
        <div class="col-md-2"></div>
        </div>
            <script>
                window.ParsleyConfig = {
                    errorsWrapper: '<div></div>',
                    errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
                    errorClass: 'has-error',
                    successClass: 'has-success'
                };
            </script>
            
            <script src="http://parsleyjs.org/dist/parsley.js"></script>
            
            <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
            <script>
                Stripe.setPublishableKey("<?php echo env('STRIPE_PUBLISHABLE_SECRET') ?>");
                jQuery(function($) {
                    $('#payment-form').submit(function(event) {                
                        var $form = $(this);
                        $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
                            formInstance.submitEvent.preventDefault();
                            alert();
                            return false;
                        });
                        $form.find('#submitBtn').prop('disabled', true);
                        Stripe.card.createToken($form, stripeResponseHandler);
                        return false;
                    });
                });
                function stripeResponseHandler(status, response) {
                    var $form = $('#payment-form');
                    if (response.error) {
                        $form.find('.payment-errors').text(response.error.message);
                        $form.find('.payment-errors').addClass('alert alert-danger');
                        $form.find('#submitBtn').prop('disabled', false);
                        $('#submitBtn').button('reset');
                    } else {
                        var token = response.id;
                        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                        $form.get(0).submit();
                    }
                };
            </script>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>