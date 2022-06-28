@extends('layouts.site')

@section('css')
    
    <link rel="stylesheet" href="{{asset(MyHelpers::versionAuto('/css/portfolio-work.css'))}}">
@endsection

@section('title',$work->title)

@php
$categoryWork = $work->categoryWork->categoryWork_name;
@endphp

@section('header')
    @php
      $img_src = $work_image_main->name; 
      $video_class = (MyHelpers::typeFile( $img_src ) === 'video') ? 'header-main-wrapper-video' : '';
    @endphp
  @component('site.partials._header',['class_flex_childs' => 'justify-content-start align-items-end','class_header_video'=>$video_class])
    @if( MyHelpers::typeFile( $img_src ) === 'image' )
      <img src="{{asset('images/works/'.$img_src)}}" alt="" class="img-fluid work_image_main" />
    @elseif( MyHelpers::typeFile( $img_src ) ==='video' )
      @component('site.portfolio.partials._work-video', ['class' => ' work_video_main'])
        @slot('src',$img_src )
      @endcomponent
    @endif
      <div class='  d-flex justify-content-center align-items-center header-intro'>
        <h1 class='pl-2 pr-2'>{{$work->title}}</h1>         
      </div>
  @endcomponent
@endsection

@section('content')
	<section class="  work-info">
	  <div class='d-flex flex-column flex-md-row justify-content-around align-items-start work-info-wrapper' >

	    @component('site.portfolio.partials._work_techs',['work_techs' => $work_techs])
            @endcomponent
            <div class="col-12 col-sm-8 col-md-6 work-detail ">
              <h3>El reto</h3>
              <div class='d-flex justify-content-start'>
                <div class="col-10 col-sm-11">
                  {!! $work->detail !!}
		  
	  	  @if($work->url != '' && $categoryWork != 'PEN')		
	          <div class='mt-5 d-flex justify-content-center'>
	            <a href='{{$work->url}}' target='_blank'>
	              @component('dashboard.partials._btn-flat')
		        @slot('text_link','Ver en vivo')
	              @endcomponent 
	            </a>
	           </div>    
	       @endif
                </div>
              </div>
            </div>
	  </div>
        </section>
    @if( count($work_images) > 0 && $categoryWork != 'PEN' )
    <section class="mb-5 container-fluid grid-gallery">
        @foreach( $work_images as $img)
            <a class='grid-gallery__item' href="">
                <img class='grid-gallery__image' src="{{asset('images/works/'.$img->name)}}" alt="" />
            </a>
    		
    	@endforeach
    </section>
    @elseif( $categoryWork === 'PEN')
    <section class='mb-5 container-fluid'>
        {!! $work->url !!}
    </section>
    @endif
    <div class="mt-1 mb-5 d-flex align-items-center justify-content-center">
            <a href="{{route('portfolio')}}">
		@component('dashboard.partials._btn-flat')
                    @slot('text_link','REGRESAR A PORTAFOLIO')
                @endcomponent  
            </a>
    </div>
@endsection

@section('footer')
    @include('site.partials._footer')
@endsection

@section('js')
<script>
    var slash_top, slash_bottom, slash_middle, btn_menu,nav_main
    window.onload = function(){
            btn_menu        = document.querySelector('.btn-menu')
            slash_top       = btn_menu.querySelector('.slash-top')
            slash_bottom    = btn_menu.querySelector('.slash-bottom')
            slash_middle    = btn_menu.querySelector('.slash-middle')
            btn_menu.addEventListener('click',showMenu)
            nav_main = document.querySelector('.navbar-main')
            document.querySelector('.contain-page').style.opacity=1
            document.querySelector('.preloader').classList += ' preloader-inactive'
            
    }
    window.addEventListener('scroll' ,function(){
            if( window.scrollY > 80 ){
                nav_main.classList.add('scroll-page')
            }
            else{
                nav_main.classList.remove('scroll-page')
            }
        })

    function showMenu(){
            btn_menu.classList.toggle('active')
            let cont_menu = document.querySelector('.nav-main-items')
            cont_menu.classList.toggle('active')

            //slash de boton menu
            slash_top.classList.toggle('active')
            slash_bottom.classList.toggle('active')
            slash_middle.classList.toggle('active')
    } 
</script>
@endsection
