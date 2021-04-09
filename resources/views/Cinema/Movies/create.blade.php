<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Films
        </h2>
    </x-slot>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <h2>Film toevoegen</h2>
            <div class="card">
                <div class="card-body">
                    <form  method="post" action="{{ url('movies') }}" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label for="InputCinemaName">Naam:</label>
                            <input type="text" name="title" value="{{old('title', '')}}" class="form-control" id="InputMovieName" placeholder="Film naam">
                        </div>

                        <div class="form-check">

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
