<?php $__env->startSection('template_title'); ?>
    <?php echo e($guestbook->name ?? 'Show Guestbook'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('guestbooks.index')); ?>">Guestbooks</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Guestbook</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="<?php echo e(route('guestbooks.index')); ?>"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            <?php echo e($guestbook->user_id); ?>

                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            <?php echo e($guestbook->title); ?>

                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            <?php echo e($guestbook->description); ?>

                        </div>
                        <div class="form-group">
                            <strong>Document:</strong>
                            <?php echo e($guestbook->document); ?>

                        </div>
                        <div class="form-group">
                            <strong>Is Approved:</strong>
                            <?php echo e($guestbook->is_approved); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\www\Laravel\LaraMulti\resources\views/guestbook/show.blade.php ENDPATH**/ ?>