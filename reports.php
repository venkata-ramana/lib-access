<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="normalize.css">
<link rel="stylesheet" href="style.css">
<script>
function validate()
{
var a=document.valid.from.value;
var b=document.valid.to.value;
if(a==b){
alert("Please choose different dates!")
return false;
}
else
return true;
}
</script>
</head>
<body>
<div class="header"><h1>Aditya Library Login - Access</h1></div>
<div class="body">
<center><h2>Reports</h2></center>
</br>
<table align="center" > 
<form method="POST" onSubmit="return validate()" name="valid">
<tr><th>Select From Date:</th><td><input type="date" name="from" class="text_id" id="from"></td></tr>
<tr><th>Select To Date:</th><td><input type="date" name="to" class="text_id" id="to"></td></tr>
<tr><th></th><td><input type="submit" name="date_download" class='btn' value="Download"></th></tr></form>
<tr><td>&nbsp;</td></tr>
<tr><th></th><th>(or)</th></tr><tr><td>&nbsp;</td></tr>

<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("library",$con) OR die("sorry");
$query="SELECT distinct(mem_department) FROM logged_details ld, login_details od WHERE ld.mem_id=od.mem_id";
$re=mysql_query($query,$con);
echo "<tr><th>Select Department:</th>";
echo "<form method='POST'>";
echo "<td><select name='department'>";
while($data=mysql_fetch_array($re))
{
echo "	<option>$data[0]</option>";
}
echo "</select></td><tr><th></th><td><input type='submit' class='btn' name='dept_download' value='Download'></th></tr></form></table>";

?>
<?php
if(isset($_POST['date_download']))
{
	$from=$_POST['from'];
	$to=$_POST['to'];
header("location:date_download.php?from=$from&to=$to");
}
?>
<?php
if(isset($_POST['dept_download']))
{
$dept=$_POST['department'];
$dept=urlencode($dept);
header("location:dept_download.php?query=$dept");
}
?>
</div> 	
<div class="footer"><center><a href="index.php">Designed, Developed & Dribbled by</br><div> N.Venkata Ramana </br>2012-2016 (CSE)</div><div> K.Vamsi</br>2013-2017 (CSE)</div></a></center></div>
	 
</body>
</html>
