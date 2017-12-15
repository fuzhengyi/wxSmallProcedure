<?php
	
	//处理跨域  
    header('Access-Control-Allow-Origin:*'); //*号表示所有域名都可以访问  
    header('Access-Control-Allow-Method:POST,GET'); 
	
	header("content-type:text/html;charset=utf-8");
	$vipname=$_GET["vipName"];
	$goodsId=$_GET["id"];
	$goodscount=$_GET["count"];

	//echo $vip.",".$goodsId.",".$goodscount
	//建立连接
	$lianjieSQL=mysql_connect("localhost","root","123456");
	//检测连接是否成功
	if(!$lianjieSQL){
		die("连接不上：".mysql_error());
	}
	//选择需要连接的库
	mysql_select_db("fenqile",$lianjieSQL);
	//如果数据库中该会员已经存在此商品，则增加加入的数量，没有此商品的话，增加此商品
	$update="update shopcart set count=".$goodscount." where vipname='".$vipname."' and goodsid='".$goodsId."'";
	$res=mysql_query($update,$lianjieSQL);
	//关闭数据库
	mysql_close($lianjieSQL);
	echo $res;//返回插入的结果，1代表成功，0(空)代表失败
?>