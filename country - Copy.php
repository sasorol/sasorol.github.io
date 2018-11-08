<?php  
	 $connect = mysqli_connect("localhost", "root", "", "sastore");  
 	 $query ="SELECT * FROM tbl_order where pament_mathot='Cash'";  
 	 $result = mysqli_query($connect, $query);  
 ?>   
    <div class="container">                             
              <div class="table-responsive">  
                <div class="panel-heading" >
                	<h2 class="pull-left" >সব সদস্যর নাম ঠিকানার এখানে </h2>
                </div>	                	
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td class="th" >#</td>  
                                    <td class="th">দেশের নাম</td> 
                                    <td class="th">লিডারের নাম</td> 
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
                                    <td>'.$row["order_id"].'</td>  
                                    
                                    
                                    
                                     
                               </tr>  
                               ';  
                               $i++;
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>                      
 <script>  
 $(document).ready(function(){  
 $('#employee_data').DataTable();  
 });  
 </script> 