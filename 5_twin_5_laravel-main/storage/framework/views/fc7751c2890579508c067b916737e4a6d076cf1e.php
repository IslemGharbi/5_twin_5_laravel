<?php $__env->startSection('title', 'Create'); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!-- page title -->

    <!-- contact us start-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content p-4">
                        <h5>Contact Us</h5>
                        <h1 class="pt-3">Hello, what's on your mind?</h1>
                        <p class="pt-3 pb-5">Want to get in touch? We'd love to hear from you. Fill up the form to reach
                            us...</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php if(Session::has('message_sent')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(Session::get('message_sent')); ?>

                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('contact.send')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input type="text" name="name" placeholder="Name *" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="email" name="email" placeholder="Email *" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <textarea name="message" id="" name="message" placeholder="Message *"
                                class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                            <div class="btn-grounp">
                                <button type="submit" class="btn btn-primary mt-2 float-right">SUBMIT</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.freelancer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/contact.blade.php ENDPATH**/ ?>