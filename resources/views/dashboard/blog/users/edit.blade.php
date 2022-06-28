@extends('dashboard.template.main') 
@section('title','Editar Usuario: '.$user->name)

@section('content')
 {!! Form::open( ['route'=>['users.update',$user],'method'=> 'PUT'] ) !!}
    <div class="col-6  row form-group">
        {!! Form::label('name','Nombre:',['class'=>' col text-right']) !!}
         {!! Form::text('name',$user->name,['class'=>'form-control col-8
        ','required','placeholder'=>'Nombre'])!!}
    </div>
    <div class="col-6  row form-group">
        {!! Form::label('email','Correo Electronico:',['class'=>' col text-right']) !!} 
        {!! Form::text('email',$user->email,['class'=>'form-control
        col-8','required','placeholder'=>'ejemplo@gmail.com'])!!}
    </div>
  
    <div class="col-6 row form-group">
        {!! Form::label('type','tipo:',['class'=>' col text-right']) !!}
        <div class=" col-8">
            {!! Form::select('type',[''=>'','member'=>'Miembro','admin'=>'Administrador'],
            $user->type
            ) !!}
        </div>
    </div>
    <div class="col-6 text-center form-group">
        {!! Form::submit('Ok',['class'=>'btn btn-primary']) !!}
    </div>

{!! Form::close()!!}
@endsection