<?php
$pagename = "Manage Orders";
include_once "header.php";
?>

<div class="container">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="mb-0 float-left">Offers</h4>
<button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#useradd">
<span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
</div>
<div class="card-body">
<div id="message2"></div>
<form action="order_save.php" method="post">
<button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
<div class="table-responsive">
<table id="example3" class="display min-w850">
<thead>
<tr>
<th><input id="chk_all" name="chk_all" type="checkbox"></th>
<th>Sr no</th>
<th>Offers</th>
<th>Discounts</th>
<th>Promo Code</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$count = "1";
$query = "SELECT * FROM `tbl_order` WHERE `user_id`='2'";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>"/></td>
    <td><?=$count++?></td>
    <td><?php echo $row['offer']?></td>
    <td><?php echo $row['discount']?></td>
    <td><?php echo $row['promo_code']?></td>
<td>
<?php
if ($row['status'] == "Unsuspend") {
?>
<a href="order_save.php?Unsuspend_id=<?=$row['id'];?>"  class="btn btn-success btn-sm"><?php echo $row['status'];?></a>
<?php
} elseif ($row['status'] == "Suspend"){
?>
<a href="order_save.php?Suspend_id=<?=$row['id'];?>"  class="btn btn-danger btn-sm"><?php echo $row['status'];?></a>
<?php

}
?>
</td>
    <td><div class="d-flex">
<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?=$row['id'];?>', '<?=$row['offer']?>', '<?=$row['discount']?>', '<?=$row['promo_code']?>')"><i class="fa fa-pencil"></i></a>
&nbsp;| &nbsp;<a href="order_save.php?del_id=<?php echo $row['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="useradd" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Insert Orders</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="order_save.php" class="needs-validation" id="addusers" method="POST" novalidate>
<div class="modal-body">
<div class="row">
<div class="col-md-6">
<div class="form-group"><label>Offer</label>
<input type="text" class="form-control" name="name" id="name" required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group"><label>Discount</label>
<input type="number" class="form-control" name="p_num" id="p_num" required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group"><label>Promo Code</label>
<input type="text" class="form-control" name="address" id="address" maxlength="6" required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
<button type="submit" name="submit" class="btn btn-outline-success btn-sm" id="kkkk" >Save</button>
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
<h5 class="modal-title">Update Orders</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="order_save.php" id="updatepro" method="POST" novalidate>

<div class="modal-body">
<div class="row">
<input type="hidden" class="form-control" name="id" id="id">

<div class="col-md-6">
<div class="form-group"><label>Offer</label>
<input type="text" class="form-control" name="upd_name" id="upd_name" >
</div>
</div>
<div class="col-md-6">
<div class="form-group"><label>Discount</label>
<input type="text" class="form-control" name="upd_phone" id="upd_phone" >
</div>
</div>

<div class="col-md-6">
<div class="form-group"><label>Promo Code</label>
<input type="text" class="form-control" name="upd_address" id="upd_address" maxlength="6">
</div>
</div>

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-outline-success btn-sm" name="update">Save</button>
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
function show(id,offer,discount,promo_code){
$('#id').val(id);
$('#upd_name').val(offer);
$('#upd_phone').val(discount);
$('#upd_address').val(promo_code);

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
  title: 'Order Created successfully!',
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
  title: 'Order updated successfully!',
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