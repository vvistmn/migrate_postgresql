@extends('welcome')

@section('content')
<div class="col-sm-6">
    <form method="POST" action="{{route('document-type.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="dt_type">Название типа документа</label>
            <input type="text" name="dt_type" class="form-control" id="dt_type" placeholder="Введите название типа документа" value="{{old('dt_type')}}">
        </div>
        <br />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить название типа документа</button>
        </div>
    </form>
</div>
@endsection