@extends('welcome')

@section('content')
<div class="col-sm-6">
    <form method="POST" action="{{route('roles.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="fr_name">Название роли</label>
            <input type="text" name="fr_name" class="form-control" id="fr_name" placeholder="Введите название роли" value="{{old('fr_name')}}">
        </div>
        <br />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить роль</button>
        </div>
    </form>
</div>
@endsection