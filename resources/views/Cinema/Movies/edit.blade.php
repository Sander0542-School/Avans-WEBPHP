<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Downloads') }}
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
            <h2>Film updaten</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('movies.update', $movie->id) }}" >
                        @method('PUT')
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label for="InputMovieName">Naam:</label>
                            <input type="text" value="{{old('name', $movie->title)}}" name="title" class="form-control" id="InputMovieName" placeholder="Film naam">
                        </div>
                        <div class="form-check">

                        </div>
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
