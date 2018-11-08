<?php
include('session.php');
	if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}
?>
<?php include 'file/header.php';?>
<?php include("file/deshdb.php");?>

<style type="text/css">
.cen {
text-align:center;
}

.tc {
border:solid 1px #336699;
padding:0px;
background:white;
width:30%;
float:left;
margin-left:20px;
border-top-right-radius:20px;
border-top-left-radius:20px;
border-radius:20px;
}
.tp {
	height:60px;
	background:maroon;
	font-size:35px;
	color:white;
	font-family:monospace;
	padding:5px;
	border-top-right-radius:20px;
	border-top-left-radius:20px;
}
.tp1 {
	height:100px;
	padding:25px;
	font-size:30px;
	font-family:fantasy;
}
.ac {
	width:94%;
}

</style>

<div class="container" >


<div class="cen" >

<div class="row" >
	<a href="account.php" ><div class="tc ac" ><p class="tp" > <b><i> ACCOUNT</i></b></p><p class="tp1" ></p></div></a>
</div>

 <br>
 <div class="row" >
 <div class="tc" ><p class="tp" > <b> TOTAL_PRODUCT </b></p><p class="tp1" ><?php echo $product; ; ?></p></div>
 <div class="tc" ><p class="tp" ><b>TOTAL_CATAGORY </b></p><p class="tp1" ><?php echo $catagory; ?></p></div>
 <div class="tc" ><p class="tp" ><b>TOTAL BRAND</b></p><p class="tp1" ><?php echo $brand; ?></p></div>
 </div>
 
 <br>
 
 <div class="row" >
 <div class="tc" ><p class="tp" ><b>Sale</b></p><p class="tp1" ><?php echo $totalsale; ?></p></div>
 <div class="tc" ><p class="tp" ><b>CASH</b></p><p class="tp1" ><?php echo $totalpay; ?></p></div>
 <div class="tc" ><p class="tp" > <b> TOTAL CADIT </b></p><p class="tp1" ><?php echo $totaldue; ; ?></p></div>
 </div>
 
 <br>
 <div class="row" >
 <div class="tc" ><p class="tp" > <b>Full Pay </b></p><p class="tp1" ><?php echo $Full_pament; ; ?></p></div>
 <div class="tc" ><p class="tp" ><b>Somthing Pay</b></p><p class="tp1" ><?php echo $Somthing_pament; ?></p></div>
 <div class="tc" ><p class="tp" ><b>No Pay</b></p><p class="tp1" ><?php echo $No_pament; ?></p></div>
 </div>
 
 <br>
 
 <div class="row" >
 <div class="tc" ><p class="tp" > <b>Account Pay </b></p><p class="tp1" ><?php echo $account; ; ?></p></div>
 <div class="tc" ><p class="tp" ><b>Cash Pay</b></p><p class="tp1" ><?php echo $Cash; ?></p></div>
 <div class="tc" ><p class="tp" ><b>CUSTOMER_BALANCE</b></p><p class="tp1" ><?php echo $totalbalance; ?></p></div>
 </div>
 </div>
 
 
 

</div>