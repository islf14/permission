@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($notas as $nota)
                                <tr>
                                    <td>{{ $nota->id }}</td>
                                    <td>{{ $nota->titulo }}</td>
                                    <td>
                                        @can('eliminar-notas')
                                            <a href="{{ route('notas.eliminar', $nota->id)}}">Eliminar nota</a>
                                        @else
                                            Usted no puede eliminar esta nota
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection