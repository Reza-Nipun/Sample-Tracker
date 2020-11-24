<?php
//reads the name of the file the user submitted for uploading
$image=$_FILES['attachment']['name'];
//if it is not empty

if ($image) 
{
//get the original name of the file from the clients machine
$filename = stripslashes($_FILES['attachment']['name']);
//get the extension of the file in a lower case format
$extension = getExtension($filename);
$extension = strtolower($extension);

//if it is not a known extension, we will suppose it is an error and will not upload the file, otherwize we will do more tests
//if ($extension == '')
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "pdf") && ($extension != "doc") && ($extension != "docx") && ($extension != "png") && ($extension != "gif") && ($extension != "xls") && ($extension != "xlsx")) 
{
//print error message
echo '<h1 align="center" style="color:#F00">Cannot Upload File. Unknown extension!!!</h1>';
$errors=1;
}
else
{
//get the size of the image in bytes
//$_FILES['image']['tmp_name'] is the temporary filename of the file in which the uploaded file was stored on the server
$size=filesize($_FILES['attachment']['tmp_name']);
//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{
echo '<h1>You have exceeded the size limit!</h1>';
$errors=1;
}
//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)
$newname="dpd_images/".$image_name;
//we verify if the image has been uploaded, and print error instead
$copied = copy($_FILES['attachment']['tmp_name'], $newname);
/*if (!$copied) 
{
echo '<h1>Copy unsuccessfull!</h1>';
$errors=1;
}*/

}}

?>