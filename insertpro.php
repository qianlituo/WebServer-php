<?php
    require 'mysqlconnect.php';

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }else{ 
        	$pname=$_POST['pname'];
			$price=$_POST['price'];
			$purl=$_POST['purl'];
			if($pname==""||$price=="")//Not empty
                {
                  echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."Please fill in the completed！"."\"".")".";"."</script>";
                  echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."iroza1/register.html"."\""."</script>";    
                  exit;
                }
         
			$sql="insert into products(p_name,price,p_url) values('$pname',$price,'$purl')";
		
		$res=mysqli_query($db,$sql);
		if($res==true){
			echo "<<script type='text/javascript'>alert('success');window.location.href='index.php';</script>>";
		}else{
			echo "<script type='text/javascript'>alert('failed');</script>".$sql;
		}
		
	}
    mysqli_close($db);
?>