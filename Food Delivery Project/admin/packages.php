<?php
$pagename = "Packages";
include_once "header.php";
?>

<div class="container">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="mb-0 float-left">Packages</h4>
<button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#useradd">
<span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
</div>
<div class="card-body">
<div id="message2"></div>
<form action="package_save.php" method="post">
<button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
<div class="table-responsive">
<table id="example3" class="display min-w850">
<thead>
<tr>
<th><input id="chk_all" name="chk_all" type="checkbox"></th>
<th>Sr no</th>
<th>Name</th>
<th>Price</th>
<th>Description</th>
<th>Duration</th>

<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$count = "1";
$query = "SELECT * FROM `package`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['pid']; ?>"/></td>
<td><?=$count++?></td>    
<td><?php echo $row['name']?></td>
    <td><?php echo $row['price']?></td>
    <td><?php echo $row['description']?></td>
    <td><?php echo $row['duration']?></td>
<td>
<?php
if ($row['status'] == "0") {
?>
<a href="package_save.php?Unsuspend_id=<?=$row['pid'];?>"  class="btn btn-danger btn-sm">Suspend</a>
<?php
} elseif ($row['status'] == "1"){
?>
<a href="package_save.php?Suspend_id=<?=$row['pid'];?>"  class="btn btn-success btn-sm">Unsuspend</a>
<?php

}
?>
</td>
    <td><div class="d-flex">
<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?=$row['pid'];?>', '<?=$row['name']?>', '<?=$row['price']?>', '<?=$row['duration']?>','<?=$row['description']?>')"><i class="fa fa-pencil"></i></a>
&nbsp;| &nbsp;<a href="package_save.php?del_id=<?php echo $row['pid']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
<h5 class="modal-title">Insert Packages</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="package_save.php" class="needs-validation" id="addusers" method="POST" novalidate>
<div class="modal-body">
<div class="row">
<div class="col-md-6">
<div class="form-group"><label>Name</label>
<input type="text" class="form-control" name="name" id="name" required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group"><label>Price</label>
<input type="number" class="form-control" name="price" id="price" required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group"><label>Duration</label>
<input type="text" class="form-control" name="duration" id="duration"  required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>

<div class="col-md-12">
<div class="form-group"><label>Description</label>
<textarea class="form-control" rows="5" id="desc" name="desc" cols="30"></textarea>
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
<h5 class="modal-title">Update Packages</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="package_save.php" id="updatepro" method="POST" novalidate>

<div class="modal-body">
<div class="row">
<input type="hidden" class="form-control" name="id" id="id">

<div class="col-md-6">
<div class="form-group"><label>Update Name</label>
<input type="text" class="form-control" name="upd_name" id="upd_name" >
</div>
</div>
<div class="col-md-6">
<div class="form-group"><label>Update Price</label>
<input type="text" class="form-control" name="upd_price" id="upd_price" >
</div>
</div>

<div class="col-md-6">
<div class="form-group"><label>Update Duration</label>
<input type="text" class="form-control" name="upd_duration" id="upd_duration">
</div>
</div>
<div class="col-md-12">
<div class="form-group"><label>Update Description</label>
<textarea class="form-control" rows="5" id="upd_desc" name="upd_desc" cols="30"></textarea>
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
function show(id,name,price,duration,description){
$('#id').val(id);
$('#upd_name').val(name);
$('#upd_price').val(price);
$('#upd_desc').val(description);
$('#upd_duration').val(duration);

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