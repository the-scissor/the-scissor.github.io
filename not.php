<!DOCTYPE html>
<html>
<head>
	<title>Test your XSS extension here!</title>
</head>
<body>
<?php 
// echo htmlspecialchars($_GET['getp']);
// echo htmlspecialchars($_POST['postp']);
	if($_GET['getp'] || $_POST['postp']) {
		$val = $_GET['getp'].$_POST['postp'];

		// echo htmlspecialchars($val)."<br>";

		if(preg_match("/<\s*script((\s?>)|(\s[^>]*>))/mi", $val)) {
			echo "<h2> Oops! It seems your extension didn't work! Try again :) </h2>";
			echo "<i> You shouldn't be seeing this page.. ;) </i>";
		
			// echo "</body></html>";
			// die();
		} else {
			echo "<h3>Input seems to be clean from XSS whole script injection! Try an input with &lt;script&gt;..</h3>";
		}
	echo "<br><br> <i>Debug Info :</i>";
	if($_GET['getp'])	echo "<br><b>Get Parameter:</b><pre>".htmlspecialchars($_GET['getp'])."</pre>";
	if($_POST['postp'])   echo "<br><b>Post Parameter:</b><pre>".htmlspecialchars($_POST['postp'])."</pre>";

	} else {
		echo "<h3>Inputs were empty!</h3>";
	}
	
 ?>

</body>
</html>
