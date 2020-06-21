<html>
<?php
$conn= mysqli_connect("localhost","id13605084_meter","Frank310740@s","id13605084_project") or die("Error: " . mysqli_error($con)); 
mysqli_query($conn, "SET NAMES 'utf8' ");
	$query = "
	SELECT DATETIME AS date, ID AS id,
	A_PF AS A_PF, B_PF AS B_PF, C_PF AS C_PF
	FROM meter
	GROUP BY ID";
$query46="select avg(A_PF) as 'AVG_A' from meter";
$query47="SELECT A_PF AS 'MIN_A', DATETIME AS 'DT_MIN' FROM meter WHERE A_PF = (SELECT MIN(A_PF) FROM meter WHERE A_PF <> 0)";
$query48="SELECT A_PF AS 'MAX_A', DATETIME AS 'DT_MAX' FROM meter WHERE A_PF = (SELECT MAX(A_PF) FROM meter)";
$query49="select avg(B_PF) as 'AVG_B' from meter";
$query50="SELECT B_PF AS 'MIN_B', DATETIME AS 'DT_MIN' FROM meter WHERE B_PF = (SELECT MIN(B_PF) FROM meter WHERE B_PF <> 0)";
$query51="SELECT B_PF AS 'MAX_B', DATETIME AS 'DT_MAX' FROM meter WHERE B_PF = (SELECT MAX(B_PF) FROM meter)";
$query52="select avg(C_PF) as 'AVG_C' from meter";
$query53="SELECT C_PF AS 'MIN_C', DATETIME AS 'DT_MIN' FROM meter WHERE C_PF = (SELECT MIN(C_PF) FROM meter WHERE C_PF <> 0)";
$query54="SELECT C_PF AS 'MAX_C', DATETIME AS 'DT_MAX' FROM meter WHERE C_PF = (SELECT MAX(C_PF) FROM meter)";
$res46=mysqli_query($conn,$query46);
$res47=mysqli_query($conn,$query47);
$res48=mysqli_query($conn,$query48);
$res49=mysqli_query($conn,$query49);
$res50=mysqli_query($conn,$query50);
$res51=mysqli_query($conn,$query51);
$res52=mysqli_query($conn,$query52);
$res53=mysqli_query($conn,$query53);
$res54=mysqli_query($conn,$query54);
$data46=mysqli_fetch_array($res46);
$data47=mysqli_fetch_array($res47);
$data48=mysqli_fetch_array($res48);
$data49=mysqli_fetch_array($res49);
$data50=mysqli_fetch_array($res50);
$data51=mysqli_fetch_array($res51);
$data52=mysqli_fetch_array($res52);
$data53=mysqli_fetch_array($res53);
$data54=mysqli_fetch_array($res54);

$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  

 //for chart
$id = array();
$A_PF = array();
$B_PF = array();
$C_PF = array();
$date = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $id[] = "\"".$rs['id']."\""; 
  $A_PF[] = "\"".$rs['A_PF']."\"";
  $B_PF[] = "\"".$rs['B_PF']."\"";
  $C_PF[] = "\"".$rs['C_PF']."\"";
  $date[] = "\"".$rs['date']."\""; 
}
$id = implode(",", $id); 
$A_PF = implode(",", $A_PF);
$B_PF = implode(",", $B_PF);
$C_PF = implode(",", $C_PF);
$date = implode(",", $date);  

            ?>     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
<p align="center">
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

            </p>

        </div>
    </div>
</div> 
<hr>
<table width="1300" border="1" cellpadding="10"  cellspacing="0" align="center">

<tr><td rowspan="2" colspan="2" align="center" bgcolor="black"><h7><font size="6" color="white"><b>POWER-FACTOR<br>Parameter</td>
<td rowspan="2" align="center" width="15%"><h6><font size="6">Average Value</td>
<td colspan="2" align="center"><h6><font size="6">Minimum Value</td>
<td colspan="2" align="center"><h6><font size="6">Maximum Value</td></tr>
<tr><td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td>
<td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td></tr>
<tr><td rowspan="3" align="center"><h1><font size="6">Power Factor</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data46['AVG_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data47['MIN_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data47['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data48['MAX_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data48['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data49['AVG_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data50['MIN_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data50['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data51['MAX_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data51['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data52['AVG_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data53['MIN_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data53['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data54['MAX_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data54['DT_MAX'];?> 
        </td>
</tr>
</table>
<hr>

</html>