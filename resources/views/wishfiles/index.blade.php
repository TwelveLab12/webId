@extends('layouts.app')

@section('content')

    @if(Session::has('errors'))
        {{ Session::get('errors')}}
    @endif


    <form action="{{route('wishfiles.store')}}" method="POST" enctype="multipart/form-data"  >

        @csrf

        <input type="file" name="file"  @change="majfilename"/>
        <button type="submit" name="button">
            Save file
        </button>

    </form>

    <div  class="row">
        <div class="col-12">
            @{{filename}}
        </div>
    </div>
    @foreach($files as $file)

        <div class="row">
            <div class="col-6">
                {{ $file->name }}
            </div>
            <div class="col-6">
                {{ $fileCfg['path'] . '/' . $file->type . '/' . $file->pathname . '.' .$file->extension }}
            </div>
        </div>

    @endforeach

@endsection
