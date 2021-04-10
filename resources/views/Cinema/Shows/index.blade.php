<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Downloads') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <h2>Bioscopen</h2>
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary py-3" role="button" href="{{ route('admin.halls.shows.create', $hall->id) }}">Film inplannen</a>
                    <table class="table table-bordered mb-5">
                        <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">film</th>
                            <th scope="col">Start tijd</th>
                            <th scope="col">Eind tijd</th>
                            <th scope="col">acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hall->shows as $hall)
                            <tr>
                                <th scope="row">{{ $hall->id }}</th>
                                <td>{{ $hall->movie->title }}</td>
                                <td>{{ $hall->start_datetime }}</td>
                                <td>{{ $hall->end_datetime }}</td>
                                <td>
                                    <a class="btn btn-primary" role="button" href="{{ route('admin.shows.edit', $hall->id) }}">Aanpassen</a>
{{--                                    <form action="{{ route('halls.destroy', $hall->id) }}" method="POST">--}}
{{--                                        @method('DELETE')--}}

{{--                                        @csrf--}}
{{--                                        <button class="btn btn-danger delete">Verwijder bioscoop</button>--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
