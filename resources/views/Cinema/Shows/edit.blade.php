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
            <h2>Film aanpassen voor zaal {{$show->cinema_hall_id}}</h2>
            <div class="card">
                <div class="card-body">
                    <form  method="post" action="{{ route('shows.update', $show->id) }}" accept-charset="UTF-8">
                        @method('PUT')
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input name="cinema_hall_id" type="hidden" value="{{ $show->cinema_hall_id }}"/>

                        <div class="form-group">
                            <label for="movieSelect">Film:</label>
                            <select name="movie_id" class="form-control" id="movieSelect">
                                @foreach($movies as $movie)
                                    <option  @if($show->movie_id=== $movie->id) selected='selected' @endif value="{{$movie->id}}">{{$movie->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="startTime">Starttijd:</label>
                            <input  value="{{old('start_datetime', date('Y-m-d\TH:i', strtotime($show->start_datetime)))}}" class="form-control" type="datetime-local" id="startTime" name="start_datetime">
                        </div>

                        <div class="form-group">
                            <label for="endTime">Eindtijd:</label>
                            <input  value="{{old('end_datetime', date('Y-m-d\TH:i', strtotime($show->end_datetime)))}}" class="form-control" type="datetime-local" id="endTime" name="end_datetime">
                        </div>

                        <button type="submit" class="btn btn-primary">Opslaan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
