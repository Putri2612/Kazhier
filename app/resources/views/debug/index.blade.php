<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
    <canvas id="canvas" width="200" height="300"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script>
        // const ctx = document.querySelector('#canvas').getContext('2d'),
        //     chart = new Chart(ctx, {
        //         type: 'line',
        //         data: {
        //             labels: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
        //             datasets: [{
        //                 label: "Pengeluaran",
        //                 borderColor:"#ff5909",
        //                 fill: true,
        //                 backgroundColor:"#ff590933",
        //                 data:[0,0,0,0,0,0,0,0,0,0,0,0]
        //             },{
        //                 label:"Pendapatan",
        //                 borderColor:"#0087f8",
        //                 fill: true,
        //                 backgroundColor:"#0087f833",
        //                 data:[0,0,0,0,0,0,0,0,0,0,0,0]
        //             }] 
        //         },
        //         options: {
        //             scales: {
        //                 yAxis: {
        //                     min: 0,
        //                     ticks: {
        //                         callback: function(label, index, labels){
        //                             return new Intl.NumberFormat('id', { maximumSignificantDigits: 2 }).format(label);
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     });
        const Data = {
            Cashflow: [{
                label:"Pengeluaran",
                borderColor:"#ff5909",
                backgroundColor:"#ff590933",
                fill:true,
                data:[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
            },{
                label:"Pendapatan",
                borderColor:"#0087f8",
                backgroundColor:"#0087f833",
                fill:true,
                data:[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
            }]        
        }
        const Canvas = {
            Cashflow: document.querySelector('#canvas').getContext('2d'),
        }

        const DisplayCharts = {
            Cashflow: new Chart(Canvas.Cashflow, {
                type: 'line',
                data: {
                    labels: ["01-Feb","02-Feb","03-Feb","04-Feb","05-Feb","06-Feb","07-Feb","08-Feb","09-Feb","10-Feb","11-Feb","12-Feb","13-Feb","14-Feb","15-Feb","16-Feb","17-Feb","18-Feb","19-Feb","20-Feb","21-Feb","22-Feb","23-Feb","24-Feb","25-Feb","26-Feb","27-Feb","28-Feb"],
                    datasets: Data.Cashflow,
                },
                options: {
                    scales: {
                        yAxis: {
                            ticks: {
                                callback: function(label, index, labels){
                                    return new Intl.NumberFormat('id', { maximumSignificantDigits: 2 }).format(label);
                                }
                            }
                        }
                    }
                }
            })
        }

    </script>
</body>
</html>