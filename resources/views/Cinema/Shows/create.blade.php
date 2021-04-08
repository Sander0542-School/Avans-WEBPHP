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
            <h2>Film toevoegen voor zaal {{$hall->id}}</h2>
            <div class="card">
                <div class="card-body">
                    <form  method="post" action="{{ route('halls.shows.store', $hall->id) }}" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input name="cinema_hall_id" type="hidden" value="{{ $hall->id }}"/>

                        <div class="form-group">
                            <label for="movieSelect">Film:</label>
                            <select name="movie_id" class="form-control" id="movieSelect">
                                @foreach($movies as $movie)
                                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="startTime">Starttijd:</label>
                            <input  value="{{old('start_datetime', '')}}" class="form-control" type="datetime-local" id="startTime" name="start_datetime">
                        </div>

                        <div class="form-group">
                            <label for="endTime">Eindtijd:</label>
                            <input  value="{{old('end_datetime', '')}}" class="form-control" type="datetime-local" id="endTime" name="end_datetime">
                        </div>

                        <button type="submit" class="btn btn-primary">Opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
