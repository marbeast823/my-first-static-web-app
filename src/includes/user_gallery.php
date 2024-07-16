<?php 

	$handle=opendir('modules/user_gallery.'); 
	$strSought = "jpg"; 
	$imgCount = 0;  

	while ($file = readdir($handle)) 
	{ 
		if ($strSought == substr($file, -3)) 
		{ 
		    $imgCount = $imgCount + 1; 
		} 
	} 

	closedir($handle);

	if ($imgCount != 0)
	{
		$handle=opendir('modules/user_gallery'); 

		$perRow = 4;

		$numRows = $imgCount/$perRow;

		$imgNum = 0;

		echo "<table width=\"100\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">"; 

	 	//Note: readdir returns filenames in the order in which they are 
	 	//    stored by the filesystem. Future enhancement: sort by filename 
	 	//    (sequence they were shot) 
	 	
	 	while (false !== ($file = readdir($handle))) 
	 	{ 
			if ($strSought == substr($file, -3)) 
			{ 
			    $imgNum++;
                            $file2="modules/user_gallery/$file";

			    $size = GetImageSize($file2);

			    $jpglink = substr($file, 0, 8);
                            require("modules/user_gallery/$file.php");
			    echo "
<td><img src=\"images/pic_left.gif\">
<td><br><br><a href=\"modules/user_gallery/$file\" target=\"blank_\"><img src=\"modules/user_gallery/$file\" height=\"100\" width=\"80\" border=\"0\" hspace=\"0\" vspace=\"0\"><div align=\"center\"></a>$title<br>By <a href=\"index.php?op=character&character=$by\">$by</a></div>
<td><img src=\"images/pic_right.gif\">";						

			    //modulus (%) $a % $b remainder of $a divided by $b 
			    if ($imgNum%$perRow)
			    {
				echo "</td>";
			    }
			    else							
			    {
				echo "</td></tr><tr>";
			    }
		 	 }
	  } 

	 closedir($handle); 
	 echo "</table>"; 
  }

?> 



