
<?php
$conn= mysqli_connect("localhost","id13605084_meter","Frank310740@s","id13605084_project") or die("Error: " . mysqli_error($con)); 
mysqli_query($conn, "SET NAMES 'utf8' ");
	$query = "
	SELECT DATETIME AS date, ID AS id,
	A_Irms AS A_Irms, B_Irms AS B_Irms, C_Irms AS C_Irms
	FROM meter
	GROUP BY ID";
$query10="select avg(A_Irms) as 'AVG_A' from meter";
$query11="SELECT A_Irms AS 'MIN_A', DATETIME AS 'DT_MIN' FROM meter WHERE A_Irms = (SELECT MIN(A_Irms) FROM meter WHERE A_Irms <> 0)";
$query12="SELECT A_Irms AS 'MAX_A', DATETIME AS 'DT_MAX' FROM meter WHERE A_Irms = (SELECT MAX(A_Irms) FROM meter)";
$query13="select avg(B_Irms) as 'AVG_B' from meter";
$query14="SELECT B_Irms AS 'MIN_B', DATETIME AS 'DT_MIN' FROM meter WHERE B_Irms = (SELECT MIN(B_Irms) FROM meter WHERE B_Irms <> 0)";
$query15="SELECT B_Irms AS 'MAX_B', DATETIME AS 'DT_MAX' FROM meter WHERE B_Irms = (SELECT MAX(B_Irms) FROM meter)";
$query16="select avg(C_Irms) as 'AVG_C' from meter";
$query17="SELECT C_Irms AS 'MIN_C', DATETIME AS 'DT_MIN' FROM meter WHERE C_Irms = (SELECT MIN(C_Irms) FROM meter WHERE C_Irms <> 0)";
$query18="SELECT C_Irms AS 'MAX_C', DATETIME AS 'DT_MAX' FROM meter WHERE C_Irms = (SELECT MAX(C_Irms) FROM meter)";
$res10=mysqli_query($conn,$query10);
$res11=mysqli_query($conn,$query11);
$res12=mysqli_query($conn,$query12);
$res13=mysqli_query($conn,$query13);
$res14=mysqli_query($conn,$query14);
$res15=mysqli_query($conn,$query15);
$res16=mysqli_query($conn,$query16);
$res17=mysqli_query($conn,$query17);
$res18=mysqli_query($conn,$query18);
$data10=mysqli_fetch_array($res10);
$data11=mysqli_fetch_array($res11);
$data12=mysqli_fetch_array($res12);
$data13=mysqli_fetch_array($res13);
$data14=mysqli_fetch_array($res14);
$data15=mysqli_fetch_array($res15);
$data16=mysqli_fetch_array($res16);
$data17=mysqli_fetch_array($res17);
$data18=mysqli_fetch_array($res18);

$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  

 //for chart
$id = array();
$A_Irms = array();
$B_Irms = array();
$C_Irms = array();
$date = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $id[] = "\"".$rs['id']."\""; 
  $A_Irms[] = "\"".$rs['A_Irms']."\"";
  $B_Irms[] = "\"".$rs['B_Irms']."\"";
  $C_Irms[] = "\"".$rs['C_Irms']."\"";
  $date[] = "\"".$rs['date']."\""; 
}
$id = implode(",", $id); 
$A_Irms = implode(",", $A_Irms);
$B_Irms = implode(",", $B_Irms);
$C_Irms = implode(",", $C_Irms);
$date = implode(",", $date);  

            ?>       
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
<p align="center">

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
            </p>

        </div>
    </div>
</div> 
<hr>
<table width="1300" border="1" cellpadding="10"  cellspacing="0" align="center">

<tr><td rowspan="2" colspan="2" align="center" bgcolor="black"><h7><font size="6" color="white"><b>CURRENT<br>Parameter</td>
<td rowspan="2" align="center" width="15%"><h6><font size="6">Average Value</td>
<td colspan="2" align="center"><h6><font size="6">Minimum Value</td>
<td colspan="2" align="center"><h6><font size="6">Maximum Value</td></tr>
<tr><td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td>
<td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td></tr>
<tr><td rowspan="3" align="center"><h1><font size="6">Current<br>[A]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data10['AVG_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data11['MIN_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data11['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data12['MAX_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data12['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data13['AVG_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data14['MIN_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data14['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data15['MAX_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data15['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data16['AVG_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data17['MIN_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data17['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data18['MAX_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data18['DT_MAX'];?> 
        </td>
</tr>
</table>
<hr>