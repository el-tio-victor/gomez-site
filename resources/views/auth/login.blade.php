@extends('layouts.site')

@section('css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
    <section class="d-flex justify-content-center align-items-center login-wrapper">
        <section class=" d-flex justify-content-center align-items-center">
            <div class='panel-left'></div>
            <div class='panel-form'>
                @component('auth.partials._form')
                    @slot('errors',$errors)
                @endcomponent
            </div>
        </section>
    </section>
    
    

@endsection
