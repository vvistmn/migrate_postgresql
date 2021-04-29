@extends('welcome')

@section('content')
<div class="col-sm-6">
    <h1>Редактирование роли - {{$fileRole->fr_name}}</h1>
    <form method="POST" action="{{route('roles.update', $fileRole->fr_id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="fr_name">Название роли</label>
            <input type="text" name="fr_name" class="form-control" id="fr_name" placeholder="Введите название роли" value="{{ old('fr_name')? : $fileRole->fr_name}}">
        </div>
        <br />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить роль</button>
        </div>
    </form>
</div>
@endsection