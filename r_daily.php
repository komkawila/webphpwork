<html>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $query = "
SELECT DATETIME AS date, ID AS id, 
A_Vrms AS A_Vrms, B_Vrms AS B_Vrms, C_Vrms AS C_Vrms, 
A_Irms AS A_Irms, B_Irms AS B_Irms, C_Irms AS C_Irms, 
A_VA AS A_VA, B_VA AS B_VA, C_VA AS C_VA, 
A_WATT AS A_WATT, B_WATT AS B_WATT, C_WATT AS C_WATT, 
A_VAR AS A_VAR, B_VAR AS B_VAR, C_VAR AS C_VAR, 
A_PF AS A_PF, B_PF AS B_PF, C_PF AS C_PF,
A_KWH AS A_KWH, B_KWH AS B_KWH, C_KWH AS C_KWH
FROM meter
            GROUP BY ID
            ";
$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  

 //for chart
$id = array();
$A_Vrms = array();
$B_Vrms = array();
$C_Vrms = array();
$A_Irms = array();
$B_Irms = array();
$C_Irms = array();
$A_VA = array();
$B_VA = array();
$C_VA = array();
$A_WATT = array();
$B_WATT = array();
$C_WATT = array();
$A_VAR = array();
$B_VAR = array();
$C_VAR = array();
$A_PF = array();
$B_PF = array();
$C_PF = array();
$A_KWH = array();
$B_KWH = array();
$C_KWH = array();
$date = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $id[] = "\"".$rs['id']."\""; 
  $A_Vrms[] = "\"".$rs['A_Vrms']."\"";
  $B_Vrms[] = "\"".$rs['B_Vrms']."\"";
  $C_Vrms[] = "\"".$rs['C_Vrms']."\"";
  $A_Irms[] = "\"".$rs['A_Irms']."\"";
  $B_Irms[] = "\"".$rs['B_Irms']."\"";
  $C_Irms[] = "\"".$rs['C_Irms']."\"";
  $A_VA[] = "\"".$rs['A_VA']."\"";
  $B_VA[] = "\"".$rs['B_VA']."\"";
  $C_VA[] = "\"".$rs['C_VA']."\"";
  $A_WATT[] = "\"".$rs['A_WATT']."\"";
  $B_WATT[] = "\"".$rs['B_WATT']."\"";
  $C_WATT[] = "\"".$rs['C_WATT']."\"";
  $A_VAR[] = "\"".$rs['A_VAR']."\"";
  $B_VAR[] = "\"".$rs['B_VAR']."\"";
  $C_VAR[] = "\"".$rs['C_VAR']."\"";
  $A_PF[] = "\"".$rs['A_PF']."\"";
  $B_PF[] = "\"".$rs['B_PF']."\"";
  $C_PF[] = "\"".$rs['C_PF']."\"";
  $A_KWH[] = "\"".$rs['A_KWH']."\"";
  $B_KWH[] = "\"".$rs['B_KWH']."\"";
  $C_KWH[] = "\"".$rs['C_KWH']."\"";
  $date[] = "\"".$rs['date']."\""; 
}
$id = implode(",", $id); 
$A_Vrms = implode(",", $A_Vrms);
$B_Vrms = implode(",", $B_Vrms);
$C_Vrms = implode(",", $C_Vrms);
$A_Irms = implode(",", $A_Irms);
$B_Irms = implode(",", $B_Irms);
$C_Irms = implode(",", $C_Irms);
$A_VA = implode(",", $A_VA);
$B_VA = implode(",", $B_VA);
$C_VA = implode(",", $C_VA);
$A_WATT = implode(",", $A_WATT);
$B_WATT = implode(",", $B_WATT);
$C_WATT = implode(",", $C_WATT);
$A_VAR = implode(",", $A_VAR);
$B_VAR = implode(",", $B_VAR);
$C_VAR = implode(",", $C_VAR);
$A_PF = implode(",", $A_PF);
$B_PF = implode(",", $B_PF);
$C_PF = implode(",", $C_PF);
$A_KWH = implode(",", $A_KWH);
$B_KWH = implode(",", $B_KWH);
$C_KWH = implode(",", $C_KWH);
$date = implode(",", $date);  

            ?>
            
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<hr>
<p align="center">

