<!DOCTYPE html>
<html>
   <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PHP CRUD with Bootstrap Modal </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<title>Simple Online Attendance System - Avadh Tutor</title><style type="text/css">


.style1 {
	font-family: "Courier New", Courier, monospace;
	font-size: 60px;
	color: black;
	font-style: italic;
}
.style2 {
	font-size: 24px;
	color: black;
}
.style7 {color: black}

</style>
</head>
<script type="text/javascript">
	function getatt(value)
	{
		if(value == true)
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
		}
		else
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
		}
	}
</script>



<table width="800" border="1" align="center" class="jumbotron"  class="card">
      <tr>
        <td bordercolor="black" bgcolor="#CCCCFF"><h1 align="center"><strong><span class="style1">gestion absence</span></strong></h1></td>
      </tr>
      <tr>
           


      </tr>
      <tr>
        <td>
        <form action="getattendance1.php" method="post" class="container">
        <table width="180px" align="left" style="">
            	<tr>
                	<td> Select date : <br />
                   <?php 
				 		    $dt = getdate();
							$day = $dt["mday"];
							$month = date("m");
							$year = $dt["year"];
							
							echo "<select name='cdate'>";
							for($a=1;$a<=31;$a++)
							{
								if($day == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cmonth'>";
							for($a=1;$a<=12;$a++)
							{
								if($month == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cyear'>";
							for($a=2010;$a<=$year;$a++)
							{
								if($year == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select>";
						?>                    
                    </td>
                </tr>
             </table>	
        
          <table width="400" border="2" align="left" bordercolor="#9966FF" bgcolor="#C7B6B1" style="margin-left:20px;">
            <tr>
              <td colspan="3" bgcolor="#9999CC"><div align="center"><strong><span class="style2">présence</span></strong></div></td>
            </tr>
            <tr bgcolor="white">
              <td width="114"><span class="style7">nom</span></td>
              <td width="152"><span class="style7">présence</span></td>
             
            </tr>
            <?php
            
			$con=mysqli_connect("localhost","root","","gestion_etudiant");			
	

				
				extract($_POST);
				$query = "select *from `etudiant` order by `cin`";
				$s = 0;
				$result = mysqli_query($con,$query)or die("select error");
				while($rec = mysqli_fetch_array($result))
				{
					$s = $s + 1;
					echo ' <tr>
							 
							  <td width="152">'.$rec["nom"].'</td>
							  <td width="110"><input type=checkbox name='.$rec["cin"].' onclick="getatt(this.checked);"/></td>
							</tr>';
				}
			?>			
            <tr>
              <td colspan="3"><div align="center">
                <input type="submit" value="valider" name="btnsubmit"/>
                &nbsp;&nbsp;</div></td>
            </tr>
          </table>
          </form>
         
         	<table width="100px" align="right" style="margin-left:35px">
            	<tr>
                	<td> Total des absents : <input type="text" id="txtAbsent" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
                <tr>
                	<td> total des présents : <input type="text" id="txtPresent" value="0" size="10"  disabled="disabled"/></td>
                </tr>
                <tr>
                	<td> Total des etudiants : <input type="text" id="txtStrength" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
             </table>
         
         </td>
      </tr><br/>
	  <a href="http://localhost/mini-projet-info1/index.html">HOME</a> 
    </table>
	
	
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

</html>
