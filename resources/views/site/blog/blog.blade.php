@extends('layouts.site')

@section('title','Blog')

@section('css')
<!--        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">-->
        <link rel="stylesheet" href="{{asset(MyHelpers::versionAuto('/css/blog.css'))}}">
        <style>
            .collapse{
                display:none;
            }
            .collapse.show{
                display:block;
            }
        </style>
@endsection

@section('header')
        @component('site.partials._header')
            <div class='header-intro'>
                <h1>Algunas notas</h1>
            </div>
        @endcomponent
@endsection

@section('content')
    @include('site.blog.partials.nav-blog')
    <section class="container mt-2 pt-4  d-flex flex-column align-items-baseline">
        <h1 class='m-0'>Artículos</h1>
            @component('site.blog.partials.filter')
                @slot('filter',$filter->all()['filter'])
                @slot('filter_obj', $filter->all() )
            @endcomponent
        
    </section>
    <section class=" p-1 p-sm-2 p-md-4 p-lg-5 articles">
       
        @foreach($articles as $article)

            @if( ($loop->index + 1) % 2 != 0)
            <section class=' container d-flex flex-column flex-lg-row justify-content-around align-items-center mt-3 mb-3'> 
            @endif
            
            @if(isset($article->images))
                @php $img_name = $article->images[0]->name; @endphp
            @endif
            @if(!isset($article->images))
                @php $img_name = $article->image_name ; @endphp
            @endif


                @component('site.blog.partials.article')
                    @slot('article_slug',$article->slug)
                   
                        @slot( 'image_name',$img_name )
                    
                    @slot('article_title',$article->title)
                    @slot('category',$article->category->name)
                    @slot('summary',$article->summary)
                    @slot('date',$article->updated_at->diffForHumans())
                @endcomponent

            @if( ($loop->index + 1) % 2 === 0 || $loop->last)
                </section>
            @endif
        @endforeach
	@if( count($articles) === 0)
		<div class='d-flex justify-content-center align-items-center'>
		@component('site.partials._no-results')@endcomponent
		</div>
	@endif
        <section class=" pt-5 d-flex justify-content-center articles-paginate">
        {{$articles->links()}}
    </section>
    </section>
    

@endsection

@section('footer')
    @include('site.partials._footer')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script>
        var slash_top, slash_bottom, slash_middle, btn_menu,nav_main

        window.onload = function(){
            /**Variables menu burger */
            btn_menu        = document.querySelector('.btn-menu')
            slash_top       = btn_menu.querySelector('.slash-top')
            slash_bottom    = btn_menu.querySelector('.slash-bottom')
            slash_middle    = btn_menu.querySelector('.slash-middle')
            btn_menu.addEventListener('click',showMenu)
            nav_main = document.querySelector('.navbar-main')
            document.querySelector('.contain-page').style.opacity=1
            document.querySelector('.preloader').classList += ' preloader-inactive'

            $('.link-sub-blog').click(function(){
                let el = $(this)
                let attr_href = el.attr('href')

                el.toggleClass('active')
                let links_sub_not = $('.link-sub-blog.active'+":not(a[href='"+attr_href+"'])")
                console.log(links_sub_not)
                links_sub_not.each(function(){
                    $(this).toggleClass('active')
                })
                //busco los contenedores del collapse que estan visibles y que no corresponden 
                //al clickeado y los oculto
                let collapses = $('.collapse.show'+':not('+attr_href+')')
                
                collapses.each(function(){
                    $(this).toggleClass('show')
                })
            })

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
        }
    </script>
@endsection
