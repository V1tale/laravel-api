@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mt-3 text-center">Tipologie:</h2>
        <div>
            <form action="{{ route('admin.types.store') }}" method="POST" class="mt-3">
                @csrf
                <div class="input-group" style="width:50%">
                    <input name="name" type="text" class="form-control" placeholder="Inserisci una nuova tipologia"
                        aria-label="Inserisci una nuova tipologia" aria-describedby="create-type-btn">
                    <button class="btn btn-outline-primary" type="submit" id="create-type-btn">Salva</button>
                </div>
            </form>
        </div>
        <table class="table mt-3" style="width:50%">
            <thead>
                <tr>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Progetti correlati</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr>
                        <th scope="row">
                            {{-- FORM PER TABELLA MODIFICABILE --}}
                            {{-- <form id="edit-type-{{ $type->id }}"
                                        action="{{ route('admin.types.update', $type->slug) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" id="name" class="form-control border-0"
                                            value="{{ $type->name }}">
                                    </form> --}}

                            <h6><a href="{{ route('admin.types.show', $type->slug) }}">{{ $type->name }}</a></h6>
                        </th>
                        <td>{{ count($type->projects) }}</td>
                    </tr>
                @empty
                    <p>Nessuna tipologia presente</p>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
