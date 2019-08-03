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

                    <table class="table">
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

                    <div class="card-header">Table</div>

                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            {{-- {{dd($notas)}} --}}
                            <?php
                                $cont = -1;
                                $array = array(1, 2, 3,4,5,6,7,8,9,10,11);
                                $t[]=array();
                                $t[0]="";
                                $t[1]="";
                                $t[2]="";
                                foreach ($notas as &$nota) {     
                            ?>
                                {{-- @foreach ($notas as $nota) --}}
                            <?php 
                                    $cont++;//0
                                    if($cont<3){
                                        $t[$cont]=$nota->titulo;
                                    }else{ ?>
                                        <tr>
                                            <?php for($i=0;$i<3;$i++){ ?>
                                                <td>
                                                    <?php
                                                    if($t[$i]!=""){
                                                        echo $t[$i];
                                                    } ?>
                                                </td>
                                            <?php } ?>
                                        </tr>

                                        <?php
                                        $t[0]="";
                                        $t[1]="";
                                        $t[2]="";
                                        $cont = 0;
                                        $t[$cont]=$nota->titulo;
                                    }
                                }
                                ?>
                                    <tr>
                                        <?php for($i=0;$i<3;$i++){ ?>
                                            <td>
                                                <?php
                                                if($t[$i]!=""){
                                                    echo $t[$i];
                                                } ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php  ?>
                             {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection