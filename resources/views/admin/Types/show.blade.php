@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="top d-flex ">
            <div class="d-flex align-items-center">
                <a class="btn btn-dark m-1" href="{{ route('admin.types.index') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <form class="text-center m-1" action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        <span>Elimina</span>
                    </button>
                </form>
            </div>
            <form class="text-center offset-2" id="edit-type-{{ $type->id }}"
                action="{{ route('admin.types.update', $type->name) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="name" id="name"
                    class="form-control border-0 mt-3 d-inline text-primary text-center " value="{{ $type->name }}"
                    style="width:70%; font-size:2rem"><br>
                <label class="text-secondary" for="name">Clicca sul nome per modificare</label>
            </form>
        </div>
        <h4>Progetti associati:</h4>
        <ul>
            @forelse ($type->projects as $project)
                <li>
                    <a href="{{ route('admin.projects.show', $project->slug) }}">
                        {{ $project->title }}
                    </a>
                </li>
            @empty
                <li>Nessun progetto associato a questa tipologia</li>
            @endforelse
        </ul>
    </div>
@endsection
