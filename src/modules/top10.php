<?
function getSt ($int) {
    if ($int == 9) { $char = "Warrior"; }
    if ($int == 10) { $char = "Blader"; }
    if ($int == 11) { $char = "Wizard"; }
    if ($int == 12) { $char = "Force Archer"; }
    if ($int == 4) { $char = "Force Archer"; }
    if ($int == 5) { $char = "Force Shielder"; }
    if ($int == 13) { $char = "Force Shielder"; }
    if ($int == 6) { $char = "Force Blader"; }
    if ($int == 14) { $char = "Force Blader"; }
return $char;
}
function getN ($int) {
    if ($int == 1) { $char = "Procyon"; }
    if ($int == 2) { $char = "Capella"; }
    if ($int == 0) { $char = "None"; }
return $char;
}
echo "
<table width=185 border=0 cellspacing=0 cellpadding=0>

<br>


";

$i=1;

$resTop = mssql_query("SELECT TOP 10 Name, LEV, EXP, CharacterIdx from GameDB.dbo.cabal_character_table order by LEV DESC");
while($result = mssql_fetch_array( $resTop )) {
			

			$Name = $result["Name"];
			$style2ev = $result["LEV"];
			$Exp = $result["EXP"];
			$id = $result["CharacterIdx"];

$resTop1 = mssql_query("SELECT GuildNo from GameDB.dbo.GuildMember Where CharacterIndex = '$id' ");
while($result1 = mssql_fetch_array( $resTop1 )) {
			

			$GuildNo = $result1["GuildNo"];
$i++;
}
$resTop2 = mssql_query("SELECT Nation from GameDB.dbo.cabal_character_table Where Name = '$Name' ");

while($result2 = mssql_fetch_array( $resTop2 )) {
			
			extract($result2);
			$nation = $result2["Nation"];

    			if($nation == 1) {
				$nation = getN($nation);
			}
			if($nation == 2) {
				$nation = getN($nation);
			}
			if($nation == 0) {
				$nation = getN($nation);
			}

}
$resTop3 = mssql_query("SELECT Style from GameDB.dbo.cabal_character_table Where Characteridx = '$id' ");

while($result3 = mssql_fetch_array( $resTop3 )) {
			
			extract($result3);
			$Style1 = $result3["Style"];
		        $r = $Style1;
    
    $style4= round((((($Style1 % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) % hexdec(100)) / 8 );
    $style2 = (((($Style1 % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) % hexdec(100)) -  (($style4 -1) * 8) ;

    			if($style2 == 4) {
				$style2 = getSt($style2);
			}
			if($style2 == 5) {
				$style2 = getSt($style2);
			}
			if($style2 == 6) {
				$style2 = getSt($style2);
			}
			if($style2 == 9) {
				$style2 = getSt($style2);
			}
			if($style2 == 10) {
				$style2 = getSt($style2);
			}
			if($style2 == 11) {
				$style2 = getSt($style2);
			}
			if($style2 == 12) {
				$style2 = getSt($style2);
			}
			if($style2 == 13) {
				$style2 = getSt($style2);
			}
			if($style2 == 14) {
				$style2 = getSt($style2);
			}
    	
    
				
}
 
  			




echo"
<script type='text/javascript'>
	window.addEvent('domready', function(){
		new Accordion('li.atStart', 'div.atStart', {
			opacity: true,
			onActive: function(toggler, element){
				toggler.addClass('toggle-hilite');
			},

			onBackground: function(toggler, element){
				toggler.removeClass('toggle-hilite');
			}
		});
});
</script> 				
					<tr height=17><div id='Topchar'>
						<td align=center width=20  height=19></td>
						<td style='border-bottom: 1px black' align=left width=80  height=19 bgcolor=black><font size=2 color=white><li class='toggler atStart bg1'>$i&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a>$Name</a></b></li></font></td>
						<td align=center width=10  height=19></td>

</tr><table width=185 border=0 cellspacing=0 cellpadding=0 ><div align=justify style='border-top: medium none; border-bottom: medium none; overflow: hidden;  padding-top: 0px; padding-bottom: 0px; height: 0px;' class='element atStart bg1'>
		  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color=white>Level : $style2ev </font><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color=white>Class : $style2 </font><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color=white>Nation : $nation</font> <br>
				</div>
";
}
echo "					<tr height=17>
						<td align=center width=20  height=19></td>
						<td align=center width=80 height=19></td>
						<td align=center width=10  height=19></td>
					</tr></table><br><br>";



?>