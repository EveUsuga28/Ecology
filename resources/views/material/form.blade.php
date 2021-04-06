
@extends('layouts.app')

@section('content')
Formulario Material
<br>
<label For="NomreMaterial" >Nombre Material</label>
    <input type="text" name="NomreMaterial"  value="{{ isset($material->NomreMaterial)?$material->NomreMaterial:'' }}" id="NomreMaterial">
    </br>

    <label For="Puntaje" >Puntaje</label>
    <input type="number" name="Puntaje"  value="{{ isset($material->Puntaje)?$material->Puntaje:'' }}" id="Puntaje">

    </br>
    <label For="Kilos" >Kilos</label>
    <input type="number" name="Kilos" value="{{ isset($material->Kilos)?$material->Kilos:'' }}" id="Kilos">

    </br>

    @if(isset($material->Foto))
    <label For="Foto" >Foto</label>
      <!--{{$material->Foto}}-->

    <img src="{{asset('storage').'/'.$material->Foto}}"  width="100" alt="">

      @endif
    <input type="file" name="Foto" value="" id="Foto">

    </br>
    <input type="submit"value="Guardar Datos">
     <a href="{{url('material/') }}">Atrás</a>

     
