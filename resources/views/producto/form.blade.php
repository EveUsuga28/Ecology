@extends('layouts.app')

<!--
Formulario Producto
<br>
<label For="nombre" >Nombre Producto</label>
    <input type="text" name="nombre"  value="{{ isset($producto->nombre)?$producto->nombre:'' }}" id="nombre">
    </br>

    <label For="puntaje" >Puntaje</label>
    <input type="number" name="puntaje"  value="{{ isset($producto->puntaje)?$producto->puntaje:'' }}" id="puntaje">
    </br>

    @if(isset($producto->foto))
    <label For="foto" >Foto</label>
      

    <img src="{{asset('storage').'/'.$producto->foto}}"  width="100" alt="">

      @endif
    <input type="file" name="foto" value="" id="foto">

    </br>
    <input type="submit"value="Guardar Datos">
     <a href="{{url('producto/') }}">Atrás</a>
  -->