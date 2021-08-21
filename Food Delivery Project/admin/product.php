<?php
$pagename = "Add Product";
include "header.php";
?>
<div class="container">
 <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="mb-0 float-left">Product</h4>
        <button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#proadd">
        <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
                            </div>
                            <div class="card-body">
                            <div id="message2"></div>
                            <form action="product_save.php" method="post">
                            <button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850 table-responsive">
                                    <thead>
                    <tr>
                    <th><input id="chk_all" name="chk_all" type="checkbox"></th>
                        <th>Sr no</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Product Quantity</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                                        <tbody>
                                         
                                        <?php
$count = "1";
$query = "SELECT tbl_products.*, tbl_categories.cat_name,tbl_sub_category.sub_cat_name FROM `tbl_products`,`tbl_categories`,tbl_sub_category where tbl_categories.cat_id=tbl_products.category and tbl_sub_category.sub_cat_id =tbl_products.sub_category";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>"/></td>
    <td><?=$count++?></td>
    <td><?php echo $row['cat_name']?></td>
    <td><?php echo $row['sub_cat_name']?></td>
    <td><?php echo $row['product_name']?></td>
    <td><?php echo $row['product_price']?></td>
    <td><a class="fancybox" data-fancybox="gallery" href="backassets/images/product/<?php echo $row['product_image']?>"><img src="backassets/images/product/<?php echo $row['product_image']?>" class="img-fluid rounded-circle " alt="" style="width: 40px; height: 40px;"></a></td>
    <td><?php echo $row['qauntity']?></td>
    <td><?php echo $row['descp']?></td>
<td>
<?php
if ($row['status'] == "Unsuspend") {
?>
<a href="product_save.php?Unsuspend_id=<?=$row['id'];?>"  class="btn btn-danger btn-sm"><?php echo $row['status'];?></a>
<?php
} elseif ($row['status'] == "Suspend"){
?>
<a href="product_save.php?Suspend_id=<?=$row['id'];?>"  class="btn btn-success btn-sm"><?php echo $row['status'];?></a>
<?php

}
?>
</td>
    <td><div class="d-flex">
<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?=$row['id'];?>', '<?=$row['category']?>', '<?=$row['sub_category']?>', '<?=$row['product_name']?>', '<?=$row['product_price']?>', '<?=$row['product_image']?>', '<?=$row['qauntity']?>', '<?=$row['descp']?>')"><i class="fa fa-pencil"></i></a>
<a href="product_save.php?del_id=<?php echo $row['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
</div></td>
</tr>
<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
<!-- product add modal start-->
<div class="modal fade" id="proadd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form action="product_save.php" id="addproduct" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
           <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label>Category Name</label>
                           <select name="parent_category1" id="parent_category1" class="form-control">
                              <option>--Select--</option>
                              <?php
                               $query = "SELECT * FROM tbl_categories";
                               $q = mysqli_query($con,$query);
                               while($row = mysqli_fetch_array($q))
                               {
                                ?>
                            <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>
                            <?php
                               }
                               ?>
                           </select>
                           
                                      <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Sub Category Name</label>
                            <select name="sub_cat_name1" id="sub_cat_name1" class="form-control">
                              <option>Select Sub Categories</option>
                           </select>
                                       <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Product Name</label>
                            <input type="text" class="form-control" name="pro_name" id="pro_name" required>
                                       <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Product Price</label>
                            <input type="number" class="form-control" name="pro_price" id="pro_price" required>
                                       <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Product Image</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                                       <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Product Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" required>
                                       <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><label>Description</label>
                        <textarea name="desc" id="desc" cols="52" rows="5"></textarea>
                        <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-success btn-sm" name="submit">Save</button>
            </div>

           </form>
        </div>
    </div>
</div>
<!-- product add modal end -->
<!-- subthis is for the update modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="product_save.php" id="updatepro" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                <input type="hidden" class="form-control" name="id" id="id">

                    <div class="col-md-6">
                        <div class="form-group"><label>Category Name</label>
                           <select name="name" id="name" class="form-control">
                               <?php
                               $query = "SELECT * FROM `tbl_categories`";
                               $q = mysqli_query($con,$query);
                               while($row = mysqli_fetch_array($q))
                               {
                                ?>
                            <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>
                            <?php
                               }
                               ?>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Sub Category Name</label>
                        <select name="upd_sub_cat_name" id="upd_sub_cat_name" class="form-control">
                              <option>Select Sub Categories</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Product Name</label>
                            <input type="text" class="form-control" name="upd_pro_name" id="upd_pro_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Product Price</label>
                            <input type="number" class="form-control" name="upd_pro_price" id="upd_pro_price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Product Image</label>
                            <input type="file" class="form-control" name="upd_pro_image" id="upd_pro_image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Product Quantity</label>
                            <input type="number" class="form-control" name="upd_quantity" id="upd_quantity">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><label>Description</label>
                            <textarea name="upd_desc" id="upd_desc" cols="52" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-success btn-sm" name="update" >Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- end for the update model -->
<?php
include "footer.php";
?>

<script>
// product start
 $("#parent_category1").on("change",function(){
   var subcat  = $(this).val();
   if (subcat) {
    $.ajax({
    	url :"product_save.php", 
	type:"POST",
	cache:false,
	data:{subcat:subcat},
	success:function(data){
    
	    $("#sub_cat_name1").html(data);
	}
    });
   }else{
	$('#sub_cat_name1').html('<option value="">No Record found</option>');
       
   }
});

$("#name").on("change",function(){
   var subcategory  = $(this).val();
   if (subcategory) {
    $.ajax({
    	url :"product_save.php", 
	type:"POST",
	cache:false,
	data:{subcategory:subcategory},
	success:function(data){
    
	    $("#upd_sub_cat_name").html(data);
	}
    });
   }else{
	$('#upd_sub_cat_name').html('<option value="">No Record found</option>');
       
   }
});


function kkk() {
    
    var selectedValue =  $('#name').val();

     $.ajax({
        url: 'product_save.php',
        type: 'POST',
        data: {opti : selectedValue},
        success: function(data) {
            
            $('#upd_sub_cat_name').val(data);
        }
    });
}
// product end
// product insert ajax start
function show(id,category,sub_category,product_name,product_price,product_image,qauntity,descp){
$('#id').val(id);
$('#name').val(category);
$('#upd_sub_cat_name').val(sub_category);
$('#upd_pro_name').val(product_name);
$('#upd_pro_price').val(product_price);
// $('#upd_image').val(image);
$('#upd_quantity').val(qauntity);
$('#upd_desc').val(descp);

$('#update').modal('show');
}

(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

// for check all and delete
$(document).ready(function(){
    $('#chk_all').click(function(){
        if(this.checked)
            $(".chkbox").prop("checked", true);
        else
            $(".chkbox").prop("checked", false);
    });
});

$(document).ready(function(){
    $('#delete').submit(function(e){
        if(!confirm("Confirm Delete?")){
            e.preventDefault();
        }
    });
});


</script>

<?php
if(isset($_SESSION["uu"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Product Created successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["uu"]);
?> 

<?php
if(isset($_SESSION["suc"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Product updated successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["suc"]);
?> 

<?php
if(isset($_SESSION["success"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Suspended successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["success"]);
?> 

<?php
if(isset($_SESSION["status"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Unsuspended successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["status"]);
?> 

<?php
if(isset($_SESSION["d"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Multiple records deleted successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["d"]);
?> 

<?php
if(isset($_SESSION["m"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Record deleted successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["m"]);
?> 