
            <?php
$conn= mysqli_connect("localhost","id13605084_meter","Frank310740@s","id13605084_project") or die("Error: " . mysqli_error($con)); 
mysqli_query($conn, "SET NAMES 'utf8' ");

$query1="SELECT ID AS 'MAX_ID', DATETIME AS 'DT_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query2="SELECT ID AS 'MAX_ID', A_Vrms AS 'A_Vrms_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query3="SELECT ID AS 'MAX_ID', B_Vrms AS 'B_Vrms_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query4="SELECT ID AS 'MAX_ID', C_Vrms AS 'C_Vrms_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query5="SELECT ID AS 'MAX_ID', A_Irms AS 'A_Irms_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query6="SELECT ID AS 'MAX_ID', B_Irms AS 'B_Irms_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query7="SELECT ID AS 'MAX_ID', C_Irms AS 'C_Irms_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query8="SELECT ID AS 'MAX_ID', A_VA AS 'A_VA_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query9="SELECT ID AS 'MAX_ID', B_VA AS 'B_VA_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query10="SELECT ID AS 'MAX_ID', C_VA AS 'C_VA_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query11="SELECT ID AS 'MAX_ID', A_VAR AS 'A_VAR_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query12="SELECT ID AS 'MAX_ID', B_VAR AS 'B_VAR_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query13="SELECT ID AS 'MAX_ID', C_VAR AS 'C_VAR_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query14="SELECT ID AS 'MAX_ID', A_WATT AS 'A_WATT_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query15="SELECT ID AS 'MAX_ID', B_WATT AS 'B_WATT_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query16="SELECT ID AS 'MAX_ID', C_WATT AS 'C_WATT_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query17="SELECT ID AS 'MAX_ID', A_KWH AS 'A_KWH_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query18="SELECT ID AS 'MAX_ID', B_KWH AS 'B_KWH_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query19="SELECT ID AS 'MAX_ID', C_KWH AS 'C_KWH_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query20="SELECT ID AS 'MAX_ID', A_PF AS 'A_PF_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query21="SELECT ID AS 'MAX_ID', B_PF AS 'B_PF_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query22="SELECT ID AS 'MAX_ID', C_PF AS 'C_PF_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$query23="SELECT ID AS 'MAX_ID', F_Hz AS 'F_Hz_NEW' FROM meter WHERE ID = (SELECT MAX(ID) FROM meter)";
$res1=mysqli_query($conn,$query1);
$res2=mysqli_query($conn,$query2);
$res3=mysqli_query($conn,$query3);
$res4=mysqli_query($conn,$query4);
$res5=mysqli_query($conn,$query5);
$res6=mysqli_query($conn,$query6);
$res7=mysqli_query($conn,$query7);
$res8=mysqli_query($conn,$query8);
$res9=mysqli_query($conn,$query9);
$res10=mysqli_query($conn,$query10);
$res11=mysqli_query($conn,$query11);
$res12=mysqli_query($conn,$query12);
$res13=mysqli_query($conn,$query13);
$res14=mysqli_query($conn,$query14);
$res15=mysqli_query($conn,$query15);
$res16=mysqli_query($conn,$query16);
$res17=mysqli_query($conn,$query17);
$res18=mysqli_query($conn,$query18);
$res19=mysqli_query($conn,$query19);
$res20=mysqli_query($conn,$query20);
$res21=mysqli_query($conn,$query21);
$res22=mysqli_query($conn,$query22);
$res23=mysqli_query($conn,$query23);
$data1=mysqli_fetch_array($res1);
$data2=mysqli_fetch_array($res2);
$data3=mysqli_fetch_array($res3);
$data4=mysqli_fetch_array($res4);
$data5=mysqli_fetch_array($res5);
$data6=mysqli_fetch_array($res6);
$data7=mysqli_fetch_array($res7);
$data8=mysqli_fetch_array($res8);
$data9=mysqli_fetch_array($res9);
$data10=mysqli_fetch_array($res10);
$data11=mysqli_fetch_array($res11);
$data12=mysqli_fetch_array($res12);
$data13=mysqli_fetch_array($res13);
$data14=mysqli_fetch_array($res14);
$data15=mysqli_fetch_array($res15);
$data16=mysqli_fetch_array($res16);
$data17=mysqli_fetch_array($res17);
$data18=mysqli_fetch_array($res18);
$data19=mysqli_fetch_array($res19);
$data20=mysqli_fetch_array($res20);
$data21=mysqli_fetch_array($res21);
$data22=mysqli_fetch_array($res22);
$data23=mysqli_fetch_array($res23);
?>

<hr>
<table width="1300" border="1" cellpadding="10" align="center">
<tr><td colspan="3" align="center"><h7><font size="6" color="red"><b><?php echo $data1['DT_NEW'];?></td>
<tr><td colspan="2" align="center" bgcolor="black"><h7><font size="6" color="white"><b>Type Parameter</td>
<td align="center" width="15%"><h6><font size="6">Present Value</td>
<tr><td rowspan="3" align="center" width="15%"><h1><font size="8">Voltage [V]</td>
		<td align="center" bgcolor="FFB4B9" width="10%"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data2['A_Vrms_NEW'],2, '.', '')."";?>
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data3['B_Vrms_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data4['C_Vrms_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr><td rowspan="3" align="center"><h1><font size="8">Current [A]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data5['A_Irms_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data6['B_Irms_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data7['C_Irms_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr><td rowspan="3" align="center"><h1><font size="8">Non-Active Power [VAr]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data8['A_VA_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data9['B_VA_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data10['C_VA_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr><td rowspan="3" align="center"><h1><font size="8">Real Power [W]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data11['A_VAR_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data12['B_VAR_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data13['C_VAR_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr><td rowspan="3" align="center"><h1><font size="8">Apparent Power [VA]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data14['A_WATT_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data15['B_WATT_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data16['C_WATT_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr><td rowspan="3" align="center"><h1><font size="8">Power Factor</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data20['A_PF_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data21['B_PF_NEW'],2, '.', '')."";?> 
        </td>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data22['C_PF_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr><td rowspan="3" align="center"><h1><font size="8">Energy [kWh]</td>
		<td align="center" bgcolor="FFB4B9"><h7><b>Phase : A</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data17['A_KWH_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr>
		<td align="center" bgcolor="5AD2FF"><h7><b>Phase : B</td>
		<td align="center" bgcolor="C8FFFF"><h4>
		<?php echo number_format($data18['B_KWH_NEW'],2, '.', '')."";?> 
        </td>
<tr>
		<td align="center" bgcolor="FFEB46"><h7><b>Phase : C</td>
		<td align="center" bgcolor="FAFAD2"><h4>
		<?php echo number_format($data19['C_KWH_NEW'],2, '.', '')."";?> 
        </td>
</tr>
<tr><td colspan="2" align="center"><h1><font size="8">Frequency [Hz]</td>
		<td align="center" bgcolor="FFE6E6"><h4>
		<?php echo number_format($data23['F_Hz_NEW'],2, '.', '')."";?> 
        </td>
</tr>
</table>
<hr>