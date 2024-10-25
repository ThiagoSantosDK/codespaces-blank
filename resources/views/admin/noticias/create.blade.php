@extends('layout.app')
@section('title', 'Criar Noticia')
@section('conteudo')
<div class="row mx-auto">
    <div class="mt-3 mb-3">
        <h3>Criando nova noticia</h3>
        <form action="/admin/noticias" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Data -->
            <div class="form-group mb-2">
                <label for="data">Data da noticia</label>
                <input type="date" id="data" name="data" value="{{ old('data') }}" class="form-control @error('data') is-invalid @enderror">
                @if($errors->has('data'))
                <div class="text-danger">
                    {{ $errors->first('data') }}
                </div>
                @endif
            </div>

            <!-- Titulo -->
            <div class="form-group mb-2">
                <label for="titulo">Titulo da noticia</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" class="form-control @error('titulo') is-invalid @enderror">
                @if($errors->has('titulo'))
                <div class="text-danger">
                    {{ $errors->first('titulo') }}
                </div>
                @endif
            </div>

            <!-- Subtitulo -->
            <div class="form-group mb-2">
                <label for="subtitulo">Subtitulo da noticia</label>
                <input type="text" id="subtitulo" name="subtitulo" value="{{ old('subtitulo') }}" class="form-control @error('subtitulo') is-invalid @enderror">
                @if($errors->has('subtitulo'))
                <div class="text-danger">
                    {{ $errors->first('subtitulo') }}
                </div>
                @endif
            </div>

            <!-- Texto -->
            <div class="form-group mb-2">
                <label for="texto">Digite o texto da noticia</label>
                <textarea id="texto" name="texto" class="form-control @error('texto')
                 is-invalid @enderror">{{ old('texto') }}</textarea>
                @if($errors->has('texto'))
                <div class="text-danger">
                    {{ $errors->first('texto') }}
                </div>
                @endif
            </div>

            <!-- id_autor -->
            <div class="form-group mb-2">
                <label for="id_autor">Autor</label>
                <select name="id_autor" id="id_autor" class="form-control @error('id_autor') is-invalid @enderror">
                    <option selected disable>Selecione um autor</option>
                    @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}" {{old('id_autor') == $autor->id? 'selected' : ''}}>{{ $autor->nome }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_autor'))
                <div class="text-danger">
                    {{ $errors->first('id_autor') }}
                </div>
                @endif
            </div>

            <!-- id_caderno -->
            <div class="form-group mb-2">
                <label for="id_caderno">Escolha um caderno</label>
                <select name="id_caderno" id="id_caderno" class="form-control @error('id_caderno') is-invalid @enderror">
                    <option selected disable>Selecione um caderno</option>
                    @foreach ($cadernos as $caderno)
                    <option value="{{ $caderno->id }}" {{old('id_caderno') == $caderno->id? 'selected' : ''}}>{{ $caderno->nome }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_caderno'))
                <div class="text-danger">
                    {{ $errors->first('id_caderno') }}
                </div>
                @endif


                <button type="submit" class="btn btn-success">Salvar</button>

        </form>

    </div>

</div>
@endsection