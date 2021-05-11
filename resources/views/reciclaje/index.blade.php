@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>fecha Inicio</td>
                <td>Fecha fin</td>
                <td>estado</td>
            </tr>
        </thead>
        <tbody>
            @foreach($reciclaje_institucion as $reciclaje)
                <tr>
                    <td>{{$reciclaje->id}}</td>
                    <td>{{$reciclaje->fechaInicio}}</td>
                    <td>{{$reciclaje->fechaFin}}</td>
                    <td>{{$reciclaje->estado}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

@section('js')


@endsection
