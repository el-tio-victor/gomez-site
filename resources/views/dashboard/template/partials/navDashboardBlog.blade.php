@if(auth::user()->admin())
    <li class=" {{ Request::is('dashboard/users','dashboard/users/*') ? ' active ' : ''}}">
        <a class="nav-link " href="{{ route('users.index')}}">
            <i class="icon-user"></i>
            <span>Usuarios</span>
        </a>    
    </li>
@endif
<li class=" {{ Request::is('dashboard/articles','dashboard/articles/*') ? ' active ' : ''}}">
    <a class="nav-link "
         href=" {{route('articles.index')}} ">
        <i class="icon-newspaper"></i>
        <span>Atriculos</span>
    </a>
</li>
<li class=" {{ Request::is('dashboard/tags','dashboard/tags/*') ? ' active ' : ''}}">
    <a class="nav-link "
        href=" {{route('tags.index')}} ">
        <i class="icon-price-tag"></i>
        <span>Tags</span>
    </a>
</li>

<li class=" {{ Request::is('dashboard/categories','dashboard/categories/*') ? ' active ' : ''}}" >
    <a class="nav-link " href=" {{ route('categories.index')}}" >
        <i class="icon-books"></i>
        <span>Categorias</span>
    </a>
</li>
<li class="treeview ">
          <a href="#"><i class="icon-image"></i> <span>Imágenes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('dashboard/images') ? ' active ' : ''}}"><a href="{{route('images.index')}}">Imágenes principales</a></li>
            <li class="{{ Request::is('dashboard/images/generals','dashboard/images/generals/*') ? ' active ' : ''}}"><a href="{{route('images.indexGenerals')}}">Imagenes generales</a></li>
          </ul>
</li>
