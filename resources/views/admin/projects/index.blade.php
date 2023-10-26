@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container mt-3">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-warning">Crea un nuovo Progetto</a>
        <h1>Lista Progetti</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Url</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{!! $project->getTypeBadge() !!}</td>
                        <td>{{ $project->url }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#delete-modal-{{ $project->id }}">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>

                            {{-- MODALE DELATE --}}
                            <div class="modal fade" id="delete-modal-{{ $project->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina elemento</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Vuoi davvero cancellare il progetto "{{ $project->title }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger">Elimina</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nessun Progetto nel database</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $projects->links('pagination::bootstrap-5') }}
@endsection
