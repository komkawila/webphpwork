
            <?php
            $query = "
SELECT DATETIME AS date, ID AS id, F_Hz AS F_Hz,
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
$result1 = mysqli_query($con, $query);
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
$F_Hz = array();
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
  $F_Hz[] = "\"".$rs['F_Hz']."\"";
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
$F_Hz = implode(",", $F_Hz);
$date = implode(",", $date); 
?>

<hr>
<table width="2100" border="1" cellpadding="6"  align="center">

<tr><td rowspan="2" align="center" bgcolor="black" width="10%"><h6><font color="white" size="8"><b>DATE TIME</font></td>
<td colspan="3" align="center"><b><h1><font size="6"><b>VOLTAGE<br>[V]</td>
<td colspan="3" align="center"><b><h1><font size="6"><b>CURRENT<br>[A]</td>
<td colspan="3" align="center"><b><h1><font size="6"><b>REAL POWER<br>[W]</td>
<td colspan="3" align="center"><b><h1><font size="6"><b>APPARENT POWER [VA]</td>
<td colspan="3" align="center"><b><h1><font size="6"><b>NON-ACTIVE POWER [VAr]</td>
<td colspan="3" align="center"><h1><font size="6"><b>POWER FACTOR</td>
<td colspan="3" align="center"><b><h1><font size="6"><b>ENERGY<br>[KWr]</td>
<td rowspan="2" align="center" width="4%"><b><h1><font size="6"><b>FREQUENCY [Hz]</td></tr>
<tr><td align="center" bgcolor="FFB4B9"><h5>Phase:A</td>
<td align="center" bgcolor="5AD2FF"><h5>Phase:B</td>
<td align="center" bgcolor="FFEB46"><h5>Phase:C</td>
<td align="center" bgcolor="FFB4B9"><h5>Phase:A</td>
<td align="center" bgcolor="5AD2FF"><h5>Phase:B</td>
<td align="center" bgcolor="FFEB46"><h5>Phase:C</td>
<td align="center" bgcolor="FFB4B9"><h5>Phase:A</td>
<td align="center" bgcolor="5AD2FF"><h5>Phase:B</td>

<td align="center" bgcolor="FFEB46"><h5>Phase:C</td>
<td align="center" bgcolor="FFB4B9"><h5>Phase:A</td>
<td align="center" bgcolor="5AD2FF"><h5>Phase:B</td>
<td align="center" bgcolor="FFEB46"><h5>Phase:C</td>
<td align="center" bgcolor="FFB4B9"><h5>Phase:A</td>
<td align="center" bgcolor="5AD2FF"><h5>Phase:B</td>
<td align="center" bgcolor="FFEB46"><h5>Phase:C</td>
<td align="center" bgcolor="FFB4B9"><h5>Phase:A</td>
<td align="center" bgcolor="5AD2FF"><h5>Phase:B</td>
<td align="center" bgcolor="FFEB46"><h5>Phase:C</td>
<td align="center" bgcolor="FFB4B9"><h5>Phase:A</td>
<td align="center" bgcolor="5AD2FF"><h5>Phase:B</td>
<td align="center" bgcolor="FFEB46"><br/><h5>Phase:C<br/><br/></td></tr>
  <?php while($row = mysqli_fetch_array($result)) { ?>
<tr>
      <td align="center"><h4><?php echo $row['date'];?></td>
      <td align="center" bgcolor="FFE6E6"><h4><?php echo $row['A_Vrms'];?></td>
      <td align="center" bgcolor="C8FFFF"><h4><?php echo $row['B_Vrms'];?></td>
      <td align="center" bgcolor="FAFAD2"><h4><?php echo $row['C_Vrms'];?></td>
      <td align="center" bgcolor="FFE6E6"><h4><?php echo $row['A_Irms'];?></td>
      <td align="center" bgcolor="C8FFFF"><h4><?php echo $row['B_Irms'];?></td>
      <td align="center" bgcolor="FAFAD2"><h4><?php echo $row['C_Irms'];?></td>
      <td align="center" bgcolor="FFE6E6"><h4><?php echo $row['A_VA'];?></td>
      <td align="center" bgcolor="C8FFFF"><h4><?php echo $row['B_VA'];?></td>
      <td align="center" bgcolor="FAFAD2"><h4><?php echo $row['C_VA'];?></td>
      <td align="center" bgcolor="FFE6E6"><h4><?php echo $row['A_WATT'];?></td>
      <td align="center" bgcolor="C8FFFF"><h4><?php echo $row['B_WATT'];?></td>
      <td align="center" bgcolor="FAFAD2"><h4><?php echo $row['C_WATT'];?></td>
      <td align="center" bgcolor="FFE6E6"><h4><?php echo $row['A_VAR'];?></td>
      <td align="center" bgcolor="C8FFFF"><h4><?php echo $row['B_VAR'];?></td>
      <td align="center" bgcolor="FAFAD2"><h4><?php echo $row['C_VAR'];?></td>
      <td align="center" bgcolor="FFE6E6"><h4><?php echo $row['A_PF'];?></td>
      <td align="center" bgcolor="C8FFFF"><h4><?php echo $row['B_PF'];?></td>
      <td align="center" bgcolor="FAFAD2"><h4><?php echo $row['C_PF'];?></td>
      <td align="center" bgcolor="FFE6E6"><h4><?php echo $row['A_KWH'];?></td>
      <td align="center" bgcolor="C8FFFF"><h4><?php echo $row['B_KWH'];?></td>
      <td align="center" bgcolor="FAFAD2"><h4><?php echo $row['C_KWH'];?></td>
      <td align="center" bgcolor="white"><h4><?php echo $row['F_Hz'];?></td>

    </tr>
    <?php } ?>

</table>
     <hr>   