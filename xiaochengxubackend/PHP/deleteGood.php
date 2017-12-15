<?php
	header("content-type:text/html;charset=utf-8");
	$vip=$_GET["vip"];
	$goodsId=$_GET["goodsId"];

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
	$chaxun="select * from shopcart where vipname='".$vip."' and goodsid='".$goodsId."'";
	$chaxunres=mysql_query($chaxun,$lianjieSQL);
	$rows=mysql_num_rows($chaxunres);
	if($rows>=1){
		$delete="delete from shopcart where vipname='".$vip."' and goodsid='".$goodsId."'";
		//执行删除工作
		$res = mysql_query($delete,$lianjieSQL);
		echo $res;
	}else{
		//echo $rows;
		echo "该会员中查不到此商品！";
	}
	//
	
	//关闭数据库
	mysql_close($lianjieSQL);
	//echo $res;//返回插入的结果，1代表成功，0(空)代表失败
?>