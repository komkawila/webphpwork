<html>
    <head>
<?php
$conn= mysqli_connect("localhost","id13605084_meter","Frank310740@s","id13605084_project") or die("Error: " . mysqli_error($con)); 
mysqli_query($conn, "SET NAMES 'utf8' ");
	$query = "
	SELECT DATETIME AS date, ID AS id,
	A_VA AS A_VA, B_VA AS B_VA, C_VA AS C_VA
	FROM meter
	GROUP BY ID";
$query19="select avg(A_VA) as 'AVG_A' from meter";
$query20="SELECT A_VA AS 'MIN_A', DATETIME AS 'DT_MIN' FROM meter WHERE A_VA = (SELECT MIN(A_VA) FROM meter WHERE A_VA <> 0)";
$query21="SELECT A_VA AS 'MAX_A', DATETIME AS 'DT_MAX' FROM meter WHERE A_VA = (SELECT MAX(A_VA) FROM meter)";
$query22="select avg(B_VA) as 'AVG_B' from meter";
$query23="SELECT B_VA AS 'MIN_B', DATETIME AS 'DT_MIN' FROM meter WHERE B_VA = (SELECT MIN(B_VA) FROM meter WHERE B_VA <> 0)";
$query24="SELECT B_VA AS 'MAX_B', DATETIME AS 'DT_MAX' FROM meter WHERE B_VA = (SELECT MAX(B_VA) FROM meter)";
$query25="select avg(C_VA) as 'AVG_C' from meter";
$query26="SELECT C_VA AS 'MIN_C', DATETIME AS 'DT_MIN' FROM meter WHERE C_VA = (SELECT MIN(C_VA) FROM meter WHERE C_VA <> 0)";
$query27="SELECT C_VA AS 'MAX_C', DATETIME AS 'DT_MAX' FROM meter WHERE C_VA = (SELECT MAX(C_VA) FROM meter)";
$res19=mysqli_query($conn,$query19);
$res20=mysqli_query($conn,$query20);
$res21=mysqli_query($conn,$query21);
$res22=mysqli_query($conn,$query22);
$res23=mysqli_query($conn,$query23);
$res24=mysqli_query($conn,$query24);
$res25=mysqli_query($conn,$query25);
$res26=mysqli_query($conn,$query26);
$res27=mysqli_query($conn,$query27);
$data19=mysqli_fetch_array($res19);
$data20=mysqli_fetch_array($res20);
$data21=mysqli_fetch_array($res21);
$data22=mysqli_fetch_array($res22);
$data23=mysqli_fetch_array($res23);
$data24=mysqli_fetch_array($res24);
$data25=mysqli_fetch_array($res25);
$data26=mysqli_fetch_array($res26);
$data27=mysqli_fetch_array($res27);

$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  

 //for chart
$id = array();
$A_VA = array();
$B_VA = array();
$C_VA = array();
$date = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $id[] = "\"".$rs['id']."\""; 
  $A_VA[] = "\"".$rs['A_VA']."\"";
  $B_VA[] = "\"".$rs['B_VA']."\"";
  $C_VA[] = "\"".$rs['C_VA']."\"";
  $date[] = "\"".$rs['date']."\""; 
}
$id = implode(",", $id); 
$A_VA = implode(",", $A_VA);
$B_VA = implode(",", $B_VA);
$C_VA = implode(",", $C_VA);
$date = implode(",", $date);  

            ?>     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
<p align="center">
<canvas id="myChart5" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart5").getContext('2d');
var myChart5 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>],
        datasets: [
        {
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
            </p>

        </div>
    </div>
</div> 
<hr>

<table width="1400" border="1" cellpadding="10"  cellspacing="0" align="center">

<tr><td rowspan="2" colspan="2" align="center" bgcolor="black"><h7><font size="6" color="white"><b>APPARENT-POWER<br>Parameter</td>
<td rowspan="2" align="center" width="15%"><h6><font size="6">Average Value</td>
<td colspan="2" align="center"><h6><font size="6">Minimum Value</td>
<td colspan="2" align="center"><h6><font size="6">Maximum Value</td></tr>
<tr><td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td>
<td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td></tr>
<tr><td rowspan="3" align="center"><h1><font size="6">Apparent Power<br>[VA]</td>
<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data19['AVG_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data20['MIN_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data20['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data21['MAX_A'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data21['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data22['AVG_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data23['MIN_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data23['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data24['MAX_B'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data24['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data25['AVG_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data26['MIN_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data26['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data27['MAX_C'],2, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data27['DT_MAX'];?> 
        </td>
</tr>
</table>
<hr>

</html>