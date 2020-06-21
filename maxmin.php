
            <?php
$conn= mysqli_connect("localhost","id13605084_meter","Frank310740@s","id13605084_project") or die("Error: " . mysqli_error($con)); 
mysqli_query($conn, "SET NAMES 'utf8' ");

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
?>

<hr>
<table width="1300" border="1" cellpadding="10" align="center">

<tr><td rowspan="2" colspan="2" align="center" bgcolor="black"><h7><font size="6" color="white"><b>Type Parameter</td>
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
		<?php echo number_format($data1['AVG_A'],4, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data2['MIN_A'],4, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data2['DT_MIN_A'];?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data3['MAX_A'],4, '.', '')."";?>
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data3['DT_MAX_A'];?>
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data4['AVG_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data5['MIN_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data5['DT_MIN_B'];?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data6['MAX_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data6['DT_MAX_B'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data7['AVG_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data8['MIN_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data8['DT_MIN_C'];?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data9['MAX_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data9['DT_MAX_C'];?> 
        </td>
</tr>
<tr><td rowspan="3" align="center"><h1><font size="6">Current<br>[A]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data10['AVG_A'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data11['MIN_A'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data11['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data12['MAX_A'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data12['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data13['AVG_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data14['MIN_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data14['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data15['MAX_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data15['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data16['AVG_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data17['MIN_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data17['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data18['MAX_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data18['DT_MAX'];?> 
        </td>
</tr>
<tr><td rowspan="3" align="center"><h1><font size="6">Non-Active Power [VAr]</td>
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
<tr><td rowspan="3" align="center"><h1><font size="6">Real Power [W]</td>
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
<tr><td rowspan="3" align="center"><h1><font size="6">Apparent Power [VA]</td>
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
<tr><td rowspan="3" align="center"><h1><font size="6">Power Factor</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data46['AVG_A'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data47['MIN_A'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data47['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo number_format($data48['MAX_A'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FFE6E6"><h4>
        <?php echo $data48['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data49['AVG_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data50['MIN_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data50['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo number_format($data51['MAX_B'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="C8FFFF"><h4>
        <?php echo $data51['DT_MAX'];?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data52['AVG_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data53['MIN_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data53['DT_MIN'];?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo number_format($data54['MAX_C'],4, '.', '')."";?> 
        </td>
        <td align="center" bgcolor="FAFAD2"><h4>
        <?php echo $data54['DT_MAX'];?> 
        </td>
</tr>
</table>
<hr>