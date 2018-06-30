<div class="form-group">
{!! Form::label('name', 'Name') !!}
<div class="form-controls">
    <input type="text" class="form-control" name="name"
           value="{{old('name', isset($cat) ? $cat->name : 'gia tri mac dinh')}}">
</div>
</div>
<div class="form-group">
{!! Form::label('date_of_birth', 'Date of Birth') !!}
<div class="form-controls">
{!! Form::text('date_of_birth', null, ['class' => 'form-control datepicker']) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('breed_id', 'Breed') !!}
<div class="form-controls">
    <select name="breed_id" class="form-control">
        @foreach($breeds as $breed_id => $breed_name)
        <option value="{{$breed_id}}"
        @if(old('breed_id', isset($cat) ? $cat->breed_id : '') == $breed_id)
            selected="selected"
        @endif
        >{{$breed_name}}</option>
        @endforeach
    </select>
</div>
</div>
{!! Form::submit('Save Cat', ['class' => 'btn btn-primary']) !!}