@extends('welcome')

@section('content')
<div class="col-sm-6">
    <form method="POST" action="{{route('extensions.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="fe_name">Введите название типа файла</label>
            <input type="text" name="fe_name" class="form-control" id="fe_name" placeholder="Введите название типа файла" value="{{old('fe_name')}}">
        </div>
        <br />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить тип</button>
        </div>
    </form>
</div>
@endsection