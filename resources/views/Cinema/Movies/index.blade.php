<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Films
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <h2>Films</h2>
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary py-3" role="button" href="{{ route('admin.movies.create') }}">Film toevoegen</a>
                    <table class="table table-bordered mb-5">
                        <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">Titel</th>
                            <th scope="col">acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <th scope="row">{{ $movie->id }}</th>
                                <td>{{ $movie->title }}</td>
                                <td><a class="btn btn-primary" role="button" href="{{ route('admin.movies.edit', $movie->id) }}">Aanpassen</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $movies->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
