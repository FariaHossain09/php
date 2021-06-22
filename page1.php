<!DOCTYPE html>
<html>
<head>
<title>page1</title>
</head>
<body>


<?php
$number = $_POST['number'];

$value = $number;



$arr1[] = array("value" => $number);
$result = write(json_encode($arr1) . "\n");

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
}



function write($content) {
$fileName = "data.txt";
$resource = fopen($fileName, "a");
$fw = fwrite($resource, $content);
fclose($resource);
return $fw;
}
?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <fieldset>
    
    <label for="page1">Page 1 [Home]</label>
    <br><br>
    <label for="csite">Conversion Site</label>
    <br><br>
    <label>1.</label>
    <a href='page1.php '>Home </a>
    <label>2.</label>
    <a href='page2.php'>Conversion Rate </a>
    <label>3.</label>
    <a href='page3.php'>History </a>
    <br><br>

    <label for="conveter">Conveter:</label>
     <br>
        <select name="conveter" id="conveter">
        <option value="select">Select</option>
        <option value="1">Centimeter</option>
        <option value="2">Meter</option>
        <option value="3">Feet</option>
        <option value="4">Kilometer</option>
        <option value="5">Inch</option>
    </select>
    <br><br>
    <label for="value">Value:</label>
    <input type="text" id="value" name="value" value="value*1000">
    <br><br>
    <label for="result">Result:</label>
    <input type="text" id="result" name="result">
    </fieldset>
    <br><br>
    <button type="submit">Submit</button>
       
    </form>
    <br>


<?php
$readData = read();
$arr1 = explode("\n", $readData);



echo "<ol>";
for($i = 0; $i < count($arr1) - 1; $i++) {
$decode = json_decode($arr1[$i]);
echo "<li>" . $decode->value . " </li>";
}
echo "</ol>";



function read() {
$fileName = "data.txt";
$fileSize = filesize($fileName);
$fr = "";
if($fileSize > 0) {
$resource = fopen($fileName, "r");
$fr = fread($resource, $fileSize);
fclose($resource);
return $fr;
}
}
?>

</body>
</html>