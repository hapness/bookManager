<?php
include_once("conn/conn.php");
// 根据id查询姓名
function funame($id,$conn){
	$sql = "select username from user where id = '$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	return $row[0];
}
// 根据id查询书名
function fbname($id,$conn){
	$sql = "select book_name from book where id = '$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	return $row[0];
}
// 根据类型id查询图书类型
function ftname($id,$conn){
	$sql = "select type_name from book_type where id = '$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	return $row[0];
}

// 根据书名和作者名查询书籍id
function fbookid($bname,$author,$conn){
	$sql = "select id from book where book_name = '$bname' and author = '$author'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	if(!empty($row[0])){
		return $row[0];
	}else{
		return 0;
	}
	
}