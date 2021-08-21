<?php
$pagename = "Manage Branches";
include_once "header.php";
?>

<div class="container">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="mb-0 float-left">Terms & Condition</h4>

</div>
<div class="card-body">
<div id="message2"></div>
<div class="table-responsive">
<table id="example3" class="display min-w850">
<thead>
<tr>
<th>Sr no</th>
<th>Terms & condition</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$count = "1";
$query = "SELECT * FROM `terms` LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
?>
<tr>
<td><?=$count++?></td>
    <td><?=$row['description']?></td>

    <td><div class="d-flex" style="font-size: 17px;">
<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?=$row['id'];?>','<?=$row['description']?>')"><i class="fa fa-pencil"></i></a>

</div></td>
</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<!-- product add modal start-->

<!-- product add modal end -->
<!-- subthis is for the update modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Update Terms & Conditionss</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="terms_save.php" id="updatepro" class="needs-validation" method="POST" novalidate>

<div class="modal-body">
<div class="row">
<input type="hidden" class="form-control" name="id" id="id">

<div class="col-md-12">
<div class="form-group"><label>Description</label>
<textarea type="text" class="form-control" name="description" id="ddescription"  cols="52" rows="5"></textarea>
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
function show(id,description){
$('#id').val(id);
$('#ddescription').val(description);

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
</script>

<?php
if(isset($_SESSION["suc"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Terms updated successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["suc"]);
?> 