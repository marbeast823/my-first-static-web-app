<?PHP

session_start();
session_destroy();

?>
<head>
<script type="text/javascript">
<!--
function delayer(){
    top.location = "index.php"
}
//-->
</script>
</head>
<body onLoad="setTimeout('delayer()', 0)">
</script>
</head>