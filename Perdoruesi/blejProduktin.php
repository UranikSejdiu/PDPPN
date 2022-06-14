<?php

include_once('checkSession.php');
$_SESSION['location'] = $_SERVER['REQUEST_URI'];

$produktID = $_GET['produktID'];

$sql = "SELECT  produktet.produkti, produktet.imazhi1, produktet.imazhi2, produktet.imazhi3, produktet.imazhi4, produktet.pershkrimi, produktet.qmimi, produktet.stoku, madhesit.madhesia, ngjyrat.ngjyra, produktet.kompaniaID
FROM produktet
LEFT OUTER JOIN madhesit ON produktet.madhesiaID=madhesit.madhesiaID 
LEFT OUTER JOIN ngjyrat ON produktet.ngjyraID=ngjyrat.ngjyraID
WHERE  produktet.produktID=$produktID";

$query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $produkti = $row['produkti'];
    $foto1 = $row['imazhi1'];
    $foto2 = $row['imazhi2'];
    $foto3 = $row['imazhi3'];
    $foto4 = $row['imazhi4'];
    $pershkrimi = $row['pershkrimi'];
    $qmimi = $row['qmimi'];
    $stoku = $row['stoku'];
    $madhesia = $row['madhesia'];
    $ngjyra = $row['ngjyra'];
}

if (isset($_SESSION['email']) || isset($_SESSION['password'])) {?>
    // html form and data go here








<?php } else {
    //other piece of code or different div to load 
}?>
