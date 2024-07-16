<?PHP 
echo " 
$i=0;
$resTop = mssql_query("SELECT Top 20 ChaName,ChaPk FROM RanGame1.dbo.ChaInfo order by ChaLevel DESC");
while($result = mssql_fetch_array( $resTop )) {
$i++;			

$Name = $result['ChaName'];
$Pk = $result['ChaPk'];


  			




echo"						<div class='hot_box' onmouseover='SetRolling2 =  false;' onmouseout='SetRolling2 =  true;'
							style='FLOAT:left'><br>
							<div class='hot_product'>&nbsp;&nbsp;<table><tr><td>$i</td><td>$Name</td><td>$Pk</td></tr></table></div>
							<div style='margin-top:5px;'  align='center'><table><tr><td align=center><font size=1></td></tr></div>
						</div>
							
            

         

            ";
        }



?>