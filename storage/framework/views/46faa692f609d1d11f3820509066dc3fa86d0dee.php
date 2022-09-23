
 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
 
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Title</th>
										<th>Description</th>
										<th>Document</th>
										<th>Is Approved</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $guestbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $guestbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$key); ?></td>
											<td><?php echo e($guestbook->title); ?></td>
											<td><?php echo e($guestbook->description); ?></td>
											<td><?php if('' != $guestbook->document): ?> <a target="_blank" href="<?php echo e(asset('images/' . $guestbook->document )); ?>">View Document</a> <?php else: ?> - <?php endif; ?></td>
											<td><?php echo e($guestbook->is_approved ? 'Approved' : 'Pending'); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('guestbooks.destroy',$guestbook->id)); ?>" method="POST">
                                                    <?php if($guestbook->is_approved): ?>  
                                                    <a class="btn btn-sm btn-primary" href="javascript:void(0);">Approved</a>
                                                    <?php else: ?>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('guestbooks.adminApprove',$guestbook->id)); ?>"><i class="fa fa-check-square-o" aria-hidden="true"></i> Approve</a>
                                                    <?php endif; ?>

                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\www\Laravel\LaraMulti\resources\views/adminHome.blade.php ENDPATH**/ ?>