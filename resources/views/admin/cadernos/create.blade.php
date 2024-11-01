@extends('layout.app')
@section('title', 'Criar Caderno')
@section('conteudo')
<div class="row mx-auto">
    <div class="mt-3 mb-3">
        <h3>Criando novo caderno</h3>
        <form action="/admin/cadernos" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nome -->
            <div class="form-group mb-2">
                <label for="nome">Nome do caderno</label>
                <input type="date time-local" id="nome" name="nome" value="{{ old('nome') }}" class="form-control @error('nome') is-invalid @enderror">
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