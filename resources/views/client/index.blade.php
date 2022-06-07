@extends('theme.base')
@section('content')
    <div class="container py-5">
        <h1 class="text-center">Listado de Clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary"> Crear Clientes </a>
        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                    {{ Session::get('mensaje') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th>Comentario</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $detail)
                    <tr>
                        <td>{{ $detail->name}}</td>
                        <td>{{ $detail->due}}</td>
                        <td>
                            <a href="{{ route('client.edit', $detail)}}" class="btn btn-warning"> Editar</a>
                        
                            <form action="{{ route('client.destroy', $detail)}}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger " onclick="return confirm('Estas seguro de Eliminar este registro');">Eliminar</button>
                            </form>
                    </tr>
                @empty
                    <tr>
                            <td colspan="3">No hay registro</td>
                    </tr>
                @endforelse
                
                </tr>
            </tbody>
        </table>
        <!--paginacion con validacion-->
        @if($clients->count())
        <div class="text-center">
            {{ $clients->links() }}
        </div>
        @endif
        
    </div>
@endsection
