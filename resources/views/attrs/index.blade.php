@extends('welcome')
@section('content')
<div class="card shadow mb-4">
<br />
    <a class="btn btn-outline-info" href="{{route('attrs.create')}}" role="button">Создать тип дополнительного атрибута ЭД</a><br/>
        @if(Session::has('successfully_message'))
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{Session::get('successfully_message')}}</h6>
        </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
            @if(!empty($attrs))
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th>Код</th>
                            <th>Описание</th>
                            <th>Тип значения</th>
                            <th>Индентификатор родительского типа</th>
                            <th>Индентификатор эталонного типа</th>
                            <th>Является эталоном ЦХЭД</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th>Код</th>
                            <th>Описание</th>
                            <th>Тип значения</th>
                            <th>Индентификатор родительского типа</th>
                            <th>Индентификатор эталонного типа</th>
                            <th>Является эталоном ЦХЭД</th>
                            <th>Удалить</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($attrs as $attr)
                    <tr>
                        <td>{{$attr->attr_id}}</td>
                        <td><a href="{{route('attrs.edit', $attr->attr_id)}}">{{$attr->attr_name}}</a></td>
                        <td>{{$attr->attr_code}}</td>
                        <td>{{$attr->attr_descr}}</td>
                        <td>{{$attr->attr_value_type}}</td>
                        <td>{{isset($attr->attrsParent) ? $attr->attrsParent->attr_name : ' ' }}</td>
                        <td>{{isset($attr->attrsEtalon) ? $attr->attrsEtalon->attr_name : ' '}}</td>
                        <td><input type="checkbox" @if($attr->attr_is_etalon == 1) checked @endif disabled></td>
                        <td>
                            <form method="post" action="{{route('attrs.destroy', $attr->attr_id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            </div>
        </div>
    </div>
    @endsection