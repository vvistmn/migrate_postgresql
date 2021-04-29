@extends('welcome')

<div class="card shadow mb-4">
<br />
    <a class="btn btn-outline-info" href="{{route('roles.create')}}" role="button">Создать роль</a><br/>
        @if(Session::has('successfully_message'))
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{Session::get('successfully_message')}}</h6>
        </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID роли файла</th>
                            <th>Название роли</th>
                            <th>Изменить роль</th>
                            <th>Удалить роль</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID роли файла</th>
                            <th>Название роли</th>
                            <th>Изменить роль</th>
                            <th>Удалить роль</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($fileRoles as $role)
                    <tr>
                        <td>{{$role->fr_id}}</td>
                        <td>{{$role->fr_name}}</td>
                        <td>
                            <a href="{{route('roles.edit', $role->fr_id)}}" class="btn btn-primary">Изменить</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('roles.destroy', $role->fr_id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>