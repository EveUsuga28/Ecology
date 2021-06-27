
@extends('layouts.app')

@section('css')

@endsection

@section('content')


    <!--Encabezado-->
    <x-datos datos="Informes"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="col-4">
        <a href="/informes/imprimir" class="d-none d-sm-inline-block btn btn-sm  btn-primary shadow-sm"></a>
        <i class="fas fa-print fa-sm text-whit-50">Imprimir</i>
    </div>

        <div class="container">
            <div class="row col-6" >
            <canvas id="myChart" width="400" height="400"></canvas>
        
        </div>
        </div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.0/dist/chart.min.js"></script>
<script>

        var grupos=[];
        var valores=[];

    $(document).ready(function(){

        $.ajax({
            url:'/informes/all',
            method:'post',
            data:{
                id:1,
                _token:$('input[name="_token"]').val()
            }
        }).done(function(res){
            var arreglo = JSON.parse(res);
            console.log(arreglo);
            for(var x=0; x<arreglo.length; x++){
              var todo='<tr><td>'+arreglo[x].totalPuntaje+'</td>';
                todo+='<td>'+arreglo[x].nombre+'</td>';
              todo+='<td></td></tr>';
              console.log(todo);
              $('tbody').append(todo);
              grupos.push(arreglo[x].nombre);
              valores.push(arreglo[x].totalPuntaje);

            }
            generarGrafica();
        })
    })
    function generarGrafica(){
        var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: grupos,
                    datasets: [{
                        label: 'Instituciones',
                        data: valores ,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
    }
</script>
@endsection

