
<li class="nav-item @if( Route::current()->getName()  == $route['name']) active @endif">
    <a class="nav-link" href="{{ route($route['name']) }}">

        @lang($route['label'])
        @if(Route::current()->getName()  == $route['name'])
            <span class="sr-only">(current)</span>
        @endif
    </a>
</li>
