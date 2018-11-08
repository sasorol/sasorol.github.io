<?php include("file/header.php");?>
<?php 
 include('connection.php');
 error_reporting(0);
 ?>
<script language="javascript"> 
      		function DoCheckLength(aTextBox) { 
      		if (aTextBox.maxLength - aTextBox.value.length==0) { 
      		document.theForm.submit();     	 
      } } 
   	</script>
<div class="customer_search_bar" >               
	  <form class="form-horizontal style-form" NAME="theForm" action="" method="get" >                
    	<?php
			if(isset($_GET['item_barcode'])){ 
			$item_barcode = ($_GET['item_barcode']); } ?>
			<input class="form-control" type="number" autofocus maxlength="6" onkeyup="return(DoCheckLength(this));" ID="firstTextBox" name="item_barcode" placeholder="Scan your item">     
		</form>
		<?php
			if(empty($item_barcode)) {} 
			else {                
				$sql=mysql_query(' select * from member where barcode_id = '.$item_barcode.' order by member_id  DESC limit 1')or die(mysql_error());
			while($result=mysql_fetch_array($sql)){
				$barcode_id = ''.$result['barcode_id'].''; 
				$member_id = ''.$result['member_id'].''; 
				$member_name = ''.$result['member_name'].''; 
				$father = ''.$result['father'].''; 
				$mother = ''.$result['mother'].''; 
				$fname = ''.$result['fname'].'';
				$gender = ''.$result['gender'].'';
				$phone = ''.$result['phone'].''; 	
				$email = ''.$result['email'].'';
				$bdate = ''.$result['bdate'].'';
				$account = ''.$result['account'].'';
				$gandtotal = ''.$result['gandtotal'].'';
				$due = ''.$result['due'].'';
				$pay = ''.$result['pay'].'';
				
				$house = ''.$result['house_id'].'';
				$home = ''.$result['home_id'].'';
				$village = ''.$result['villa_id'].'';
				$union = ''.$result['villa1_id'].'';
				$thana = ''.$result['test_id'].'';
				$jela = ''.$result['city_id'].'';
				$bivag = ''.$result['state_id'].'';
				$country = ''.$result['country_id'].'';
			}} ?>                                         
			                                          				
			                                          				
		                                          	
</div>
<style type="text/css">
.customer_search_bar {
		width:90%;
		margin:auto;
		margin-top:-20px;

}
.customer_info {
	width:90%;
	margin:auto;
	background:white;
	padding:20px;
	
}
.pic_div {
width:50%;
margin:auto;
text-align:center;
}
.pic {
	height:200px;
	width:200px;
}
.cen {
text-align:center;
}
.table {
background:white;
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
margin-left:21px;
}

</style>
 
 
 
 
 <div class="customer_info">                  
 <ul class="nav nav-tabs">  
 <li class="active"><a data-toggle="tab" href="#products">Balance Info</a></li>    
 <li><a data-toggle="tab" href="#test">Order Info</a></li>
  <li><a data-toggle="tab" href="#cart">Parsonal Info</a></li>
 </ul>  
 <div class="tab-content">  
 <div id="products" class="tab-pane fade in active">  
 <br>
 <div class="cen" >
 <div class="row" >
 <div class="ac tc" ><p class="tp" > <b>Account</b></p><p class="tp1" ><?php echo $account; ?></p></div>
 </div>
 <br>
 <div class="row" >
 <div class="tc" ><p class="tp" > <b> Total</b></p><p class="tp1" ><?php echo $gandtotal; ?></p></div>
 <div class="tc" ><p class="tp" ><b>Pay</b></p><p class="tp1" ><?php echo $pay; ?></p></div>
 <div class="tc" ><p class="tp" ><b>Due</b></p><p class="tp1" ><?php echo $due; ?></p></div>
 </div>
 </div>
 
 
 
 
 
 
 </div>  
 <div id="cart" class="tab-pane fade">  
 <div class="table-responsive" id="order_table">  <br>
 	<div class="pic_div" ><img src="image/image.png" class="pic"  ></div>
 	<div class="address_info" >
 	<div class="col-sm-12 cen" >
 	<table class="table table-striped table-bordered">
 	<tr>
 	<td width="1%" > সট নাম</td>
 	<td width="1%" ><?php echo ''.$member_name.'' ?></td>
 	<td width="1%">বাবার নাম</td>
 	<td width="1%"><?php echo ''.$father.'' ?></td>
 	</tr>
 	<tr>
 	<td>নাম</td>
 	<td><?php echo ''.$fname.'' ?></td>
 	<td>মায়ের নাম</td>	
 	<td><?php echo $mother; ?></td>
 	</tr>
 	<tr>
 	<td>লিংগ</td>
 	<td><?php echo $gender; ?></td>
 	<td>জন্মতারিখ</td>	
 	<td><?php echo $bdate; ?></td>
 	</tr>
 	<tr>
 	<td> মোবাইল নম্বার</td>
 	<td><?php echo $phone; ?></td>
 	
 	
 	<td>ইমেল ঠিকানা</td>
 	<td><?php echo $email; ?></td>
 	</tr>
 	</table>
 	</div>
 	<div class="col-sm-12" ><?php echo $house; ?><?php echo $home; ?><?php echo $village; ?><?php echo $union; ?><?php echo $thana; ?> <?php echo $jela; ?><?php echo $bivag; ?><?php echo $country; ?></div>
 	<br><br><br><br><br><br><br><br><br>
 	</div>
 
 </div>  
 </div> 
 <div id="test" class="tab-pane fade"> 
 <br>
 <table id="employee_data" class="table table-striped table-bordered">  
 <thead>  
 <tr>  
 <td class="th" >#</td>  
 <td class="th">Memo</td>
 <td class="th">date</td>
 <td class="th">gandtotal</td>
 <td class="th">pay</td>
 <td class="th">due</td>
 <td class="th">Mothot</td>
 <td class="th">Action</td>
 </tr>  
 </thead>
 <?php
 
 $i=1;
 $sumon = $member_id ;
 if(empty($sumon)) {} 
 else {
 $sql=mysql_query(' select * from tbl_order where member_id = '.$sumon.' order by order_id DESC')or die(mysql_error());
 while($row=mysql_fetch_array($sql)){
 
 echo '  
 <tr>  
 
 <td>'.$i.'</td>  
 <td>'.$row["order_id"].'</td> 
 <td>'.$row["creation_date"].'</td>
 <td>'.$row["gandtotal"].'</td>
 <td>'.$row["pay"].'</td>
 <td>'.$row["due"].'</td>
 <td>'.$row["pament_mathot"].'</td>
 <td>Action</td>
 
 
 
 </tr>  
 ';  
 $i++;
 
 
 
 
 }}	?>
 </table>
 
 
 
 </div>
 </div>  
 </div>
 </div>  
 </div>  
 

<style type="text/css">
.order_info {
	width:90%;
	background:white;
	margin:auto;
	margin-top:-30px;
}
</style>
