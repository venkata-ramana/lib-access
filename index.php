<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="normalize.css">
<script>
function key(){
var a=document.lib.id.value;
if(a.length>=10){return true;}
else
return false;
}
</script>
</head>
<body>
<div class="header"><h1>Aditya Library Login - Access</h1></div>
<div class="body">
<div class="left-frame">
<form method="POST" name="lib" onSubmit="return key()">
<input type="text" name="id" class="text_id" placeholder="Please Scan ID Card" autofocus>
</form>

<?php
if(isset($_POST['id']))
{	
$id=$_POST['id'];
$con=mysql_connect("localhost","root","");
mysql_select_db("library",$con) OR die("hello");
$query="SELECT * FROM `login_details` WHERE `mem_id` LIKE '$id%'";
$re=mysql_query($query,$con);
echo "<table  class=top-tab align=center>";
while($data=mysql_fetch_array($re))
{
echo "
<tr><td class=left>ID :</td><td>$data[0]</td></tr>
<tr><td class=left>Name :</td><td>$data[1]</td></tr>
<tr><td class=left>Group :</td><td>$data[2]</td></tr>
<tr><td class=left>Address :</td><td>$data[3]</td></tr>
<tr><td class=left>Designation :</td><td>$data[5]</td></tr>
<tr><td class=left>Department :</td><td>$data[6]</td></tr>";
}
//<tr><td class=left>Phone :</td><td>$data[4]</td></tr>
$date=date('Y-m-d');
$time=date('h:i:s');
$timestamp=$date." ".$time;
$date=date('Y-m-d');
$time=date('h:i:s');
$timestamp=$date." ".$time;
$query="SELECT * FROM `logged_details` WHERE `mem_id` LIKE '$id%' order by id DESC limit 1";
$re=mysql_query($query,$con);
$query="INSERT into `logged_details`(`mem_id`,`login_time`) VALUES ('$id','$timestamp')";
$status="Welcome! You are successfully logged In.";
while($rows=mysql_fetch_row($re))
{
if($rows[3]=='0000-00-00 00:00:00')
{
$status="Successfully Logged Out. Have a good day!";
$query="UPDATE `logged_details` SET `logout_time`='$timestamp' WHERE  `mem_id` LIKE '$id%' and `logout_time`='0000-00-00 00:00:00'";
}
}

if(mysql_query($query,$con))
echo "<tr><th colspan=2 class='success'>$status</th></tr>";
echo "</table>";
echo "<div class=login_header>Last Login Details</div>";
echo "<table align='center' class=bottom-tab>";
echo "<tr><th class='last_login'>Login Time</th><th class='last_login'>Logout Time</th></tr>";
$query="SELECT * FROM `logged_details` WHERE `mem_id` LIKE '$id%' order by id DESC limit 5";
$re=mysql_query($query,$con);
$arr=array();
while($rows=mysql_fetch_array($re))
{
if($rows[3]=='0000-00-00 00:00:00')
echo "<tr><th class='login_details'>$rows[2](".get_date($rows[2]).")</th><th class='login_details'>-----</th></tr>";
else
echo "<tr><th class='login_details'>$rows[2](".get_date($rows[2]).")</th><th class='login_details'>$rows[3](".get_date($rows[3]).")</th></tr>";
$arr=$rows;
}
if(empty($arr))
echo "<tr><th>no data available</th></tr>";
echo "</table>";
}

?>

<?php
function get_date($date)
{
//$date="2015-03-15 03:10:01";
$time = strtotime($date);
    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'min',
        1 => 'sec',
        -1 => 'now'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        if($unit==-1)
        return $text;
        else
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'\'s ago':' ago');
	//return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'\'s ago':' ago');
	   
}

}
?>
</div>
<div class="left-frame">
<div class="total_count">No Of People Logged Today</div>
<?php include"count.php" ?>

</div>
</div>
<div class="footer"><center><a href="reports.php">Designed, Developed & Dribbled by</br><div> N.Venkata Ramana </br>2012-2016 (CSE)</div><div> K.Vamsi</br>2013-2017 (CSE)</div></a></center></div>
</body>
</html>
