<html>
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Institución</th>
        <th>Materiales kilos</th>
        <th>Puntaje Materiales</th>
        <th>Productos</th>
        <th>Puntaje Productos</th>
        <th>Total Puntaje</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody>
@foreach($reciclaje_institucion as $reciclaje)
        <tr>
        <td>{{$reciclaje->id}}</td>
        <td>{{$reciclaje->nombre}}</td>
        <td>{{$reciclaje->kilos}}</td>
        <td>{{$reciclaje->totalPuntajeMaterial}}</td>
        <td>{{$reciclaje->cantidad}}</td>
        <td>{{$reciclaje->totalPuntajeProductos}}</td>
        <td>{{$reciclaje->totalPuntaje}}</td>
        <td>{{$reciclaje->fechaInicio}}</td>
        <td>{{$reciclaje->fechaFin}}</td>
        <td>{{$reciclaje->estado}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</html>
