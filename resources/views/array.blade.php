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
                        {{ $array = ['a','b','c','d','e'] }}
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($array as $nota)
                                <tr>
                                    <td>{{ $nota[0] }}</td>
                                    <td>{{ $nota[1] }}</td>
                                    <td>{{ $nota[2] }}</td>
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