<div class="box box-info padding-2">
    <div class="box-body padding-2">
        <?php echo e(Form::hidden('user_id', auth()->user()->id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id'])); ?>

        <div class="form-group">
            <?php echo e(Form::label('title')); ?>

            <?php echo e(Form::text('title', $guestbook->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title'])); ?>

            <?php echo $errors->first('title', '<div class="invalid-feedback">:message</div>'); ?>

        </div><br/>
        <div class="form-group">
            <?php echo e(Form::label('description')); ?>

            <?php echo e(Form::textArea('description', $guestbook->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description'])); ?>

            <?php echo $errors->first('description', '<div class="invalid-feedback">:message</div>'); ?>

        </div><br/>
        <div class="form-group">
            <?php echo e(Form::label('document')); ?>

            <?php echo e(Form::file('document', ['class' => 'form-control' . ($errors->has('document') ? ' is-invalid' : ''), 'placeholder' => 'Document'])); ?>

            <?php echo $errors->first('document', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

    </div><br/>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div><?php /**PATH D:\Programs\www\guestbook\resources\views/guestbook/form.blade.php ENDPATH**/ ?>