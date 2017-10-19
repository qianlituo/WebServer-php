﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IROZA</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="scripts/function.js"></script>
</head>
<body>
<div id="header" class="wrap">
    <div id="logo"><img width="100%" height="100%" src="images/logo.png" /></div>
    <div class="help">
        <a href="shopping.html" id="shoppingBag" class="shopping">Shopping Cart</a>
        
        <?php
	   	  	session_start();
	   	  	if(is_null($_SESSION["user_name"])){
   	  	?>
		   	  <a href="login.html">LogIn</a>
             <a href="register.html">Register</a>
	 	<?php
	 	  	}else{
 	  	?>
	   	  		<a href="">welcome,<?php session_start();echo $_SESSION["user_name"];?></a>
   	  	<?php
   	  		}
   	  	?>
        
        <a class="button" id="logout" href="javascript:void(0);">LogOut</a>
        <a href="guestbook.html">Message</a>
        <a href="manage/index.html">Management</a>
    </div>
    <div class="navbar">
        <ul class="clearfix">
            <li class="current"><a href="#">HOME</a></li>
            <li><a href="#">CATEGORY</a></li>
            <li><a href="#">BRAND</a></li>
            <li><a href="#">WOMEN</a></li>
            <li><a href="#">MEN</a></li>
        </ul>
    </div>
</div>
<div id="childNav">
	<div class="wrap">
		<ul class="clearfix">
            <li class="first"><a href="#">SPECIAL</a></li>
            <li><a href="#">MAGAZINE</a></li>
            <li><a href="#">SNAP</a></li>
            <li><a href="#">SHOP</a></li>
            <li><a href="#">HELP</a></li>
		</ul>
	</div>
</div>
<div id="position" class="wrap">
    Now Position：<a href="index.html">IROZA</a> &gt; Shopping Cart 
</div>
<div class="wrap">
	<div id="shopping">
		<form action="address.html">
			<table>
				<tr>
					<th>name</th>
					<th>price</th>
					<th>num</th>
					<th>operation</th>
				</tr>
				<tr id="product_id_0">
					<td class="thumb"><img src="images/product/0.jpg" /><a href="product-view.html">商品001</a></td>
					<td class="price" id="price_id_0">
						<span>￥99.00</span>
						<input type="hidden" value="99" />
					</td>
					<td class="number">
                        <span name="del">-</span>
                        <input id="number_id_0" type="text" name="number" value="1" />
                        <span name="add">+</span>
					</td>
					<td class="delete"><a href="javascript:void(0)">delete</a></td>
				</tr>
                <tr id="product_id_1">
                    <td class="thumb"><img src="images/product/0.jpg" /><a href="product-view.html">商品002</a></td>
                    <td class="price" id="price_id_1">
                        <span>￥99.00</span>
                        <input type="hidden" value="99" />
                    </td>
                    <td class="number">
                        <span name="del">-</span>
                        <input id="number_id_1" type="text" name="number" value="1" />
                        <span name="add">+</span>
                    </td>
                    <td class="delete"><a href="javascript:void(0)">delete</a></td>
                </tr>
			</table>
            <div class="total"><span id="total">Total：￥0</span></div>
			<div class="button"><input type="submit" value="" /></div>
		</form>
	</div>
	<script type="text/javascript">
		//document.write("Cookie中记录的购物车商品ID："+ getCookie("product") + "，可以在动态页面中进行读取");
	</script>
</div>
<div id="footer">
    Copyright &copy; 2017 筑波大学　Team HTTP All Rights Reserved. 
</div>
</body>
</html>
