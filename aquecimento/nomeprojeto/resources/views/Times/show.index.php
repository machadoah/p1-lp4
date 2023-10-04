@extends('base')
@section('conteudo')
<dl>
    <dt>Nome</dt>
    <dd>{{ $time->ano }}</dd>

    <dt>Email</dt>
    <dd>{{ $time->titulos }}</dd>

    <dt>Telefone</dt>
    <dd>{{ $time->estado }}</dd>
</dl>
<form action="/alunos/{{$aluno->id}}" method="post">
@csrf
@method('DELETE')
<input type="submit" value="Confirmar">
<a href="/alunos">Voltar</a>
</form>
@endsection