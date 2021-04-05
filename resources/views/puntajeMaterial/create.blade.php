
Crear Puntaje
<form action="{{url('/puntajeMaterial')}}" method="POST">
@csrf
 <br>
 <label form="id_materials" >IdMaterial</label>
 <input type=""  value="{{$id}}"  name="id_materials" id="id_materials" >
 <br>
 <?php
date_default_timezone_set('America/Bogota');
$Fecha_Inicio =date("Y-m-d H:i:s");
?>
 <label form="Fecha_Inicio">Fecha_Inicio</label>
 <input type="datetime" value="<?= $Fecha_Inicio ?>" name="Fecha_Inicio" id="Fecha_Inicio" >
 <br>


 <label form="Fecha_Inicio"  >Fecha_Fin</label>
 <input type="datetime" value=""   name="Fecha_Fin" id="Fecha_Fin" >
 <br>
 <label form="Puntaje">Puntaje</label>
 <input type="number" value="" name="Puntaje" id="Puntaje" >
 <br>
 <input type="submit"  value="Guardar Datos " >
 <a href="{{url('puntajeMaterial/') }}">Atrás</a>

</form>
