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
            <h2>Bioscoop updaten</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cinemas.update', $cinema->id) }}" >
                        @method('PUT')
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label for="InputCinemaName">Naam:</label>
                            <input type="text" value="{{old('name', $cinema->name)}}" name="name" class="form-control" id="InputCinemaName" placeholder="Bioscoop naam">
                        </div>
                        <div class="form-group">
                            <label for="InputCinemaLocation">Locatie</label>
                            <input type="text" value="{{old('location', $cinema->location)}}" name="location" class="form-control" id="InputCinemaLocation" placeholder="Locatie">
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
