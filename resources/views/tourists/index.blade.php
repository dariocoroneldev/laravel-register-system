@extends('tourists.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registro de Turistas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('registro.create') }}"> Registrar Turista</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Pais</th>
            <th>Ciudad</th>
            <th>Obvservacion</th>
            <th>Cantidad</th>
            <th width="280px">Accion</th>
        </tr>
        @foreach ($tourists as $tourist)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tourist->name }}</td>
            <td>{{ $tourist->email }}</td>
            <td>{{ $tourist->phone }}</td>
            <td>{{ $tourist->country }}</td>
            <td>{{ $tourist->city }}</td>
            <td>{{ $tourist->observation }}</td>
            <td>{{ $tourist->quantity}}</td>
            <td>
                <form action="{{ route('registro.destroy',$tourist->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('registro.show',$tourist->id) }}">ver</a>

                    <a class="btn btn-primary" href="{{ route('registro.edit',$tourist->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $tourists->links() !!}

@endsection
