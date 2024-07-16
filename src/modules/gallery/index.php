<?php 

	$handle=opendir('modules/gallery.'); 
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
		$handle=opendir('modules/gallery'); 

		$perRow = 3;

		$numRows = $imgCount/$perRow;

		$imgNum = 0;

		echo "<table width=\"100\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=center>"; 

	 	//Note: readdir returns filenames in the order in which they are 
	 	//    stored by the filesystem. Future enhancement: sort by filename 
	 	//    (sequence they were shot) 
	 	
	 	while (false !== ($file = readdir($handle))) 
	 	{ 
			if ($strSought == substr($file, -3)) 
			{ 
			    $imgNum++;
                            $file2="modules/gallery/$file";

			    $size = GetImageSize($file2);

			    $jpglink = substr($file, 0, 8);

			    echo "
<td><td><br><a href=\"modules/gallery/$file\" target=\"blank_\"><img src=\"modules/gallery/$file\" height=\"110\" width=\"120\" border=\"0\" hspace=\"5\" vspace=\"0\"><div align=\"center\">$file</a></div><td>";						

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
	  
  }

?> 



