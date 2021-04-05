Index puntaje

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <td>IdPuntajeMaterial</td>
            <th>IdMaterial</th>
            <th>Fecha_inicio</th>
            <th>Fecha_Fin</th>
            <th>Puntaje</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ( $puntajeMaterials as $puntajeMaterial )


        <tr>
            <td>{{$puntajeMaterial->idPuntajeMaterail}}</td>
            <td>{{$puntajeMaterial->id_materials}}</td>
            <td>{{$puntajeMaterial->Fecha_Inicio}}</td>
            <td>{{$puntajeMaterial->Fecha_Fin}}</td>
            <td>{{$puntajeMaterial->Puntaje}}</td>
            <td>

            <a href="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail.'/edit')}}">
                Editar
            </a>

         <form action="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail)}}"  method="post">
          @csrf

            {{method_field('DELETE')}}

           <input type="submit"  onclick="return confirm('¿Quieres borrar el Puntaje?')"
           value="Borrar">

        </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
