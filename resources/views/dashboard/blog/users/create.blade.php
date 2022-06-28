
@extends('dashboard.template.main')

@section('title')
    <h3>Agregar Usuario</h3>
@endsection

@section('content')
<div class="p-3 border">
 {!! Form::open( ['route'=>'users.store','method' => 'POST'] ) !!}
    <div class="col d-flex form-group">
        @include('dashboard.template.partials.form',
            ['tag'=>'text',
            'name'=>'name',
            'label'=>'Nombre',
            'data'=>null,'placeholder'=>'Nombre Usuario','required'=>'required'])
     
             @if( count($errors->get('name')) > 0 )
                <span class="msg alert-danger">
                    @foreach ($errors->get('name') as $message) 
                     {{ $message }} 
                    @endforeach
                </span>
             @endif
    </div>
        
    
    <div class="col  d-flex form-group">
        @include('dashboard.template.partials.form',
            ['tag'=>'email',
            'name'=>'email',
            'label'=>'Correo',
            'data'=>null,'placeholder'=>'Correo','required'=>'required'])       
            @if( count($errors->get('email')) > 0 )
                <span class="msg alert-danger">
                    @foreach ($errors->get('email') as $message) 
                        {{ $message }} 
                    @endforeach
                </span>
             @endif
        
    </div>
    <div class="col  d-flex form-group">
        @include('dashboard.template.partials.form',
            ['tag'=>'password',
            'name'=>'password',
            'label'=>'Contraseña',
            'data'=>null,'placeholder'=>'*****','required'=>'required']) 
        @if( count($errors->get('password')) > 0 )
                <span class="msg alert-danger">
                    @foreach ($errors->get('password') as $message) 
                        {{ $message }} 
                    @endforeach
                </span>
            @endif
        
        
    </div>
    <div class="col d-flex form-group">
         {!! Form::label('type','tipo:',['class'=>' col text-right']) !!}
         <div class=" col-8">
            {!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'   ],
                null,
                [
                 'class'=>'form-control',
                 'placeholder'=>'Seleccione una Opción...',
                ]) !!}
         </div>
    </div>
    <div class="col border-top pt-3 text-center form-group">
        {!! Form::submit('Agregar',['class'=>'btn btn-success']) !!}
    </div>


 {!! Form::close()!!}
</div>
@endsection