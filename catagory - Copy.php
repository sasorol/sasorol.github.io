<?php include 'file/header.php'; ?>
<?php include 'model/modalup.php'; ?>
<?php  
	 $connect = mysqli_connect("localhost", "root", "", "sastore");  
 	 $query ="SELECT * FROM catagory ORDER BY CATAGORY_ID DESC";  
 	 $result = mysqli_query($connect, $query);  
 ?>   

      <div class="container">                             
                <div class="table-responsive">  
                <div class="panel-heading" >
                	<h2 class="pull-left" >সব ক্যাটাগরি লিস্ট </h2>
                	<div type="button" class="bttn btn btn-info pull-right" data-toggle="modal" data-target="#myModal">নতুন ক্যাটাগরি যোগ করুন</div>
                	
                </div>
                <hr>	
                	<br>
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td class="th" >#</td>  
                                    <td class="th">ক্যাটাগরি</td>                            
                                    <td class="th">অন্যন্য</td>
                               </tr>  
                          </thead>  
                          <?php  
                          $i=1;
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$i.'</td>  
                                    <td>'.$row["catagory_name"].'</td>                              
                                    
                                    <td class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">অন্যন্য</a>
                                    <ul class="dropdown-menu">
                                    <li><a href="sv/catagorysv.php?del='.$row["catagory_id"].'" >মুছে ফেলুন</a></li>
                                    <li><a name="view" value="view" id="'.$row["catagory_id"].'" class="btn btn-info btn-xs view_data" >পরিবতন করুব</a></li>
                                    
                                    </ul>
                                    </td>
                                    
                                     
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
      <h4 class="modal-title">নতুন একটা দেশের নাম লিখুন</h4>
      </div>
      <div class="modal-body">
      
      	<form action="sv/catagorysv.php" method="POST" >
      		<div class="form-group">
      		<div class="col-sm-12">
      		<input type="text" name="catagory_name" class="form-control" placeholder="দেশের নাম লিখুন" required="required" >											
      		</div>
      	</div>	<br><br>	<br>
<!--///////////////NEXT//////////////////////////////////////-->
      <div class="form-group">
      	<div class="col-sm-4">
      	<input type="text" name="leder" class="form-control" placeholder="লিডারের নাম" >											
      	</div>
      	<div class="col-sm-4">
      	<input type="text" name="lederf" class="form-control" placeholder="লিডারের ফোন নাম্বার"  >											
      	</div>
      	<div class="col-sm-4">
      	<input type="text" name="leders" class="form-control" placeholder="লিডারের স্টাটাস"  >											
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
  
<!--/////////////////////////////////////////////////////-->
  <div id="dataModal" class="modal fade">  
  <div class="modal-dialog">  
  <div class="modal-content">  
  <div class="modal-header">  
  <button type="button" class="close" data-dismiss="modal">&times;</button>  
  <h4 class="modal-title">Employee Details</h4>  
  </div>  
  <div class="modal-body" id="employee_detail">  
  </div>  
  <div class="modal-footer">  
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
  </div>  
  </div>  
  </div>  
  </div>  
  
  
<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"up/catagoryup.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
 
 <script>  
 $(document).ready(function(){  
 $('#employee_data').DataTable();  
 });  
 </script> 