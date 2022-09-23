<div class="box">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('confirm_password') }}
            {{ Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
            {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('mobile') }}
            {{ Form::text('mobile', $user->mobile, ['class' => 'numberonly form-control' . ($errors->has('mobile') ? ' is-invalid' : ''), 'placeholder' => 'Pathology Contact No','maxlength'=>10]) }}
            {!! $errors->first('mobile', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('pathology_name') }}
            {{ Form::text('pathology_name', $user->pathology_name, ['class' => 'form-control' . ($errors->has('pathology_name') ? ' is-invalid' : ''), 'placeholder' => 'Pathology Name']) }}
            {!! $errors->first('pathology_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('pathology_address') }}
            {{ Form::textArea('pathology_address', $user->pathology_address, ['class' => 'form-control' . ($errors->has('pathology_address') ? ' is-invalid' : ''), 'placeholder' => 'Pathology Address']) }}
            {!! $errors->first('pathology_address', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="{{ route('users.index') }}">Cancel</a>
    </div>
</div>
