
Editar Puntaje

<form action="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail)}}" method="post">
   @csrf
   {{method_field('PATCH')}}

   <br>
   <label form="id_materials" >IdMaterial</label>
   <input type=""  value="{{isset($puntajeMaterial->id_materials)?$puntajeMaterial->id_materials:'' }}"  name="id_materials" id="id_materials" >
   <br>
   <label form="Fecha_Inicio">Fecha_Inicio</label>
   <input type="datetime" value="{{isset($puntajeMaterial->Fecha_Inicio)?$puntajeMaterial->Fecha_Inicio:''}}" name="Fecha_Inicio" id="Fecha_Inicio" >
   <br>


   <label form="Fecha_Inicio" >Fecha_Fin</label>
   <input type="datetime" value="{{isset($puntajeMaterial->Fecha_Fin)?$puntajeMaterial->Fecha_Fin:''}}"  name="Fecha_Fin" id="Fecha_Fin" >
   <br>
   <label form="Puntaje">Puntaje</label>
   <input type="number" value="{{isset($puntajeMaterial->Puntaje)?$puntajeMaterial->Puntaje:''}}" name="Puntaje" id="Puntaje" >
   <br>
   <input type="submit"  value="Guardar Datos " >
   <a href="{{url('puntajeMaterial/') }}">Atrás</a>

</form>

