<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Duke bërë porosinë</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <?php include_once('links.php'); ?>
</head>

<body>
<?php
//including the database connection file
include_once("checkSession.php");

if(isset($_POST['porosit'])) {	
	$emri = mysqli_real_escape_string($con,$_POST['emri']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$prodID = mysqli_real_escape_string($con,$_POST['prodID']);
	$sasia = mysqli_real_escape_string($con,$_POST['sasia']);
	$total = mysqli_real_escape_string($con,$_POST['total']);
    $tel = mysqli_real_escape_string($con,$_POST['tel']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $adress = mysqli_real_escape_string($con,$_POST['adress']);
    $zipCode = mysqli_real_escape_string($con,$_POST['zipCode']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
	
	// checking empty fields
	if(empty($Emri) || empty($Data) || empty($Tel) || empty($Cmimi)) {
				
		if(empty($Emri)) {
			echo "<font color='red'>Emri është e zbraset.</font><br/>";
		}
		
		if(empty($Data)) {
			echo "<font color='red'>Data është e zbraset.</font><br/>";
		}
		
		if(empty($Tel)) {
			echo "<font color='red'>Numri i telefonit është e zbraset.</font><br/>";
		}
		if(empty($Cmimi)) {
			echo "<font color='red'>Çmimi është e zbraset.</font><br/>";
		}
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	INSERT INTO umpgjk_rezervimet(emriMbiemri,nrTel,ID_arma,data_rez,Cmimi)VALUES('$Emri','$Tel','$ID_arma','$Data','$Cmimi')
			
		$result = mysqli_query($conn, "CALL shtoRez('$Emri','$Tel','$ID_arma','$Data','$Cmimi')");
		
		//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'rezervimet.php';
         });
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		 
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View Result</a>";
	}
}
?>

</body>
</html>