<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Bioscoopen
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <h2>Bioscopen</h2>
            <div class="card">
                <div class="card-body">
                    <a id="createCinema" class="btn btn-primary py-3" role="button" href="{{ route('admin.cinemas.create') }}">Bioscoop toevoegen</a>
                    <table class="table table-bordered mb-5">
                        <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">Naam</th>
                            <th scope="col">Locaties</th>
                            <th scope="col">Acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cinemas as $cinema)
                            <tr>
                                <th scope="row">{{ $cinema->id }}</th>
                                <td>{{ $cinema->name }}</td>
                                <td>{{ $cinema->location }}</td>
                                <td><a class="btn btn-primary" role="button" href="{{ route('admin.cinemas.halls.index', $cinema->id) }}">Zalen</a>
                                    <a class="btn btn-primary" role="button" href="{{ route('admin.cinemas.edit', $cinema->id) }}">Aanpassen</a>
                                    <form action="{{ route('admin.cinemas.destroy', $cinema->id) }}" method="POST">
                                        @method('DELETE')

                                        @csrf
                                        <button class="btn btn-danger delete">Verwijder bioscoop</button>
                                    </form>
                                  </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $cinemas->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
