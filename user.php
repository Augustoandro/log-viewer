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
    <title>Dashboard</title>
</head>
<body>
<?php
function printfiles($file1) {
    $scan = scandir($file1);
    foreach ($scan as $file2) {
        if ($file2 != '.' && $file2 != '..') {
            #echo '<br>' . $file2;
            if (is_dir($file2) == 0) {
                $dir2 = $file1 . '/' . $file2;
                $file1s = strval($file1);
                if (str_contains($dir2, '.txt')){
                    echo '<br>'.substr($file1s,21,35).':';
                    echo '<form action="readtxt.php" method="post" target="_blank">';
                    echo '<input type="hidden" name="filetxt" value="'.$dir2.'">';
                    echo '<br>'.$file2.'&nbsp<input type="submit" value="View Content">';
                    echo '</form>';
                }
                printfiles($dir2);
            }
        }
    }
}
$file = '../../../gcp-storage';
printfiles($file);
?>
</body>
</html>