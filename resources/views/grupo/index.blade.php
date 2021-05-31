@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>
<a href="{{ route('grupo.create') }}" class="btn btn-light">NUEVO</a>

</div>

<table id="grupos" class="table table-sriped table-bordered">
    <thead align="center">
        <tr>
            <th>#</th>
            <th>Grupo</th>
            <th>id</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody align="center">
        @foreach( $grupo as $grupos )
        <tr>
            <td>{{ $grupos->id }}</td>
            <td>{{ $grupos->Grupo }}</td>
            <td>{{ $grupos->id }}</td>
            <td>{{ $grupos->Estado }}</td>
            <td>

            <a href="{{ url('/grupo/'.$grupos->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a>
<!--
             | 
             
             |

            <form action="{{ url('/grupo/'.$grupos->id ) }}" class="d-inline" method="post">

            @csrf

            {{ method_field('DELETE') }}

                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>-->

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</body>
@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#grupos').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>

@endsection
