@extends('welcome')

@section('content')
<div class="col-sm-6">
    <h1>Редактирование типа - {{$fileExtension->fe_name}}</h1>
    <form method="POST" action="{{route('extensions.update', $fileExtension->fe_id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="fe_name">Название роли</label>
            <input type="text" name="fe_name" class="form-control" id="fe_name" placeholder="Введите название роли" value="{{ old('fr_name')? : $fileExtension->fe_name}}">
        </div>
        <br />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить роль</button>
        </div>
    </form>
</div>
@endsection