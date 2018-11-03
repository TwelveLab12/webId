@extends('layouts.app')

@section('content')

    <h4>
        @lang('show.subtitle')
        {--
            Votre lien personnalisé a été généré. Vous n'avez plus qu'à le transmettre à votre correspondant.
        --}
    </h4>

    <div class="input-group">

        <input id="file" class="form-control" value="{{ url($file['url']) }}">
        <!-- Trigger -->
        <div class="input-group-append">

            <button class="btn " data-clipboard-target="#file">
                <img class="clippy" src="{{ asset('svg/clippy.svg')}}" alt="Copy to clipboard">
            </button>

        </div>

    </div>

    <div class="links">
        <a class="btn btn-secondary" href="{{ url('/') }}"> Nouvelle Demande </a>
    </div>
@endsection

@push('endscript')
    <script src="{{asset('js/plugins/clipboard.js-master/dist/clipboard.min.js')}}"></script>
    <script>

        new ClipboardJS('.btn');

    </script>
@endpush
