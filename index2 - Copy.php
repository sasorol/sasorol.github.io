<?php  include('dbConfig.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="file/css/bootstrap.min.css" rel="stylesheet" />
 
<script src="file/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#catagory').on('change',function(){
        var catagoryID = $(this).val();
        if(catagoryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'catagory_id='+catagoryID,
                success:function(html){
                    $('#brand').html(html);
                    $('#city').html('<option value="">আগে ব্রান্ড লিখুন</option>'); 
                }
            }); 
        }else{
            $('#brand').html('<option value="">আগে ক্যাটাগরি লিখুন</option>');
            $('#city').html('<option value="">আগে ব্র‍্যান্ড লিখুন</option>'); 
        }
    });
    
    $('#brand').on('change',function(){
        var brandID = $(this).val();
        if(brandID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'brand_id='+brandID,
                success:function(html){
                    $('#product').html(html);
                }
            }); 
        }else{
            $('#product').html('<option value="">আগে ব্র‍্যান্ড লিখুন</option>'); 
        }
    });
});
</script>
</head>

<body>
<h1><a href="product.php" >product</a></h1>
<div class="container">
   
    <?php
    
    //Get all country data
    $query = $db->query("SELECT * FROM catagory WHERE status = 1 ORDER BY catagory_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="catagory" id="catagory" class="form-control" >
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
    
    <select name="brand" id="brand" class="form-control">
        <option value="">ব্রান্ড</option>
    </select>
    
    <select name="product" id="product" class="form-control">
        <option value="">পন্য</option>
    </select>
  

          
   </div>

  
</body>
</html>