
<?php
$conn= mysqli_connect("localhost","id13605084_meter","Frank310740@s","id13605084_project") or die("Error: " . mysqli_error($con)); 
mysqli_query($conn, "SET NAMES 'utf8' ");
	$query = "
	SELECT DATETIME AS date, ID AS id,
	A_WATT AS A_WATT, B_WATT AS B_WATT, C_WATT AS C_WATT,
	A_KWH AS A_KWH, B_KWH AS B_KWH, C_KWH AS C_KWH
	FROM meter
	GROUP BY ID";
$query28="select avg(A_WATT) as 'AVG_A' from meter";
$query29="SELECT A_WATT AS 'MIN_A', DATETIME AS 'DT_MIN' FROM meter WHERE A_WATT = (SELECT MIN(A_WATT) FROM meter WHERE A_WATT <> 0)";
$query30="SELECT A_WATT AS 'MAX_A', DATETIME AS 'DT_MAX' FROM meter WHERE A_WATT = (SELECT MAX(A_WATT) FROM meter)";
$query31="select avg(B_WATT) as 'AVG_B' from meter";
$query32="SELECT B_WATT AS 'MIN_B', DATETIME AS 'DT_MIN' FROM meter WHERE B_WATT = (SELECT MIN(B_WATT) FROM meter WHERE B_WATT <> 0)";
$query33="SELECT B_WATT AS 'MAX_B', DATETIME AS 'DT_MAX' FROM meter WHERE B_WATT = (SELECT MAX(B_WATT) FROM meter)";
$query34="select avg(C_WATT) as 'AVG_C' from meter";
$query35="SELECT C_WATT AS 'MIN_C', DATETIME AS 'DT_MIN' FROM meter WHERE C_WATT = (SELECT MIN(C_WATT) FROM meter WHERE C_WATT <> 0)";
$query36="SELECT C_WATT AS 'MAX_C', DATETIME AS 'DT_MAX' FROM meter WHERE C_WATT = (SELECT MAX(C_WATT) FROM meter)";
$res28=mysqli_query($conn,$query28);
$res29=mysqli_query($conn,$query29);
$res30=mysqli_query($conn,$query30);
$res31=mysqli_query($conn,$query31);
$res32=mysqli_query($conn,$query32);
$res33=mysqli_query($conn,$query33);
$res34=mysqli_query($conn,$query34);
$res35=mysqli_query($conn,$query35);
$res36=mysqli_query($conn,$query36);
$data28=mysqli_fetch_array($res28);
$data29=mysqli_fetch_array($res29);
$data30=mysqli_fetch_array($res30);
$data31=mysqli_fetch_array($res31);
$data32=mysqli_fetch_array($res32);
$data33=mysqli_fetch_array($res33);
$data34=mysqli_fetch_array($res34);
$data35=mysqli_fetch_array($res35);
$data36=mysqli_fetch_array($res36);
$query37="select sum(A_KWH) as 'SUM_A_KWH' from meter";
$res37=mysqli_query($conn,$query37);
$data37=mysqli_fetch_array($res37);
$query38="select sum(B_KWH) as 'SUM_B_KWH' from meter";
$res38=mysqli_query($conn,$query38);
$data38=mysqli_fetch_array($res38);
$query39="select sum(C_KWH) as 'SUM_C_KWH' from meter";
$res39=mysqli_query($conn,$query39);
$data39=mysqli_fetch_array($res39);
$data40=720;
$data41=744;
$data42=$data37['SUM_A_KWH']/$data40;
$data43=($data42/$data30['MAX_A'])*100;
$data44=$data38['SUM_B_KWH']/$data40;
$data45=($data44/$data33['MAX_B'])*100;
$data46=$data39['SUM_C_KWH']/$data40;
$data47=($data46/$data36['MAX_C'])*100;

$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  

 //for chart
