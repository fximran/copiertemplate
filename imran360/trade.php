<?php
require 'koneksi.php';
if(isset($_GET['trade']))
{
$received=trim($_GET['trade']);
	$order=explode(",",$received);
	$ticket=$order[0];
	$acc=$order[1];
	$otime=$order[2];
	$sym=$order[3];
	$type=$order[4]; 
	$lot=$order[5]; 
	$open=$order[6]; 
	$ask=$order[7];
	$take=$order[8];
	$stop=$order[9];
	$profit=$order[10];
	$comment=$order[11];
	$lastupdate=$order[12];
	$swap=$order[13];
	$com=$order[14];
	$otimeo=date('Y-m-d H:i:s',$otime);
	$lastupdated=date('Y-m-d H:i:s',$lastupdate);
    $timesame=date('Y-m-d H:i:s',strtotime('+2 Hours'));
   $results=mysqli_query($con,"SELECT * FROM trades WHERE account_no='$acc'");
      while($datas=mysqli_fetch_array($results))
			{
               $lp=$datas['last_update'];
               $lastupone=date('Y-m-d H:i:s',strtotime('+2 Secs',strtotime($lp)));

               if($timesame>$lastupone)
               {

                 if(mysqli_query($con,"DELETE FROM trades WHERE account_no='$acc'")){
					}
               }
          }
	if(mysqli_connect_error()){
		echo "Failed Connected";
		echo mysqli_connect_error();
		}
		 else{
    			$result=mysqli_query($con,"SELECT * FROM trades WHERE account_no='$acc' AND ticket='$ticket'");
    			$row=mysqli_fetch_array($result);
    			if($row>0)
    			{
    				if(mysqli_query($con,"DELETE FROM trades WHERE account_no='$acc' AND ticket='$ticket'")){
    				echo 'Old Deleted';
    				} else {
    				echo "Error: " . $sql . "<br>" . mysqli_error($con);
    			    }
    			    if(mysqli_query($con,"INSERT INTO trades (ticket,account_no,open_time,symbol,type,lot,open,running_ask,take,stop,profit,comment,last_update,swap,commission) 
    									VALUES ('$ticket','$acc','$otimeo','$sym','$type','$lot','$open','$ask','$take','$stop','$profit', '$comment',
    										'$lastupdated','$swap','$com')")){
    					echo 'Insert Success';
    					} 
    				}
    			else
    			{
    				 if(mysqli_query($con,"DELETE FROM trades WHERE account_no='$acc' AND ticket='$ticket'")){
    				echo 'Old Deleted';
    				} else {
    				echo "Error: " . $sql . "<br>" . mysqli_error($con);
    			    }
    				 if(mysqli_query($con,"INSERT INTO trades (ticket,account_no,open_time,symbol,type,lot,open,running_ask,take,stop,profit,comment,last_update,swap,commission) 
    									VALUES ('$ticket','$acc','$otimeo','$sym','$type','$lot','$open','$ask','$take','$stop','$profit', '$comment',
    										'$lastupdated','$swap','$com')")){
    					echo 'Insert Success';
    					} 
    				}
	    }

}

	    if(isset($_GET["del"]))
	 {
 	  $received=trim($_GET['del']);

			$order=explode(",",$received);
			$acc=$order[0];
		 if(mysqli_query($con,"DELETE FROM trades WHERE account_no='$acc'")){
		     //Code Here If Have Any
											}
	 }
	mysqli_close($con);
?>