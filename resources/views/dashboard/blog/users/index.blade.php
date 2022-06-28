@extends('dashboard.template.main')

@section('title')
<h2>
    Lista de Usuarios
    <span class="icon-user"></span>
</h2>
@endsection

@section('content')
<div class='text-right'>
    <a href="{{ route('users.create') }}" class='btn btn-success'><span class="icon-plus"></span></a>
</div>
<div class=''>
   
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Correo</th>
                <th scope="col">Acción</th>           
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if($user->type == "admin")
                            <span class="badge badge-success">{{ $user->type }}</span>
                        @else
                            <span class="badge badge-primary">{{ $user->type }}</span>
                        @endif
                    </td>
                    
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class='btn btn-destroy' role='button' href="{{ route('dashboard.users.destroy',$user->id) }}">
                            <span class="icon-cross"></span>
                        </a> 
                        <a class='btn btn-warning' href=" {{ route('users.edit', $user->id ) }} ">
                            <span class="icon-font-size"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        
        </tbody>
    </table>
    {!! $users->render()!!}
</div>
@endsection