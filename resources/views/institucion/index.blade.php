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
<a href="{{ route('institucion.create') }}" class="btn btn-light">NUEVO</a>
</div>
<table id="institucion" class="table table-sriped table-bordered">
    <thead align="center">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Fecha Registro</th>
            <th>Foto</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody align="center">
        @foreach( $institucion as $instituciones )
        <tr>
            <td>{{ $instituciones->id }}</td>
            <td>{{ $instituciones->Nombre }}</td>
            <td>{{ $instituciones->Telefono }}</td>
            <td>{{ $instituciones->fechaRegistro }}</td>
            <td>
            <img src="{{ asset('storage').'/'.$instituciones->Foto }}" alt="" width="100">
            </td>
            <td>{{ $instituciones->direccion }}</td>
            <td>

            <a href="{{ url('/institucion/'.$instituciones->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a>

             |

            <form action="{{ url('/institucion/'.$instituciones->id ) }}" class="d-inline" method="post">

            @csrf

            {{ method_field('DELETE') }}

                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>

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
                $('#institucion').DataTable( {
                    responsive: true,
                    autoWidth: false,
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                    }
                } );
            } );
        </script>

         
    @endsection
