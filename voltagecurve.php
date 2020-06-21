<html>
<?php
$conn= mysqli_connect("localhost","id13605084_meter","Frank310740@s","id13605084_project") or die("Error: " . mysqli_error($con)); 
mysqli_query($conn, "SET NAMES 'utf8' ");
	$query = "
	SELECT DATETIME AS date, ID AS id,
	A_Vrms AS A_Vrms, B_Vrms AS B_Vrms, C_Vrms AS C_Vrms
	FROM meter
	GROUP BY ID";
$query1="select avg(A_Vrms) as 'AVG_A' FROM meter";
$query2="SELECT A_Vrms AS 'MIN_A', DATETIME AS 'DT_MIN_A' FROM meter WHERE A_Vrms = (SELECT MIN(A_Vrms) FROM meter WHERE A_Vrms <> 0)";
$query3="SELECT A_Vrms AS 'MAX_A', DATETIME AS 'DT_MAX_A' FROM meter WHERE A_Vrms = (SELECT MAX(A_Vrms) FROM meter)";
$query4="select avg(B_Vrms) as 'AVG_B' from meter";
$query5="SELECT B_Vrms AS 'MIN_B', DATETIME AS 'DT_MIN_B' FROM meter WHERE B_Vrms = (SELECT MIN(B_Vrms) FROM meter WHERE B_Vrms <> 0)";
$query6="SELECT B_Vrms AS 'MAX_B', DATETIME AS 'DT_MAX_B' FROM meter WHERE B_Vrms = (SELECT MAX(B_Vrms) FROM meter)";
$query7="select avg(C_Vrms) as 'AVG_C' from meter";
$query8="SELECT C_Vrms AS 'MIN_C', DATETIME AS 'DT_MIN_C' FROM meter WHERE C_Vrms = (SELECT MIN(C_Vrms) FROM meter WHERE C_Vrms <> 0)";
$query9="SELECT C_Vrms AS 'MAX_C', DATETIME AS 'DT_MAX_C' FROM meter WHERE C_Vrms = (SELECT MAX(C_Vrms) FROM meter)";
$res1=mysqli_query($conn,$query1);
$res2=mysqli_query($conn,$query2);
$res3=mysqli_query($conn,$query3);
$res4=mysqli_query($conn,$query4);
$res5=mysqli_query($conn,$query5);
$res6=mysqli_query($conn,$query6);
$res7=mysqli_query($conn,$query7);
$res8=mysqli_query($conn,$query8);
$res9=mysqli_query($conn,$query9);
$data1=mysqli_fetch_array($res1);
$data2=mysqli_fetch_array($res2);
$data3=mysqli_fetch_array($res3);
$data4=mysqli_fetch_array($res4);
$data5=mysqli_fetch_array($res5);
$data6=mysqli_fetch_array($res6);
$data7=mysqli_fetch_array($res7);
$data8=mysqli_fetch_array($res8);
$data9=mysqli_fetch_array($res9);

$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  

 //for chart
$id = array();
$A_Vrms = array();
$B_Vrms = array();
$C_Vrms = array();
$date = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $id[] = "\"".$rs['id']."\""; 
  $A_Vrms[] = "\"".$rs['A_Vrms']."\"";
  $B_Vrms[] = "\"".$rs['B_Vrms']."\"";
  $C_Vrms[] = "\"".$rs['C_Vrms']."\"";
  $date[] = "\"".$rs['date']."\""; 
}
$id = implode(",", $id); 
$A_Vrms = implode(",", $A_Vrms);
$B_Vrms = implode(",", $B_Vrms);
$C_Vrms = implode(",", $C_Vrms);
$date = implode(",", $date);  

            ?>     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
<p align="center">

 <!--devbanban.com-->

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

        </div>
    </div>
</div> 
<hr>
<table width="1300" border="1" cellpadding="10"  cellspacing="0" align="center">

<tr><td rowspan="2" colspan="2" align="center" bgcolor="black"><h7><font size="6" color="white"><b>VOLTAGE<br>Parameter</td>
<td rowspan="2" align="center" width="15%"><h6><font size="6">Average Value</td>
<td colspan="2" align="center"><h6><font size="6">Minimum Value</td>
<td colspan="2" align="center"><h6><font size="6">Maximum Value</td></tr>
<tr><td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td>
<td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td></tr>
<tr><td rowspan="3" align="center" width="15%"><h1><font size="6">Voltage<br>[V]</td>
		<td align="center" bgcolor="FFB4B9" width="10%"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data1['AVG_A'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data2['MIN_A'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data2['DT_MIN_A'];?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data3['MAX_A'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data3['DT_MAX_A'];?>
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data4['AVG_B'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data5['MIN_B'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data5['DT_MIN_B'];?>
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data6['MAX_B'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data6['DT_MAX_B'];?>
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data7['AVG_C'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data8['MIN_C'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data8['DT_MIN_C'];?>
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data9['MAX_C'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data9['DT_MAX_C'];?>
        </td>
</tr>
</table>
<hr>

</html>