@extends('welcome')

@section('content')
<div class="col-sm-6">
    <h1>Редактирование типа документа - {{$docType->fr_name}}</h1>
    <form method="POST" action="{{route('document-type.update', $docType->dt_id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="dt_type">Название типа документа</label>
            <input type="text" name="dt_type" class="form-control" id="dt_type" placeholder="Введите название роли" value="{{ old('dt_type')? : $docType->dt_type}}">
        </div>
        <br />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Изменить тип документа</button>
        </div>
    </form>
</div>
@endsection