$id = array();
$A_WATT = array();
$B_WATT = array();
$C_WATT = array();
$A_KWH = array();
$B_KWH = array();
$C_KWH = array();
$date = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $id[] = "\"".$rs['id']."\""; 
  $A_WATT[] = "\"".$rs['A_WATT']."\"";
  $B_WATT[] = "\"".$rs['B_WATT']."\"";
  $C_WATT[] = "\"".$rs['C_WATT']."\"";
  $A_KWH[] = "\"".$rs['A_KWH']."\"";
  $B_KWH[] = "\"".$rs['B_KWH']."\"";
  $C_KWH[] = "\"".$rs['C_KWH']."\"";
  $date[] = "\"".$rs['date']."\""; 
}
$id = implode(",", $id); 
$A_WATT = implode(",", $A_WATT);
$B_WATT = implode(",", $B_WATT);
$C_WATT = implode(",", $C_WATT);
$A_KWH = implode(",", $A_KWH);
$B_KWH = implode(",", $B_KWH);
$C_KWH = implode(",", $C_KWH);
$date = implode(",", $date);  

            ?>       
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
<p align="center">
<canvas id="myChart3" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart3").getContext('2d');
var myChart3 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $date;?>],
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
</p> 
        </div>
    </div>
</div> 
<hr>
<table width="1300" border="1" cellpadding="10"  cellspacing="0" align="center">

<tr><td rowspan="2" colspan="2" align="center" bgcolor="black"><h7><font size="6" color="white"><b>DEMAND<br>Parameter</td>
<td rowspan="2" align="center" width="15%"><h6><font size="6">Average Value</td>
<td colspan="2" align="center"><h6><font size="6">Minimum Value</td>
<td colspan="2" align="center"><h6><font size="6">Maximum Value</td></tr>
<tr><td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td>
<td align="center" width="15%"><h1><font size="6">Value</td>
<td align="center"><h1><font size="6">Date Time</td></tr>
<tr><td rowspan="3" align="center"><h1><font size="6">DEMAND<br>[W]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data28['AVG_A'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data29['MIN_A'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data29['DT_MIN'];?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data30['MAX_A'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data30['DT_MAX'];?>
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data31['AVG_B'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data32['MIN_B'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data32['DT_MIN'];?>
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data33['MAX_B'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data33['DT_MAX'];?>
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data34['AVG_C'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data35['MIN_C'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data35['DT_MIN'];?>
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data36['MAX_C'],2, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data36['DT_MAX'];?>
        </td>
</tr>
</table>
<hr>
<table width="1300" border="1" cellpadding="10" align="center">

<tr><td align="center"><h7><font size="5"><b>DATA</td>
    <td align="center"><h7><font size="5"><b>Average Load [W]</td>
    <td align="center"><h7><font size="5"><b>Maximum Load [W]</td>
    <td align="center" bgcolor="black"><font color="white"><h7><font size="5"><b>Load Factor [%]</td></tr>
<tr><td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
    <td align="center" bgcolor="FFE6E6"><h4>
	<?php echo number_format($data28['AVG_A'],2, '.', '')."";?>
    </td>
    <td align="center" bgcolor="FFE6E6"><h4>
    <?php echo number_format($data30['MAX_A'],2, '.', '')."";?>
    </td>
    <td align="center" bgcolor="FFE6E6"><h4>
    <?php echo number_format($data43,2, '.', '')."";?>
    </td>
</tr>
<tr><td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
    <td align="center" bgcolor="C8FFFF"><h4>
	<?php echo number_format($data31['AVG_B'],2, '.', '')."";?>
    </td>
    <td align="center" bgcolor="C8FFFF"><h4>
    <?php echo number_format($data33['MAX_B'],2, '.', '')."";?>
    </td>
    <td align="center" bgcolor="C8FFFF"><h4>
    <?php echo number_format($data45,2, '.', '')."";?>
    </td>
</tr>
<tr><td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
    <td align="center" bgcolor="FAFAD2"><h4>
	<?php echo number_format($data34['AVG_C'],2, '.', '')."";?>
    </td>
    <td align="center" bgcolor="FAFAD2"><h4>
    <?php echo number_format($data36['MAX_C'],2, '.', '')."";?>
    </td>
    <td align="center" bgcolor="FAFAD2"><h4>
    <?php echo number_format($data47,2, '.', '')."";?>
    </td>
</tr>
</table>
<hr>