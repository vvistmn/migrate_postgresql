@extends('welcome')
@section('content')
<div class="card shadow mb-4">
<br />
    <a class="btn btn-outline-info" href="{{route('document-type.create')}}" role="button">Создать тип документа</a><br/>
        @if(Session::has('successfully_message'))
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{Session::get('successfully_message')}}</h6>
        </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
            @if(!empty($docTypes))
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID типа документа</th>
                            <th>Название типа документа</th>
                            <th>Изменить тип документа</th>
                            <th>Удалить тип документа</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID типа документа</th>
                            <th>Название типа документа</th>
                            <th>Изменить тип документа</th>
                            <th>Удалить тип документа</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($docTypes as $docType)
                    <tr>
                        <td>{{$docType->dt_id}}</td>
                        <td>{{$docType->dt_type}}</td>
                        <td>
                            <a href="{{route('document-type.edit', $docType->dt_id)}}" class="btn btn-primary">Изменить</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('document-type.destroy', $docType->dt_id)}}" enctype="multipart/form-data">
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