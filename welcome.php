<html>
<body>

<h1 align="center">Welcome <?php 
session_start();
echo $_SESSION["user_name"]; ?>.<br />
</h1>

<script type="text/javascript">
		setTimeout("location.href='iroza1/index.php'", 2000);
</script>

</body>
</html>

