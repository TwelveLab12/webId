@extends('layouts.app')

@section('content')

    <div id="list">
        <form action="{{route('wishfiles.show')}}">
            @if(!empty($files))
                <select name="file" class="custom-select"/>
                    @foreach($files as $file)

                        <option value="{{ $file->id }}">
                            {{ $file->name }}
                        </option>

                    @endforeach
                </select >
            @endif

            <button type="submit" name="button" class="btn btn-primary" >
                Terminer
            </button>
        </form>
    </div>
@endsection
