@extends('welcome')

@section('content')
<div class="card shadow mb-4">
<br />
    <a class="btn btn-outline-info" href="{{route('extensions.create')}}" role="button">Тип файла</a><br/>
        @if(Session::has('successfully_message'))
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{Session::get('successfully_message')}}</h6>
        </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
            @if(!empty($fileExtensions))
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID типа файла</th>
                            <th>Название типа</th>
                            <th>Изменить типа</th>
                            <th>Удалить типа</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID типа файла</th>
                            <th>Название типа</th>
                            <th>Изменить типа</th>
                            <th>Удалить типа</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($fileExtensions as $extension)
                    <tr>
                        <td>{{$extension->fe_id}}</td>
                        <td>{{$extension->fe_name}}</td>
                        <td>
                            <a href="{{route('extensions.edit', $extension->fe_id)}}" class="btn btn-primary">Изменить</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('extensions.destroy', $extension->fe_id)}}" enctype="multipart/form-data">
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