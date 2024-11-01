@extends('layout.app')
@section('title', 'Criar Caderno')
@section('conteudo')
<div class="row mx-auto">
    <div class="mt-3 mb-3">
        <h3>Criando novo caderno</h3>
        <form action="/admin/cadernos/{{ $caderno->id }}/edit" method="POST" enctype="multipart/form-data">
            <!-- Token -->
            @csrf
            <!-- Ajustar o método -->
            @method('PUT')

            <!-- Nome -->
            <div class="form-group mb-2">
                <label for="data">Nome do caderno</label>
                <input type="date time-local" id="nome" name="nome" value="{{ old('nome', $caderno->nome) }}" class="form-control @error('nome') is-invalid @enderror">
                @if($errors->has('nome'))
                <div class="text-danger">
                    {{ $errors->first('nome') }}
                </div>
                @endif
            </div>

            


                <button type="submit" class="btn btn-success">Salvar</button>

        </form>

    </div>

</div>
@endsection
