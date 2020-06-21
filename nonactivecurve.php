<html>
<?php
$conn= mysqli_connect("localhost","id13605084_meter","Frank310740@s","id13605084_project") or die("Error: " . mysqli_error($con)); 
mysqli_query($conn, "SET NAMES 'utf8' ");
	$query = "
	SELECT DATETIME AS date, ID AS id,
	A_VAR AS A_VAR, B_VAR AS B_VAR, C_VAR AS C_VAR
	FROM meter
	GROUP BY ID";
$query37="select avg(A_VAR) as 'AVG_A' from meter";
$query38="SELECT A_VAR AS 'MIN_A', DATETIME AS 'DT_MIN' FROM meter WHERE A_VAR = (SELECT MIN(A_VAR) FROM meter WHERE A_VAR <> 0)";
$query39="SELECT A_VAR AS 'MAX_A', DATETIME AS 'DT_MAX' FROM meter WHERE A_VAR = (SELECT MAX(A_VAR) FROM meter)";
$query40="select avg(B_VAR) as 'AVG_B' from meter";
$query41="SELECT B_VAR AS 'MIN_B', DATETIME AS 'DT_MIN' FROM meter WHERE B_VAR = (SELECT MIN(B_VAR) FROM meter WHERE B_VAR <> 0)";
$query42="SELECT B_VAR AS 'MAX_B', DATETIME AS 'DT_MAX' FROM meter WHERE B_VAR = (SELECT MAX(B_VAR) FROM meter)";
$query43="select avg(C_VAR) as 'AVG_C' from meter";
$query44="SELECT C_VAR AS 'MIN_C', DATETIME AS 'DT_MIN' FROM meter WHERE C_VAR = (SELECT MIN(C_VAR) FROM meter WHERE C_VAR <> 0)";
$query45="SELECT C_VAR AS 'MAX_C', DATETIME AS 'DT_MAX' FROM meter WHERE C_VAR = (SELECT MAX(C_VAR) FROM meter)";
$res37=mysqli_query($conn,$query37);
$res38=mysqli_query($conn,$query38);
$res39=mysqli_query($conn,$query39);
$res40=mysqli_query($conn,$query40);
$res41=mysqli_query($conn,$query41);
$res42=mysqli_query($conn,$query42);
$res43=mysqli_query($conn,$query43);
$res44=mysqli_query($conn,$query44);
$res45=mysqli_query($conn,$query45);
$data37=mysqli_fetch_array($res37);
$data38=mysqli_fetch_array($res38);
$data39=mysqli_fetch_array($res39);
$data40=mysqli_fetch_array($res40);
$data41=mysqli_fetch_array($res41);
$data42=mysqli_fetch_array($res42);
$data43=mysqli_fetch_array($res43);
$data44=mysqli_fetch_array($res44);
$data45=mysqli_fetch_array($res45);

$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  

 //for chart
$id = array();
$A_VAR = array();
$B_VAR = array();
$C_VAR = array();
$date = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $id[] = "\"".$rs['id']."\""; 
  $A_VAR[] = "\"".$rs['A_VAR']."\"";
  $B_VAR[] = "\"".$rs['B_VAR']."\"";
  $C_VAR[] = "\"".$rs['C_VAR']."\"";
  $date[] = "\"".$rs['date']."\""; 
}
$id = implode(",", $id); 
$A_VAR = implode(",", $A_VAR);
$B_VAR = implode(",", $B_VAR);
$C_VAR = implode(",", $C_VAR);
$date = implode(",", $date);  

            ?>     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
<p align="center">
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

            </p>

        </div>
    </div>
</div> 
<hr>
<table width="1300" border="1" cellpadding="10" align="center">

<tr><td rowspan="2" colspan="2" align="center" bgcolor="black"><h7><font size="6" color="white"><b>NON-ACTIVE<br>POWER<br>Parameter</td>
<td rowspan="2" align="center" width="15%"><h6><font size="6">Average Value</td>
<td colspan="2" align="center"><h6><font size="6">Minimum Value</td>
<td colspan="2" align="center"><h6><font size="6">Maximum Value</td></tr>
<tr><td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td>
<td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td></tr>
<tr><td rowspan="3" align="center"><h1><font size="6">NON-ACTIVE<br>Power [VA]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data37['AVG_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data38['MIN_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data38['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data39['MAX_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data39['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data40['AVG_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data41['MIN_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data41['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data42['MAX_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data42['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data43['AVG_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data44['MIN_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data44['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data45['MAX_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data45['DT_MAX'];?> 
        </td>
</tr>
</table>
<hr>

</html>