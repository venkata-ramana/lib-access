<?php
/*
session_start();
$batch=$_SESSION['batch'];
$company=$_SESSION['company'];
$branch=$_SESSION['branch'];
$selection_type=$_SESSION['selection_type'];


if($batch=='all' && $company=='all' && $branch=='all' && $selection_type=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails";

else if($company=='all' && $branch=='all' && $selection_type=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch'";

else if($batch=='all' && $branch=='all' && $selection_type=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where company='$company'";

else if($batch=='all' && $company=='all' && $selection_type=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where branch='$branch'";

else if($batch=='all' && $company=='all' && $branch=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where selection_type='$selection_type'";

else if($branch=='all' && $selection_type=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch' and company='$company'";

else if($company=='all' && $selection_type=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch' and branch='$branch'";

else if($company=='all' && $branch=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch' and selection_type='$selection_type'";



else if($batch=='all' && $selection_type=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where company='$company' and branch='$branch'";

else if($batch=='all' && $company=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where branch='$branch' and selection_type='$selection_type'";

else if($batch=='all' && $branch=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where company='$company' and selection_type='$selection_type'";





else if($batch=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where company='$company' and branch='$branch' and selection_type='$selection_type'";

else if($company=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch' and branch='$branch' and selection_type='$selection_type'";

else if($branch=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch' and company='$company' and selection_type='$selection_type'";

else if($selection_type=='all')
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch' and branch='$branch' and company='$company'";


else
$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch'and company='$company' and branch='$branch' and selection_type='$selection_type'";


//$result="select roll_no,batch,branch,name,salary,company,selection_type from placementdetails where batch='$batch'and company='$company' and branch='$branch' and selection_type='$selection_type'";
$con = mysql_connect('localhost','aditya','aditya!212');
mysql_select_db('aditya',$con);
 */
$dept=urldecode($_GET['query']);
$result="SELECT * FROM logged_details ld, login_details od WHERE ld.mem_id=od.mem_id and od.mem_department='$dept'";
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
