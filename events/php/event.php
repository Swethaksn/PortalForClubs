
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	extract($_POST);
    $bool = true;

	$servername = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "portal";
$link = mysqli_connect($servername, $username1, $password1, $dbname);
// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
$a="SELECT event_name from create_event WHERE event_name='$plan'";
$result=mysqli_query($link,$a);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if(mysqli_num_rows($result)==1)
{
	
$bool=false;
	echo "Redirecting... Please wait..";
echo "<script>setTimeout(\"location.href = '../html/event.html';\",500);</script>";
print '<script>alert("Event already created!! ");</script>';

}

	if($bool==true) // checks if bool is true
	{
		$sql="INSERT INTO create_event (date,time,end_time,event_name,place,more_info,invite) VALUES ('$date','$time','$end_time','$plan','$where','$detail','$invite')"; //Inserts the value to table registration
echo "<script>setTimeout(\"location.href = '../html/event.html';\",500);</script>";
print '<script>alert("Successfully Registered! ");</script>';
	if (mysqli_query($link, $sql) ) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
	}

}
?>