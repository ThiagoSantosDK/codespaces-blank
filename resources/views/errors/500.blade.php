<!-- Herda da superclasse -->
@extends('layout.app')

<!-- Editar seções -->
@section('title', 'Página não encontrada')

<!-- Inserir o conteudo principal -->
@section('conteudo')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mx-auto">
            <h1>Erro 500 - Erro interno do servidor</h1>
            <h2>Entre em contato com o administrador</h2>
        </div>
    </div>
@endsection