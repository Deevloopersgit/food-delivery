<?php
$pagename = "Manage Subscription Plan";
include_once "header.php";
?>

<div class="container">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="mb-0 float-left">Subscription Plan</h4>
<!-- <button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#useradd">
<span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button> -->
</div>
<div class="card-body">
<div id="message2"></div>
<form action="subscription_save.php" method="post">
<button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
<div class="table-responsive">
<table id="example3" class="display min-w850">
<thead>
<tr>
<th><input id="chk_all" name="chk_all" type="checkbox"></th>
<th>Sr no</th>
<th>User Name</th>
<th>Package Name</th>
<th>Package Price</th>
<th>Description</th>
<th>Package Duration</th>

<th>Countdowm</th>

<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$count = 1;
$query = "select package.*,tbl_subscriptionplan.pack_id,tbl_subscriptionplan.date,tbl_subscriptionplan.pack_status,DATE_ADD(DATE(tbl_subscriptionplan.date),INTERVAL package.duration MONTH) as enddate,TIME(tbl_subscriptionplan.date) as endtime,tbl_user.name as username from tbl_subscriptionplan,package,tbl_user where tbl_user.id=tbl_subscriptionplan.username and package.pid=tbl_subscriptionplan.pack_name";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['pack_id']; ?>"/></td>
<td><?=$count++?></td>    
<td><?php echo $row['username']?></td>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['price']?></td>
    <td><?php echo substr($row['description'],0,20)."..."?></td>
    <td><?php echo $row['duration']?></td>
   
  

    <td id="countdown<?=$count?>"></td>
<td>
<?php
if ($row['pack_status'] == "Unsuspend") {
?>
<a href="subscription_save.php?Unsuspend_id=<?=$row['pack_id'];?>"  class="btn btn-success btn-sm"><?php echo $row['pack_status'];?></a>
<?php
} elseif ($row['pack_status'] == "Suspend"){
?>
<a href="subscription_save.php?Suspend_id=<?=$row['pack_id'];?>"  class="btn btn-danger btn-sm"><?php echo $row['pack_status'];?></a>
<?php

}
?>
</td>
    <td><div class="d-flex">
<!-- <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?=$row['pack_id'];?>', '<?=$row['username']?>', '<?=$row['pack_name']?>', '<?=$row['pack_price']?>', '<?=$row['pack_duration']?>')"><i class="fa fa-pencil"></i></a> -->
<a href="subscription_save.php?del_id=<?php echo $row['pack_id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
</div></td>
</tr>
<script type="text/javascript">
	$(function() {
		$("#countdown<?=$count?>").countdowntimer({
			dateAndTime : "<?php echo $row['enddate'].' '.$row["endtime"]?>",
			labelsFormat : true,
			displayFormat : "ODHMS"
		});
	});
</script>
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
<h5 class="modal-title">Insert Subscription Plan</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
</button>
</div> 
<form action="subscription_save.php" class="needs-validation" id="addusers" method="POST" novalidate>
<div class="modal-body">
<div class="row">
<div class="col-md-6">

<div class="form-group"><label>User Name</label>
<select class="form-control"  name="name" id="name" >
  <option selected="selected">Select</option>
  <?php
$r=mysqli_query($con,"SELECT * FROM `tbl_user` WHERE role = 1");
while($row = mysqli_fetch_array($r)){
?>
  <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
  <?php
}
?>
</select>
<!-- <input type="text" class="form-control" name="name" id="name" required> -->
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>

</div>
<div class="col-md-6">
<div class="form-group"><label>Package Name</label>
<select class="form-control" name="p_num" id="p_num" onchange="subs(this.value)">
          <option>Select</option>
          <?php
 $q = "SELECT * FROM `package`";
 $query = mysqli_query($con,$q);
while($row =mysqli_fetch_array($query)){
      
            ?>
          <option value="<?=$row["id"]?>"><?php echo $row['name']?></option>
          <?php }?>
        </select>
<!-- <input type="text" class="form-control" name="p_num" id="p_num" required> -->
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group" ><label >Package Price</label>
<!-- <input type="text" class="form-control" readonly> -->
<input type="number" class="form-control" name="price" id="Price" required>
<div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group" ><label>Package Duration</label>
<!-- <input type="text" class="form-control" readonly> -->
<input type="text" class="form-control" name="duration" id="duration" required>
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
<h5 class="modal-title">Update Subscription Plan</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="subscription_save.php" id="updatepro" method="POST" novalidate>

<div class="modal-body">
<div class="row">
<input type="hidden" class="form-control" name="id" id="id">

<div class="col-md-6">
<div class="form-group"><label>User1 Name</label>
<select class="form-control" name="upd_name" id="upd_name">
  <option selected="selected">orange</option>
  <option>white</option>
  <option>purple</option>
</select>



 

<!-- <input type="text" class="form-control" name="upd_name" id="upd_name" > -->
</div>
</div>
<div class="col-md-6">
<div class="form-group"><label>Package Name</label>
<input type="text" class="form-control" name="upd_phone" id="upd_phone" >
</div>
</div>

<div class="col-md-6">
<div class="form-group"><label>Package price</label>
<input type="number" class="form-control" name="upd_address" id="upd_address" >
</div>
</div>
<div class="col-md-6">
<div class="form-group"><label>Duration</label>
<input type="text" class="form-control" name="upd_duration" id="upd_duration" >
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
function show(id,username,pack_name,pack_price,pack_duration){
$('#id').val(id);
$('#upd_name').val(username);
$('#upd_phone').val(pack_name);
$('#upd_address').val(pack_price);
$('#upd_duration').val(pack_duration);
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
  title: 'Subscription Created successfully!',
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
  title: 'Subscription updated successfully!',
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
<script> 
 // Country dependent ajax
//  $("#p_num").on("change",function(){
//    var price  = $(this).val();
//    if (price) {
//     $.ajax({
//     	url :"subscription_save.php", 
// 	type:"POST",
// 	cache:false,
// 	data:{price:price},
// 	success:function(data){
    
// 	    $("#price").html(data);
// 	}
//     });
//    }else{
// 	$('#price').html('<option value="">No Record found</option>');
       
//    }
// });
// $("#p_num").on("change",function(){
//    var duration  = $(this).val();
//    if (duration) {
//     $.ajax({
//     	url :"subscription_save.php", 
// 	type:"POST",
// 	cache:false,
// 	data:{duration:duration},
// 	success:function(data){
    
// 	    $("#duration").html(data);
// 	}
//     });
//    }else{
// 	$('#duration').html('<p>No record found</p>');
       
//    }
// });
$(".name").select2({
  tags: true
});

function subs(id){
	$.ajax({
		url:"subscription_save.php",
		type:"POST",
		data:{id:id,crtsubs:"btn"},
		dataType:"JSON",
		success:function(res){
    
		$("#Price").val(res.price);
		$("#duration").val(res.duration);
		$("#desc").val(res.description);
		}
	})
}




</script>
