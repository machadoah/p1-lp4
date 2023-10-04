@extends('base')
@section('conteudo')

<form action="/alunos" method="post">
    @csrf
    <p>Nome: <input type="text" name="nome" value="{{old('nome')}}"></p>
    @if($errors->has('nome'))
        <p style="color:red;">{{$errors->first('nome')}}</p>
    @endif

    <p>Email: <input type="email" name="email" value="{{old('email')}}"></p>
    @if($errors->has('email'))
        <p style="color:red;">{{$errors->first('email')}}</p>
    @endif

    <p>Telefone: <input type="text" name="telefone" value="{{old('telefone')}}"></p>
    @if($errors->has('telefone'))
        <p style="color:red;">{{$errors->first('telefone')}}</p>
    @endif

    <p>
        <input type="submit" value="Enviar">
        <a href="/computadores">Voltar</a>  
    </p>
</form>

@endsection