<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }else{ 
        	$userna=$_POST['userId'];
			$userpw=$_POST['Password'];
			$mail=$_POST['email'];
			$sex=$_POST['sex'];
			if($userna==""||$userpw=="")//Not empty
                {
                  echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."Please fill in the completed！"."\"".")".";"."</script>";
                  echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."iroza1/register.html"."\""."</script>";    
                  exit;
                }

			
			$sql="insert into user_register(user_name,user_password,user_mail,user_sex) values('$userna','$userpw','$mail','$sex')";
		
		    $res=mysqli_query($db,$sql);
		if($res==true){
			echo "<<script type='text/javascript'>alert('success');window.location.href='showuer.php';</script>>";
		}else{
			echo "<script type='text/javascript'>alert('failed');</script>".$sql;
		}
		
	}
    mysqli_close($db);
?>

