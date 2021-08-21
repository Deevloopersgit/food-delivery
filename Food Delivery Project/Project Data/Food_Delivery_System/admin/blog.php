<?php
$pagename = "Manage blogs";
include_once "header.php";
?>

<div class="container">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="mb-0 float-left">Blogs</h4>
<button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#useradd">
<span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
</div>
<div class="card-body">
<div id="message2"></div>
<form action="blog_save.php" method="post">
<button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
<div class="table-responsive">
<table id="example3" class="display min-w850">
<thead>
<tr>
<th><input id="chk_all" name="chk_all" type="checkbox"></th>
<th>Sr no</th>
<th>Blogs Name</th>
<th>Blogs Desc</th>
<th>Blogs Image</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$count = "1";
$query = "SELECT * FROM `tbl_blog`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>"/></td>
    <td><?=$count++?></td>
    <td><?php echo $row['blog_name']?></td>
    <td><?php echo $row['blog_desc']?></td>
    <td><a class="fancybox" data-fancybox="gallery" href="backassets/images/blog/<?php echo $row['blog_image']?>"><img src="backassets/images/blog/<?php echo $row['blog_image']?>" class="img-fluid rounded-circle" alt="" style="width: 40px; height: 40px;" ></a></td>
<td>
<?php
if ($row['status'] == "0") {
?>
<a href="agent_save.php?Unsuspend_id=<?=$row['id'];?>"  class="btn btn-success btn-sm">Unsuspand</a>
<?php
} elseif ($row['status'] == "1"){
?>
<a href="blog_save.php?Suspend_id=<?=$row['id'];?>"  class="btn btn-danger btn-sm">Suspand</a>
<?php

}
?>
</td>
    <td><div class="d-flex">
<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?=$row['id'];?>', '<?=$row['blog_name']?>')"><i class="fa fa-pencil"></i></a>
<a href="blog_save.php?del_id=<?php echo $row['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
<h5 class="modal-title">Insert Blog</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="blog_save.php" class="needs-validation" id="addusers" method="POST" novalidate enctype="multipart/form-data">
<div class="modal-body">
<div class="row">
<div class="col-md-6">
<div class="form-group"><label>Blog Name</label>
<input type="text" class="form-control" name="blog_name" id="blog_name" required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>

<div class="col-md-6 ">
<div class="form-group"><label>Blog Image</label>
<input type="file" class="form-control" name="image" id="image" required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group"><label>Blog Description</label>
<!-- <input type="number" class="form-control" name="blog_name" id="blog_name" required> -->
<textarea name="blog_desc" id="blog_desc"></textarea>
                <script>
                        CKEDITOR.replace( 'blog_desc' );
                </script>
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
<h5 class="modal-title">Update Blog</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="blog_save.php" id="updatepro" method="POST" novalidate enctype="multipart/form-data">

<div class="modal-body">
<div class="row">
<input type="hidden" class="form-control" name="id" id="id">

<div class="col-md-6">
<div class="form-group"><label>Update Blog Name</label>
<input type="text" class="form-control" name="upd_blog_name" id="upd_blog_name" >
</div>
</div>
<div class="col-md-6">
<div class="form-group"><label>Update Image</label>
<input type="file" class="form-control" name="upd_blog_image" id="upd_image" >
</div>
</div>
<div class="col-md-12">
<div class="form-group"><label>Update Blog Description</label>
<!-- <input type="number" class="form-control" name="blog_name" id="blog_name" required> -->
<textarea name="upd_blog_desc" id="upd_blog_desc"></textarea>
                <script>
                        CKEDITOR.replace( 'upd_blog_desc' );
                </script>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
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
// for modal show
function show(id,blog_name){
$('#id').val(id);
$('#upd_blog_name').val(blog_name);
$.ajax({
  url:"blog_save.php",
  type:"POST",
  data:{id:id,fecthupate:"btn"},
  success:function(res){
  CKEDITOR.instances['upd_blog_desc'].setData(res);

  }
})


$('#update').modal('show');
}

// for form validation
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

// for password hide and show

function toggle() {
  var x = document.getElementById("myresult");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function kkkk() {
  var x = document.getElementById("upd_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


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
if(isset($_SESSION["pro"])){
    ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Promo code valid',
  button: 'Ok!'
})
</script>
    <?php
}
unset ($_SESSION["pro"]);
?>

<?php
if(isset($_SESSION["promo"])){
    ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'Promo code invalid',

  button: 'Ok!'
})
</script>
    <?php
}
unset ($_SESSION["promo"]);
?>

<?php
if(isset($_SESSION["uu"] ))
{
?>
 <script> 
   
   Swal.fire({
  icon: 'success',
  title: 'blog Created successfully!',
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
  title: 'blog updated successfully!',
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