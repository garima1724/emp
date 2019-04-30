<?php
//this function is basically being used to optimize the code in other files(the two lines written below need not to be written again and just just call this funtion like in register.php on line no 79)
//remove code from line no 72 till 79 in register.php and the same code elsewhere.
//one more line needs to be changed.In register.php change line no 3 by 4.
include_once './connect.php';
function check_email($data)
{
	global $link;//since link is a global var it is necessary to write this otherwise it'll give an error.
	$d= mysqli_query($link,"SELECT email FROM tbl_user WHERE email = '$data'");//here instead of email we can also write * but because we are only checking for email here therefore using email will be a more effecient way because * will fetch the whole data from the database while we only want email. 
	$check_email= mysqli_num_rows($d);
	if($check_email == TRUE )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function getdata($d)
{
	global $link;
	$data  = mysqli_query($link,"SELECT * FROM tbl_user WHERE email= '$d'");
	$row = mysqli_fetch_assoc($data);//fetches all the data in the form of an array
	return $row;
	//now using this function we can check for password(as in case of change pwd where we have to input email first and then change the pwd)and other things as well.
}

//$email='a@gmail.com';
//$r=getdata($email);
//print_r(getdata($email));
//echo $r['email'];

?>