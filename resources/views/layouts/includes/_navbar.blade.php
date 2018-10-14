<nav class="navbar navbar-expand-lg bg-app">

  <a class="navbar-brand" href="{{ route('wishfiles.list') }}">
        @lang('app.navbar.home')
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

        @each('layouts.includes._navbar_items', config('navbar.items', []), 'route')

    </ul>

  </div>

</nav>
