@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Torna alla lista Progetti</a>
        <h1>Dettaglio Progetto</h1>
        <div class="card text-center mt-5">
            <div class="card-header">
                {{ $project->title }}
            </div>
            <div class="card-body">
                <div class="">{!! $project->getTypeBadge() !!}</div>
                <a href="{{ $project->url }}">Link "{{ $project->title }}"</a>
                <p class="card-text">{{ $project->content }}</p>
            </div>
            <div class="card-footer text-body-secondary">
                Utima modifica: {{ $project->updated_at }}
            </div>
        </div>
    </div>
@endsection
