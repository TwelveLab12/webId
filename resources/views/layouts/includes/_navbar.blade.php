<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="{{ route('wishfiles.list') }}">
        @lang('app.navbar.home')
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item @if( Route::current()->getName()  == 'wishfiles.create') active @endif">
        <a class="nav-link" href="{{ route('wishfiles.create') }}">

            @lang('app.navbar.wishfiles.create')
            @if(Route::current()->getName()  == 'wishfiles.create')
                <span class="sr-only">(current)</span>
            @endif
        </a>
      </li>

    </ul>

  </div>

</nav>
