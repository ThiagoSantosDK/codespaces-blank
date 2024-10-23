@extends('layout.app')
@section('title', 'Noticias')
@section('conteudo')
<div class="mt-4">
    <!-- Cabeçalho -->
    <div>
        <h2>Noticias</h2>
        <a href="/admim/noticias/create" class="btn btn-sucess">Novo</a>
    </div>
    <!-- Tabela -->
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="text-center">
                <tr>
                    <th>Titulo</th>
                    <th>Data</th>
                    <th>Autor</th>
                    <th colspan="3">Ações</th>
                </tr>
            <tbody>
                @foreach ($noticias as $noticia)
                <tr>
                    <td>{{ $noticia->titulo }}</td>
                    <td>{{ $noticia->data }}</td>
                    <td>{{ $noticia->autor->nome }}</td>
                    <td><a href="/admin/noticias/{{ $noticia->id }}" class="btn btn-sm btn-primary"><i class="bi bi-pass"></a></td>
                    <td><a href="/admin/noticias/{{ $noticia->id }}/edit" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></a></td>
                    <td><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-noticia-id="{{ $noticia->id }}"><i class="bi bi-trash"></i></button></td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>
</div>
<!-- Modal de exclusão -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar remoção?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja remover?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var noticiaId = button.getAttribute('data-noticia-id');
        var form = document.getElementById('deleteForm');
        form.action = '/admin/noticias/' + noticiaId;
    });
</script>
@endsection