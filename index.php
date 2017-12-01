<html>
<head>
<link type="text/css" rel="stylesheet" href="main.css">
<?php include 'mainproc.php';?>

<title>
		IR System!
</title>
</head>
<body>
<div id="wrapper">
hub:
<div id="hub"><?php echo $hellyeah ; ?></div> <br><br>
auth:
<div id="auth"><?php echo $hellyeah1 ; ?></div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">



<button type="submit" name="submit" >Sort!</button>

<button name="generate">Generate</button>  <br> <br>


</form>



</div>



</body>
</html>
