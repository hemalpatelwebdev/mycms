@extends('layouts.admin')




@section('content')

    <h1>Admin</h1>
    <canvas id="myChart"></canvas>
    
@stop

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['Posts', 'Categories', 'Comments'],
                datasets: [{
                    label: 'Data of CMS',
                    data: [{{$postCount}}, {{$categoryCount}}, {{$commentCount}}],
                    backgroundColor: [
                        'rgb(255, 99, 132, 0.2)',
                        'rgb(54, 162, 235, 0.2)',
                        'rgb(255, 159, 64, 0.2)',
                        'rgb(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 159, 64)',
                        'rgb(153, 102, 255)',
                    ],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
@stop