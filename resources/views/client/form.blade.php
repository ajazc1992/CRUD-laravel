@extends('theme.base')
@section('content')
    <div class="container py-5">
        <h1 class="text-center">Crear Clientes</h1>
<!--store es para almacenar -->
        @if(@isset($client))
            <h1>Editar Cliente</h1>
        @else
            <h1>Crear Cliente</h1>
        @endif
        @if(@isset($client))
            <form action="{{ route('client.update', $client) }}" method="post">
                 @method('PUT')
        @else
            <form action="{{ route('client.store') }}" method="post">
        @endif

            @csrf <!--incluir siempre para los formularios-->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente" value="{{ old('name') ?? @$client->name }}" required>
                <p class="form-text">Escriba el nombre del cliente</p>
                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>  
           <div class="mb-3">
                <label for="due" class="form-label">Saldo</label>
                <input type="number" name="due" class="form-control" placeholder="Escriba el saldo" step="0.01" required value="{{ old('due') ?? @$client->due}}">
                <p class="form-text">Escriba el saldo del cliente</p>
                @error('due')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror

            </div>
            
            <div class="mb-3">
                <label for="comments" class="form-label">Comentarios</label>
                <textarea name="comments" class="form-control" id="comments" cols="30" rows="4" value="{{ old('comments') }}"></textarea>
                <p class="form-text">Escriba un comentario</p>
            </div>
            @if(isset($client))
                <button class="btn btn-info" type="submit">Editar Cliente</button>
            @else 
                <button class="btn btn-info" type="submit">Guardar Cliente</button>
             @endif


        </form>
        
    </div>
@endsection
