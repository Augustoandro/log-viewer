<?php
session_start();
if(isset($_SESSION['message'])){
    $myemail = $_SESSION['message'];
    echo "Welcome, ".$myemail.'<br>';
}
else{
    header("location: ./index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Read File</title>
</head>
<body>
<?php
$filerec = $_POST['filetxt'];
$filestr = strval($filerec);
echo '<br>'.substr($filestr,21,35).':';
$output = file($filerec);
foreach ($output as $i){
    echo '<br>'.$i;
}
?>
</body>
</html>
