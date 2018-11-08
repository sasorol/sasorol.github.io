<?php  
 //cart.php 
 error_reporting(0);
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "sastore");  
 ?>
 <?php
 include('session.php');
 if(!isset($_SESSION['login_user'])){
 header("location: index.php");
 }
 ?>
 <?php
 /* Database config */
 $host		= 'localhost';
 $db_user		= 'root';
 $db_pass		= '';
 $db_database	= 'sastore'; 
 
 /* End config */
 
 $conn = new PDO('mysql:host='.$host.';dbname='.$db_database, $db_user, $db_pass);
 
 
 ?>
 <?php include("file/header.php");?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
    
      		
      		
      		
    <style type="text/css">
    
    .memo {
    width:50%;
    margin:auto;
    border:solid 1px #a9a9a9;
    }
    .footer {
    text-align:center;
    padding:5px;
    width:100%;
    border-top:dashed 1px #a9a9a9;
    
    }
    .fp1 {
    font-family:monospace;
    font-size:24px;
    background:black;
    color:white;
    width:65%;
    margin:auto;
    border-radius:25px;
    }
    .fp2 {
    font-family:Courier new,monospace;
    font-size:27px;
    }
    .fp3 {
    font-family:fantasy;
    font-size:18px;
    }
    .header {
    width:100%;
    
    }
    .div1 {
    float:left;
    height:70px;
    width:70px;
    background:white;
    margin:7px;
    margin-left:20px;
    }
    .logo {
    height:70px;
    width:70px;
    }
    .div2 {
    float:left;
    width:78%;
    }
    .hp1 {
    margin-top:-8px;
    font-size:55px;
    padding-left:20px;
    font-family:cursive;
    color:black;
    }
    .hp2 {
    margin-top:-28px;
    font-size:25px;
    padding:4px;
    padding-left:35px;
    font-family:fantasy;
    }
    .div3 {
    font-family:fantasy;
    font-size:20px;
    margin-top:-15px;
    width:100%;
    float:left;
    border-top:dashed 1px;
    padding:5px;
    }
    .hp3 {
    font-family:monospace;
    }
   .hp4d { margin-top:-12px;}
   .hp3d { margin-top:-12px;}
  .pull-right {padding-right:15px;}
  .pull-left {padding-left:15px;}
    .hp4 {
    padding-left:7px;
    background:black;
    color:white;
    font-size:27px;
    border-radius:50px;
    }
    .mem {
    width:100%;
    margin-top:-10px;
    padding:5px;
    
    
    }
    .info {
    width:100%;
    text-align:center;
    font-size:18px;
    font-family:monospace;
    margin-top:-10px;
    
    }
    
    .cname {
    float:left;
    padding-left:10px;
    font-size:20px;
    margin-top:-15px;
    
    }
    .cmobile {
    float:right;
    padding-right:10px;
    font-size:20px;
    margin-top:-15px;
    }
    .hid {
    overflow:hidden;
    }
    .mcontent {
    border-top:dashed 1px #a9a9a9;
    width:100%;
    background:white;
    padding:5px;
    padding-left:15px;
    margin-top:-8px;
    }
    .tab {
    width:100%;
    line-height:25px;
    color:#a9a9a9;
    }
    .tabbody {
    font-size:14px;
    line-height:18px;
    font-family:monospace;
    color:#a9a9a9;
    }
    .cen {
    text-align:center;
    }
    .ptr {
    font-size:18px;
    font-family:monospace;
    }
    .lll {
    text-align:left;
    }
    .sum {
    background:white;
    padding-top:9px;
    text-align:right;
    padding-right:40px;
    border-top:dashed 1px #a9a9a9;
    line-height:13px;
    color:#a9a9a9;
    
    }
    .sum1 {
    border-top:dashed 1px #a9a9a9;
    padding-top:7px;
    text-align:right;
    padding-right:40px;
    background:white;
    line-height:13px;
    color:#a9a9a9;
    }
   .date {
   		margin-top:-20px;
   		width:50%;
   }
    </style> 
    
    
      </head>  
      <body>
      <div class="container" > 
      <button class="btn btn-warning pull-left" ><a href="order.php" >back</a></button>
      <button class="btn btn-info pull-right" >print</button>
       </div>
       <br>
           <div class="container" >  
         
                <?php   
                		$member_id = "";
                		$subtotal = "";
                		$gandtotal = "";
                		
                		$vat = "";
                		$pay = "";
                		$pay1 = "";
                		$discount = "";
                		$due = "";
                		$pament_mathot = "";
                		$pament = "";
                		$cost_price ="";
                		$profit ="";
                		$account = "";
                
                if(isset($_POST["place_order"]))  { 
                	$member_id = $_POST['member_id'];
                	$subtotal = $_POST['subtotal'];
                	$gandtotal = $_POST['gandtotal'];
                	
                	$vat = $_POST['vat'];
                	$pay = $_POST['pay'];
                	$pay1 = $_POST['pay1'];
                	$discount = $_POST['discount'];
                	$due = $_POST['due'];
                	$pament_mathot = $_POST['pament_mathot'];
                	$pament = $_POST['pament'];
                	$cost_price = $_POST['cost_price'];
                	$profit = $_POST['profit'];
                	$account = $_POST['account'];
                     
                     $insert_order = "  
                     INSERT INTO tbl_order(member_id, creation_date, subtotal, gandtotal, vat, pay, discount, due, pament_mathot, pament, cost_price, profit)  
                     VALUES('$member_id', '".date('Y-m-d')."', '$subtotal', '$gandtotal', '$vat', '$pay $pay1', '$discount', '$due', '$pament_mathot', '$pament', '$cost_price', '$profit')  
                     ";  
                     
                     
                     //edit qty
                     $sql = "UPDATE member SET due=due+? WHERE member_id=?";
                     $q = $conn->prepare($sql);
                     $q->execute(array($due,$member_id));
                     
                     
                     $sql = "UPDATE member SET pay=pay+? WHERE member_id=?";
                     $q = $conn->prepare($sql);
                     $q->execute(array($pay,$member_id));
                     
                     $sql = "UPDATE member SET pay=pay+? WHERE member_id=?";
                     $q = $conn->prepare($sql);
                     $q->execute(array($pay1,$member_id));
                     
                     
                     $sql = "UPDATE member SET account=account-? WHERE member_id=?";
                     $q = $conn->prepare($sql);
                     $q->execute(array($account,$member_id));
                     
                     
                     $sql = "UPDATE member SET gandtotal=gandtotal+? WHERE member_id=?";
                     $q = $conn->prepare($sql);
                     $q->execute(array($gandtotal,$member_id));
                     
                     
                     
                     
                     $order_id = "";  
                     if(mysqli_query($connect, $insert_order))  
                     {  
                          $order_id = mysqli_insert_id($connect);  
                     }  
                     $_SESSION["order_id"] = $order_id;  
                     $order_details = "";  
                     foreach($_SESSION["shopping_cart"] as $keys => $values)  
                     { 
                      
                      	$b = $values['product_id'];
                      	$c = $values['product_quantity'];
                      	
                      	//edit qty
                      	$sql = "UPDATE product SET product_quantity=product_quantity-? WHERE product_id=?";
                      	$q = $conn->prepare($sql);
                      	$q->execute(array($c,$b));
                      	
                      	
                
                      
                          $order_details .= "  
                          INSERT INTO tbl_order_details(order_id, product_name, product_price, product_cprice, product_quantity, profit, product_id)  
                          VALUES('".$order_id."', '".$values["product_name"]."', '".$values["product_price"]."', '".$values["product_cprice"]."', '".$values["product_quantity"]."', '".$picprofit."', '".$values["product_id"]."');  
                          ";  
                     }  
                     if(mysqli_multi_query($connect, $order_details))  
                     {  
                          unset($_SESSION["shopping_cart"]);  
                          //echo '<script>alert("You have successfully place an order...Thank you")</script>';  
                         echo '<script>window.location.href="cart.php"</script>';  
                     }  
                }  
                if(isset($_SESSION["order_id"]))  
                {  
                     $customer_details = '';  
                     $order_details = '';  
                     $total = 0; 
                      
                      
                     $query = 'SELECT tbl_order.*,
                     tbl_order_details.*,
                     member.member_name,
                     member.phone
                     
                     FROM tbl_order
                     
                     INNER JOIN tbl_order_details ON tbl_order.order_id = tbl_order_details.order_id
                     INNER JOIN member ON tbl_order.member_id = member.member_id
                     
                     WHERE tbl_order.order_id = "'.$_SESSION["order_id"].'"
                     
                     
                 ;';
                     
                     
                     $result = mysqli_query($connect, $query);  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     
                     $subtotal = $row ['subtotal'];
                     $gandtotal = $row ['gandtotal'];
                     $vat = $row ['vat'];
                     $pay = $row ['pay'];
                     $discount = $row ['discount'];
                     $due = $row ['due'];
                     $pament_mathot = $row ['pament_mathot'];
                     $pament = $row ['pament'];
                     $custome_name = $row ['member_name'];
                     $phone = $row ['phone'];
                     $creation_date = $row ['creation_date'];
                          
                          $customer_details = '  
                          <p>CUSTOMER NAME : '.$row["member_name"].' <p>  
                          <p>CUSTOMER MOBILE : '.$row["phone"].'</p>                            
                          ';  
                          
                          
                          $order_details .= "  
                               <tr>  
                                    <td class='lll'>".$row["product_name"]."</td>  
                                    <td class='cen' >".$row["product_quantity"]."</td>  
                                    <td class='cen' >".$row["product_price"]."</td>  
                                    <td class='cen' >".number_format($row["product_quantity"] * $row["product_price"], 0)."</td>  
                               </tr>  
                          ";  
                          $total = $total + ($row["product_quantity"] * $row["product_price"]);  
                     }  
                     echo ' 
                    
                    		
                    		<div class="memo" >
                    		<div class="header hid">
                    		<div class="div1">
                    		<img src="image/image.png" class="logo">
                    		</div>
                    		<div class="div2">
                    		<p class="hp1" ><b><i>SA STORE</i></b></p>
                    		<p class="hp2"><strong>SA GROUP LTD</strong> </p>                  		
                    		</div>
                    		<div class="div3" >	 
                    		<div class="hid" >	<p class="hp3" ><i>KazirChar,Muladi,Barishal,Bangladesh.</i> </p>
                    		
                    		</div>
                    		<div class="hid hp3d" ><p class="pull-left" >Casiar : Sumon</p> <p class="pull-right" >Memo : '.$_SESSION["order_id"].'</p>
                    					<p class="pull-left date" >Date : '.$creation_date.'</p> <p class="pull-right date" >Time : '.$_SESSION["order_id"].'</p>
                    		</div>	
                    		<div class="hid hp4d" >
                    		<p class="hp4" >Branch Contact No :01750005000 </p>
                    		</div>	     
                    		</div>
                    		
                    		<div class="mem hid" >
                    		<p class="info" >Customer Info</p>
                    		
                    		<p class="cname" ><i>Name : '.$custome_name.'</i></p>
                    		<p class="cmobile" ><i>Moblie :'.$phone.'</i></p>
                    		</div>
                    		</div>
                    		
                   <div class="mcontent hid" >
                    <table class="tab">  
                    		<tr class="ptr" >
                    		<th width="40%">Product Name</th>  
                    		<th width="15%" class="cen">Qty</th>  
                    		<th width="20%" class="cen">Price</th>  
                    		<th width="25%" class="cen">Total</th>  					
                    		</tr>
                    	<tbody class="tabbody" >
                    		'.$order_details.'  
                    
                   </tbody></table></div>';  
                    		}  
                    		?>  
                  <div class="sum" >
                  <p>SUB TOTAL : <?php echo $subtotal; ?></p>
                  <p>DISCOUNT : <?php echo $discount; ?></p>
                  <p>VAT: <?php echo $vat; ?></p>                	
                  <b><p>GARNT TOTAL : <?php echo $gandtotal; ?></p></b>
                  </div>
                  <div class="sum1" >
                  <p>PAMENT MATHOT :<?php echo $pament_mathot; ?></p>            						
                  <p>PAY : <?php echo $pay; ?></p>
                  <b><p>DUE : <?php echo $due; ?></p>  </b>           						            						
                  <p>PAMENT : <?php echo $pament; ?></p>
                  </div>
                  <div class="footer hid">
                  <p class="fp1">Office:01980008090</p><p class="fp2">Email:sagroup@gmail.com</p><p class="fp3"> <b><i>Thanks For Comeing</i></b></p>
                  </div>
                  </div> 		

                
              <br> <br> <br> </div>
      </body> 
 </html> 