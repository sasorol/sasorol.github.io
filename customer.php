
<?php include("file/header.php");?>
<?php  
	 $connect = mysqli_connect("localhost", "root", "", "sastore");  
 	 $query ="SELECT * FROM member ORDER BY MEMBER_ID DESC";  
 	 $result = mysqli_query($connect, $query);  
 ?> 
  
 
  
      <div class="container">                             
                <div class="table-responsive">  
                	<div class="panel-heading" >
                	<h2 class="pull-left" >সব ব্রান্ড নাম ঠিকানার এখানে</h2>
                	<div type="button" class="bttn btn btn-info pull-right" data-toggle="modal" data-target="#myModal">নতুন সদস্য যোগ করুন<</div>
                	
                	</div>	
                	
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td class="th" >#</td>  
                                     <td class="th">customer name</td>
                                    <td class="th">total</td>  
                                    <td class="th">pay</td>
                                    <td class="th">due</td>
                                    <td class="th">Barcode</td>
                               </tr>  
                          </thead>  
                          <?php  
                          
                          $i=1;
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                               
                                    <td>'.$i.'</td>  
                                    <td>'.$row["member_name"].'</td> 
                                    <td>'.$row["gandtotal"].'</td> 
                                    <td>'.$row["pay"].'</td>
                                    <td>'.$row["due"].'</td>
                                    <td>'.$row["barcode_id"].'</td>
                                     
                                     
                               </tr>  
                               ';  
                               $i++;
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      
     
      
  <!--///////////////moden//////////////////////////////////////-->
  <div class="container" >
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog"> 
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">নতুন একটা বিভাগের নাম লিখুন</h4>
  </div>
  <div class="modal-body">
  
  <form action="sv/brandsv.php" method="POST" >
  <div class="form-group">
  <div class="col-sm-12">
  <input type="text" name="brand_name" class="form-control" placeholder="বিভাগের নাম লিখুন" required="required" >											
  </div>
  
  </div>
  
  <br><br><br>
  
  <div class="form-group">
  
  
  
  <div class="col-sm-12">
  
  
   <?php
   
   //Get all country data
   $query = $db->query("SELECT * FROM catagory WHERE status = 1 ORDER BY catagory_name ASC");
   
   //Count total number of rows
   $rowCount = $query->num_rows;
   ?>
   <select name="catagory_id" id="catagory" class="form-control" >
   <option value="">ক্যাটাগরি</option>
   <?php
   if($rowCount > 0){
   while($row = $query->fetch_assoc()){ 
   echo '<option value="'.$row['catagory_id'].'">'.$row['catagory_name'].'</option>';
   }
   }else{
   echo '<option value="">কোন ক্যাটাগরি নেই</option>';
   }
   ?>
   </select>
   
   </div>
  
  
  
  </div>
  <br><br>
  <!--///////////////NEXT//////////////////////////////////////-->
  <div class="form-group">
  <div class="col-sm-4">
  <input type="text" name="leder" class="form-control" placeholder="লিডারের নাম" >											
  </div>
  <div class="col-sm-4">
  <input type="text" name="lederf" class="form-control" placeholder="লিডারের ফোন নাম্বার"  >											
  </div>
  <div class="col-sm-4">
  <input type="text" name="leders" class="form-control" placeholder="লিডারের স্টাটাস" >											
  </div>
  </div>
  <div class="form-group">
  <div class="col-sm-6">
  <input type="hidden" name="leder0" class="form-control" placeholder="">											
  </div>
  </div>
  <!--///////////////NEXT//////////////////////////////////////-->
  
  <br><br>
  <input type="hidden" name="status" value="1" >
  <center> 	<input class="btn btn-success btn-lg" type="submit" name="save" value="save"></center>
  
  </form>
  
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </div>   
  </div>
  </div>
  </div>
  <!--/////////////////////////////////////////////////////-->
  
    
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
 
 <!--/////////////////////////////////////////////////////-->
 
 <script>  
 $(document).ready(function(){  
 $('.view_data').click(function(){  
 var view_id = $(this).attr("id");  
 $.ajax({  
 url:"up/brandup.php",  
 method:"post",  
 data:{view_id:view_id},  
 success:function(data){  
 $('#employee_detail').html(data);  
 $('#dataModal').modal("show");  
 }  
 });  
 });  
 });  
 </script>
 
 
 
 