<div class="box box-info padding-2">
    <div class="box-body padding-2">
        {{ Form::hidden('user_id', auth()->user()->id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $guestbook->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div><br/>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::textArea('description', $guestbook->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div><br/>
        <div class="form-group">
            {{ Form::label('document') }}
            {{ Form::file('document', ['class' => 'form-control' . ($errors->has('document') ? ' is-invalid' : ''), 'placeholder' => 'Document']) }}
            {!! $errors->first('document', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div><br/>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>