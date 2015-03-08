{!! Form::open(['route' => 'admin.party.store']) !!}
<!-- Party Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Party:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}