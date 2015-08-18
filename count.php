<?php
$a=0;
$b=0;
$c=0;
$d=0;

$con=mysql_connect("localhost","root","");
mysql_select_db("library",$con) OR die("Sorry");
$date=date('Y-m-d');
$query="SELECT count(*) FROM `logged_details` WHERE `login_time` LIKE '$date%'";
$re=mysql_query($query,$con);
while($rows=mysql_fetch_row($re))
{
$count=$rows[0];
}

$cnt=array();
$i=0;
$n=$count;
while($n!=0)
{
$cnt[$i]=$n%10;
$n=$n/10;
$i++;
}
if(isset($cnt[0]))
$a=$cnt[0];
if(isset($cnt[1]))
$b=$cnt[1];
if(isset($cnt[2]))
$c=$cnt[2];
if(isset($cnt[3]))
$d=$cnt[3];
?>

<html>
<head>
<link rel="stylesheet" href="generic.css"> 
<script src="jquery.min.js"></script>
</script>
</head>
<body >
<section class="clock">
<div id="digit-0" class="digit">
    <div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
    </div>
<div id="digit-1" class="digit">
    <div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
    </div>
<div id="digit-2" class="digit">
    <div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
    </div>
<div id="digit-3" class="digit">
    <div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
	<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
    </div>

</section>
<script>
var i=0;
digit0=$('#digit-0');
digit1=$('#digit-1');
digit2=$('#digit-2');
digit3=$('#digit-3');

function renderDigit(container,number)
{
var matrix;
switch(number)
{
case 0:
      matrix = [
        true, true, true, true,
        true, false, false, true,
        true, false, false, true,
        true, false, false, true,
        true, false, false, true,
        true, false, false, true,
        true, true, true, true
      ];
      break;
    case 1:
      matrix = [
        false, false, false, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true
      ];
      break;
    case 2:
      matrix = [
        true, true, true, true,
        false, false, false, true,
        false, false, false, true,
        true, true, true, true,
        true, false, false, false,
        true, false, false, false,
        true, true, true, true
      ];
      break;
    case 3:
      matrix = [
        true, true, true, true,
        false, false, false, true,
        false, false, false, true,
        false, true, true, true,
        false, false, false, true,
        false, false, false, true,
        true, true, true, true
      ];
      break;
    case 4:
      matrix = [
        true, false, false, false,
        true, false, false, true,
        true, false, false, true,
        true, true, true, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true
      ];
      break;
    case 5:
      matrix = [
        true, true, true, true,
        true, false, false, false,
        true, false, false, false,
        true, true, true, true,
        false, false, false, true,
        false, false, false, true,
        true, true, true, true
      ];
      break;
    case 6:
      matrix = [
        true, true, true, true,
        true, false, false, false,
        true, false, false, false,
        true, true, true, true,
        true, false, false, true,
        true, false, false, true,
        true, true, true, true
      ];
      break;
    case 7:
      matrix = [
        true, true, true, true,
        true, false, false, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true
      ];
      break;
    case 8:
      matrix = [
        true, true, true, true,
        true, false, false, true,
        true, false, false, true,
        true, true, true, true,
        true, false, false, true,
        true, false, false, true,
        true, true, true, true
      ];
      break;
    case 9:
      matrix = [
        true, true, true, true,
        true, false, false, true,
        true, false, false, true,
        true, true, true, true,
        false, false, false, true,
        false, false, false, true,
        false, false, false, true
      ];
      break;
	  }
var children = container.children();
  var len = matrix.length;
  for (var i = 0; i < len; i++) {
    children.eq(i).toggleClass('on', matrix[i]);
  }
}


function render() {
a=<?=$a?>;
b=<?=$b?>;
c=<?=$c?>;
d=<?=$d?>;
	
         renderDigit(digit0,d);
	renderDigit(digit1,c);
renderDigit(digit2,b);
renderDigit(digit3,a);
  requestAnimationFrame(render);
}
render();

</script>
</body>
</html>
