<?php

$from=$_GET['from'];
$to=$_GET['to'];
$result="SELECT * FROM logged_details ld, login_details od WHERE ld.mem_id=od.mem_id and ld.login_time BETWEEN '$from' and '$to'";
$header = '';
$data ='';

mysql_connect("localhost","root","");
mysql_select_db("library") OR die("sorry");
$export = mysql_query ($result ) or die ( "Sql error : " . mysql_error( ) );
 
$fields = mysql_num_fields ( $export );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}
 
while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );
 
if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}
$name=date('d-m-y').'-list.xls';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$name");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";


?>
