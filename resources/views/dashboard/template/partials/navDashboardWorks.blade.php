@if(Auth::user()->admin())
    <li class="{{ Request::is('dashboard/works','dashboard/works/*') ? ' active ' : ''}}">
        <a class="nav-link " href="{{route('works.index')}}">
                <i class="icon-user"></i>
                <span>Trabajos</span>
        </a>    
    </li>
@endif
