<nav class="d-flex mt-5 mb-5  justify-content-center {{ Request::is('blog/*')? 'pt-5' : '' }} nav-categories-wrapper">
    <ul class="nav categories-nav">
        <li class="nav-item mr-3">
            <a class="nav-link dropdown-toggle link-sub-blog" data-toggle="collapse" href="#categoriesCollapse" role="button" aria-expanded="false" aria-controls="categoriesCollapse">CATEGORÍAS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle link-sub-blog" data-toggle="collapse" href="#tagsCollapse" role="button" aria-expanded="false" aria-controls="tagsCollapse">TAGS</a>
        </li>
    </ul>
</nav>
<div class="collapse" id="categoriesCollapse">
    <div class="mt-3 d-flex justify-content-center">
        <div class="border p-4 col-11 col-sm-10">
            @foreach($categories as $category)
                <a href="{{ route( 'blog.search.category',$category->category_slug ) }}">
                    <span class='badge badge-pill badge-orange'>
                        {{$category->name}}&nbsp; <small class='badge badge-light'>{{$category->articles->count()}}</small> 
                    </span>
                </a>     
            @endforeach
        </div>
    </div>
</div>
<div class=" collapse" id="tagsCollapse">
    <div class="mt-3 d-flex justify-content-center">
        <div class="border p-4 col-11 col-sm-10">
            @foreach($tags as $tag)
                <a href=" {{ route( 'blog.search.tag',$tag->tag_slug ) }} ">
                    <span class='badge badge-pill badge-info'> {{$tag->name}} </span>
                </a>
            @endforeach
        </div>
    </div>
</div>


