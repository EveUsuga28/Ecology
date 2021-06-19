<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .titulo{

            text-align:center;
            font: 2rem;
            Color: blue;

        }
    </style>
</head>
<body>
    <div class="titulo">Infomres</div>

    <table>
        <th>
     <thead>
            <td>Nombre</td>
            <td>TOtal</td>
        </th>
    </thead>
    </table>
    <tbody>
        @foreach($informes as $informe)
        <tr>
            <td>{{$p->nombre}}</td>
            <td>{{$p->totalPuntaje}}</td>
        </tr>
        
        @endforeach
    </tbody>

</body>
</html>