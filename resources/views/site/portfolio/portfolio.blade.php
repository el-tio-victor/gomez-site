@extends('layouts.site')

@section('css')
<!--    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">  -->
<link rel="stylesheet" href="{{asset('/css/portfolio.css')}}">

@endsection

@section('header')
        @component('site.partials._header')
            <div class='header-intro d-flex flex-column align-items-center justify-content-center'>
                <!--<img class='col-10 col-sm-8 col-md-6 col-lg-5' src="{{asset('images/page/code.svg')}}" alt="">-->
                <h1 class='text-center'>Echa un vistazo a mis proyectos</h1>
            </div>
        @endcomponent
@endsection

@section('title','Portafolio')

@section('content')
    <section class="pt-5 pb-5  d-flex justify-content-center  bg-white nav-categories-wrapper">
        @include('site.portfolio.partials._nav-categories') 
    </section>

    <section class='pt-5 pb-5 d-flex flex-column  justify-content-center align-items-center  works-container'> 
    @foreach($works as $work)
            @component('site.portfolio.partials.work')
                @slot('title',$work->title)
                @slot('services', $work->services)
                @slot('detail',$work->detail)
                @slot('url', $work->url )
                @slot('images', $work->images()->where('image_main',1)->get() )
                @slot('tt', $work->technologyTool)
		            @slot('work_slug', $work->slug )
                @slot('work_category', $work->categoryWork->categoryWork_name )
                @slot('index',$loop->index)
	    @endComponent
    @endforeach
    </section>
    <div class=" pb-5 pt-5 mt-2 d-flex justify-content-center paginate">
        @if( count($works) > 0)
          {{ $works->render()}}
        @else
	      @component('site.partials._no-results')@endcomponent
        @endif
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
