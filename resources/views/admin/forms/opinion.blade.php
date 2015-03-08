{!! Form::open(['route' => 'admin.opinion.store']) !!}
<!-- Opinion Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Opinion:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}