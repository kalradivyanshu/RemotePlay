<?php
// Where the file is going to be placed 
$target_path = "uploads/";
$file=basename( $_FILES['file1']['name']);
//echo $file;
$ext = end((explode(".", $file)));
$namerand = md5(time()*rand(10,10000));
$file_type = strtolower($ext);
$imageFileType = $file_type;
$nameoffile  = $namerand.".".$file_type;
$target_path = $target_path.$namerand.".".$file_type;
if(move_uploaded_file($_FILES['file1']['tmp_name'], $target_path)) {
    echo "<span id='playit'><button onclick=\"playit('".$nameoffile."');\">Play</button></span>";
} else{
    echo "There was an error uploading the file, please try again!";
}
?>