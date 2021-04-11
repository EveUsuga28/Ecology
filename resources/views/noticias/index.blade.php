
Lista de Noticias

<table class="table table-light">

    <thead class="thead-light">
    <tr>
        <th>
            IdNoticas
        </th>
        <th>
            Titulo
        </th>
        <th>
          Contexto
        </th>
        <th>
           Fecha
        </th>
        <th>
            Estado
        </th>
        <th>
             Foto
        </th>
        <th>
            Acción
        </th>
    </tr>
</thead>
<tbody>
    @foreach ( $noticias as  $noticia)
          <tr>
              <td>{{$noticia->id_noticia}}</td>
              <td>{{$noticia->titulo}}</td>
              <td>{{$noticia->contexto}}</td>
              <td>{{$noticia->Fecha}}</td>
              <td>{{$noticia->estado}}</td>
              <td>{{$noticia->Foto}}</td>
              <td>
                <a  class="btn btn-outline-success" href="{{url('/noticias/'.$noticia->id_noticia.'/edit') }}">
                    Editar
             </a>



                </td>
          </tr>
    @endforeach
</tbody>

</table>
