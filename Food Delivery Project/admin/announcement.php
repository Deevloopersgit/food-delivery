<?php
$pagename = "Announcement";
include "header.php";
?>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 float-left">Announcements</h4>
                <button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal"
                    data-target="#announcement">
                    <span class="btn-icon-left text-info"><i
                            class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
            </div>
            <div class="card-body">
                <div id="message2"></div>
                <form action="phpcode.php" method="post">
                <button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span
                        class="btn-icon-left text-danger"><i
                            class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
                <div class="table-responsive">
                    <table id="example3" class="display min-w850">
                        <thead>
                            <tr>
                            <th><input id="chk_all" name="chk_all" type="checkbox"></th>
                                <th>Sr no</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
$count = "1";
$query = "SELECT * FROM `announcement`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>"/></td>
    <td><?=$count++?></td>
    <td><?php echo $row['title']?></td>
    <td><?php echo $row['description']?></td>
    <td><?php echo $row['date']?></td>
    <td><a class="fancybox" data-fancybox="gallery" href="backassets/images/announcement/<?php echo $row['image']?>"><img src="backassets/images/announcement/<?php echo $row['image']?>" class="img-fluid rounded-circle" alt="" style="width: 40px; height: 40px;"></a></td>
<td>
<?php
if ($row['status'] == "1") {
?>
<a href="phpcode.php?Unsuspend_id=<?=$row['id'];?>"  class="btn btn-danger btn-sm">Suspend</a>
<?php
} elseif ($row['status'] == "0"){
?>
<a href="phpcode.php?Suspend_id=<?=$row['id'];?>"  class="btn btn-success btn-sm">Unsuspend</a>
<?php

}
?>
</td>
    <td><div class="d-flex">
<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?=$row['id'];?>', '<?=$row['title']?>', '<?=$row['description']?>', '<?=$row['date']?>', '<?=$row['image']?>')"><i class="fa fa-pencil"></i></a>&nbsp; | &nbsp;<a href="phpcode.php?del_id=<?php echo $row['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>

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
<div class="modal fade" id="announcement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="phpcode.php" id="addannouncement" class="needs-validation" method="post" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group"><label>Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Date</label>
                                <input type="date" class="form-control" name="date" id="date" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label>Image</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label>Description</label>
                                
                                    <textarea id="desc" name="desc" rows="4" cols="50" required></textarea>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success btn-sm" name="cannouncement">Save</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="phpcode.php" id="updatepro" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                <div class="row">
                        <div class="col-md-6">
                        <input type="text" hidden class="form-control" name="id" id="id" required>
                        <div class="form-group"><label>Update Title</label>
                                <input type="text" class="form-control" name="utitle" id="utitle"required>

                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Update Date</label>
                                <input type="date" class="form-control" name="udate" id="udate" required>

                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label>Update Image</label>
                                <input type="file" class="form-control" name="uimage" id="uimage">

                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label>Update Description</label>
                                
                                    <textarea id="udesc" name="udesc" rows="4" cols="50" required></textarea>

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

// product insert ajax start
function show(id,title,description,date){
$('#id').val(id);
$('#utitle').val(title);
$('#udesc').val(description);
$('#udate').val(date);

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
if(isset($_SESSION["u"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Announcement created successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["u"]);
?>

<?php
if(isset($_SESSION["s"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Announcement updated successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["s"]);
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
if(isset($_SESSION["k"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Multiple Records Deleted successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["k"]);
?>

<?php
if(isset($_SESSION["l"] ))
{
?>
 <script>
   
   Swal.fire({
  icon: 'success',
  title: 'Announcement Deleted successfully!',
  button: 'Ok!'
})
</script>
<?php
}
unset ($_SESSION["l"]);
?>