{!! Form::open(['route' => 'admin.category.store']) !!}
<!-- Category Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Category:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}