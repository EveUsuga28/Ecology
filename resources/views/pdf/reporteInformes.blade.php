<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <style>
        .titulo{
            text-align: center;
            font-size : 2rem;
            color : green;
        }
    </style>

    <title>Document</title>
</head>
<body>
    <div><h1 class="titulo">Informes</h1></div>
        <table  class="table table-striped" style="width : 90%" border="10px">
             <thead>
                 <tr>
                        <th>Nombre Institución</th>
                        <th>Total Puntaje</th>
                 </tr>
              </thead>

        <tbody>
            @foreach ( $reciclaje as $reciclajes )

               <tr>

                     <td>{{$reciclajes->nombre}}</td>
                     <td>{{$reciclajes->totalPuntaje}}</td>

               </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>
