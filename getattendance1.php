
<?php
	if(isset($_POST["btnsubmit"]))
	{
		$con=mysqli_connect("localhost","root","","gestion_etudiant");
		
		$date = $_POST["cyear"]."-".$_POST["cmonth"]."-".$_POST["cdate"];
               		
		$query = "select *from `etudiant` ";
		$result = mysqli_query($con,$query)or die("select error");
		while($rec = mysqli_fetch_array($result))
		{
			$mno = $rec["cin"];
			if(isset($_POST[$mno]))
			{
				$query1 = "INSERT INTO  `attandance`(`cin` ,  `date` ,  `attendance`) VALUES('$mno','$date','1')";
			}
			else
			{
				$query1 = "INSERT INTO  `attandance`(`cin` ,  `date` ,  `attendance`) VALUES('$mno','$date','0')";
			}
			mysqli_query($con,$query1)or die("ouh 3lia".$mno);
			print "<script>";
			print "alert('Attendance get successfully....');";
			print "self.location='getattendance.php';";
			print "</script>";
		}
		
		
			
		
	}
	else
	{
		header("Location:index.php");
	}
?>
