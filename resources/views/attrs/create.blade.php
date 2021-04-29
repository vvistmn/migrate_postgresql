@extends('welcome')

@section('content')
<div class="col-sm-6">
    <br>
    <form method="POST" action="{{route('attrs.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="attr_name">Наименование</label>
            <input type="text" name="attr_name" class="form-control" id="attr_name" placeholder="Наименование" value="{{old('attr_name')}}">
        </div>
        <div class="form-group">
            <label for="attr_code">Код</label>
            <input type="text" name="attr_code" class="form-control" id="attr_code" placeholder="Код" value="{{old('attr_code')}}">
        </div>
        <div class="form-group">
            <label for="attr_descr">Описание</label>
            <textarea class="form-control" name="attr_descr" id="attr_descr" rows="3">{{old('attr_descr')}}</textarea>
        </div>
        <div class="form-group">
            <label for="attr_value_type">Тип значения</label>
            <input type="text" name="attr_value_type" class="form-control" id="attr_value_type" placeholder="Тип значения" value="{{old('attr_value_type')}}">
        </div>
        <div class="form-group">
            <label for="parent_attr_id">Индентификатор родительского типа</label>
            <select id="parent_attr_id" name="parent_attr_id" class="form-control">
                <option value="" selected>Не выбрано</option>
                @if(!empty($attrs))
                    @foreach($attrs as $key => $val)
                    <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="etalon_attr_id">Индентификатор эталонного типа</label>
            <select id="etalon_attr_id" name="etalon_attr_id" class="form-control">
                <option value="" selected>Не выбрано</option>
                @if(!empty($attrs))
                    @foreach($attrs as $key => $val)
                    <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <br />
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="attr_is_etalon" value="true" id="attr_is_etalon">
            <label class="form-check-label" for="attr_is_etalon">
            Является эталоном ЦХЭД
            </label>
        </div>
        <br />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить тип дополнительного атрибута ЭД</button>
        </div>
    </form>
</div>
@endsection