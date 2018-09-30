@extends('layouts.app')

@section('content')

    @if(Session::has('errors'))
        {{ Session::get('errors')}}
    @endif


    <form action="{{route('wishfiles.store')}}" method="POST" enctype="multipart/form-data"  >

        @csrf

        <div class="form-group">
            <div class="custom-file">
                <input type="file" name="file"  @change="majfilename" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>

              </div>

        </div>
        <button type="submit" name="button" class="btn btn-primary" v-if="filename">
            Terminer
        </button>

    </form>

    <div id="filename"  class="row">
        <div class="col-12">
            @{{filename}}
        </div>
    </div>

@endsection