<h1 align="center">VOLTAGE CURVE</h1>
<canvas id="myChart1" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart1").getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>],
        datasets: [{
            label: 'Phase:A Voltage [V]',
            data: [<?php echo $A_Vrms;?>],
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:B Voltage [V]',
            data: [<?php echo $B_Vrms;?>],
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:C Voltage [V]',
            data: [<?php echo $C_Vrms;?>],
            backgroundColor: ['rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  
            </p>
<hr>
<p align="center">
<h1 align="center">CURRENT CURVE</h1>
<canvas id="myChart2" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart2").getContext('2d');
var myChart2 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>],
        datasets: [{
            label: 'Phase:A Current [A]', 
            data: [<?php echo $A_Irms;?>],
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:B Current [A]',
            data: [<?php echo $B_Irms;?>],
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:C Current [A]',
            data: [<?php echo $C_Irms;?>],
            backgroundColor: ['rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  

<hr>
<p align="center">
<h1 align="center">REAL-POWER CURVE</h1>
<canvas id="myChart3" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart3").getContext('2d');
var myChart3 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>
    
        ],
        datasets: [{
            label: 'Phase:A Real Power [W]',
            data: [<?php echo $A_WATT;?>],
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:B Real Power [W]',
            data: [<?php echo $B_WATT;?>],
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:C Real Power [W]',
            data: [<?php echo $C_WATT;?>],
            backgroundColor: ['rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  

<hr>
<p align="center">
<h1 align="center">NON-ACTIVE-POWER CURVE</h1>
<canvas id="myChart4" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart4").getContext('2d');
var myChart4 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>
    
        ],
        datasets: [{
            label: 'Phase:A Non-Active Power [VAr]',
            data: [<?php echo $A_VAR;?>],
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:B Non-Active Power [VAr]',
            data: [<?php echo $B_VAR;?>],
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:C Non-Active Power [VAr]',
            data: [<?php echo $C_VAR;?>],
            backgroundColor: ['rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<hr>
<p align="center">
<h1 align="center">APPARENT-POWER CURVE</h1>
<canvas id="myChart5" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart5").getContext('2d');
var myChart5 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>],
        datasets: [{
            label: 'Phase:A Apparent Power [VA]',
            data: [<?php echo $A_VA;?>],
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:B Apparent Power [VA]',
            data: [<?php echo $B_VA;?>],
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:C Apparent Power [VA]',
            data: [<?php echo $C_VA;?>],
            backgroundColor: ['rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  

<hr>
<p align="center">
<h1 align="center">POWER-FACTOR CURVE</h1>
<canvas id="myChart6" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart6").getContext('2d');
var myChart6 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>],
        datasets: [{
            label: 'Phase:A Power Factor',
            data: [<?php echo $A_PF;?>],
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:B Power Factor',
            data: [<?php echo $B_PF;?>],
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:C Power Factor',
            data: [<?php echo $C_PF;?>],
            backgroundColor: ['rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  

<hr>
<p align="center">
<h1 align="center">ENERGY CURVE</h1>
<canvas id="myChart7" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart7").getContext('2d');
var myChart7 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>],
        datasets: [{
            label: 'Phase:A Energy [kWh]',
            data: [<?php echo $A_KWH;?>],
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:B Energy [kWh]',
            data: [<?php echo $B_KWH;?>],
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)'],
            borderWidth: 1
        },
		{
            label: 'Phase:C Energy [kWh]',
            data: [<?php echo $C_KWH;?>],
            backgroundColor: ['rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  
</p> 
        </div>
    </div>
</div> 
</html>