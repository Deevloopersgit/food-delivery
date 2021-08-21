<?php
$pagename = "Manage Drivers";
include_once "header.php";
?>

<div class="container">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="mb-0 float-left">Drivers</h4>
        <button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#useradd">
          <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
      </div>
      <div class="card-body">
        <form action="driver_save.php" method="post">
          <button class="float-right btn btn-rounded btn-danger mb-3" id="delete" name="delete" type="submit"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
          <div class="table-responsive">
            <table id="example3" class="display min-w850">
              <thead>
                <tr>
                  <th><input id="chk_all" name="chk_all" type="checkbox"></th>
                  <th>Sr no</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Image</th>
                  <th>Role</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count = "1";
                $query = "SELECT tbl_user.*, roles.role AS rolename FROM `tbl_user`join `roles` ON roles.id=tbl_user.role WHERE tbl_user.role = '3'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>" /></td>
                    <td><?= $count++ ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><a class="fancybox" data-fancybox="gallery" href="../driver/backassets/images/drivers/<?php echo $row['image'] ?>"><img src="../driver/backassets/images/drivers/<?php echo $row['image'] ?>" class="img-fluid rounded-circle" alt="" style="width: 40px; height: 40px;"></a></td>
                    <td><?php echo $row['rolename'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td>
                      <?php
                      if ($row['status'] == "Unsuspend") {
                      ?>
                        <a href="driver_save.php?Unsuspend_id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><?php echo $row['status']; ?></a>
                      <?php
                      } elseif ($row['status'] == "Suspend") {
                      ?>
                        <a href="driver_save.php?Suspend_id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"><?php echo $row['status']; ?></a>
                      <?php

                      }
                      ?>
                    </td>
                    <td>
                      <div class="d-flex">
                        <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?= $row['id']; ?>', '<?= $row['name'] ?>', '<?= $row['phone'] ?>', '<?= $row['email'] ?>', '<?= $row['address'] ?>', '<?= $row['image'] ?>', '<?= $row['role'] ?>', '<?= $row['password'] ?>')"><i class="fa fa-pencil"></i></a>
                        <a href="driver_save.php?del_id=<?php echo $row['id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                      </div>
                    </td>
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
        <h5 class="modal-title">Insert Drivers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="driver_save.php" id="addusers" class=" needs-validation" method="POST" novalidate enctype="multipart/form-data">
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
              <div class="form-group"><label>Phone Number</label>
                <input type="tel" class="form-control" name="p_num" id="p_num" pattern="[0-9]{4}-?[0-9]{7}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><label>Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><label>Address</label>
                <input type="text" class="form-control" name="address" id="address" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group"><label>Image</label>
                <input type="file" class="form-control" name="image" id="image" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><label>Password</label>
                <i class="fa fa-eye" aria-hidden="true" style="margin-top: 43px; position: absolute; margin-left: 93px;" onclick="toggle()"></i>
                <input type="password" class="form-control" name="password" id="myresult" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-outline-success btn-sm" id="kkkk">Save</button>
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
        <h5 class="modal-title">Update Driver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="driver_save.php" id="updatepro" class=" needs-validation" method="POST" novalidate enctype="multipart/form-data">

        <div class="modal-body">
          <div class="row">
            <input type="hidden" class="form-control" name="id" id="id" required>

            <div class="col-md-6">
              <div class="form-group"><label>Name</label>
                <input type="text" class="form-control" name="upd_name" id="upd_name" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><label>Phone Number</label>
                <input type="tel" class="form-control" name="upd_phone" id="upd_phone" pattern="[0-9]{4}-?[0-9]{7}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><label>Email</label>
                <input type="email" class="form-control" name="upd_email" id="upd_email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><label>Address</label>
                <input type="text" class="form-control" name="upd_address" id="upd_address" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><label>Image</label>
                <input type="file" class="form-control" name="upd_image" id="upd_image">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group"><label>Password</label>
                <i class="fa fa-eye" aria-hidden="true" style="margin-top: 43px; position: absolute; margin-left: 93px;" onclick="kkkk()"></i>
                <input type="password" class="form-control" name="upd_password" id="upd_password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-success btn-sm" name="update">Update</button>
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
  function show(id, name, phone, email, address, image, role, password) {
    $('#id').val(id);
    $('#upd_name').val(name);
    $('#upd_phone').val(phone);
    $('#upd_email').val(email);
    $('#upd_address').val(address);
    // $('#upd_image').val(image);
    $('#upd_role').val(role);
    $('#upd_password').val(password);

    $('#update').modal('show');
  }


  (function() {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
  // for password hide show
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
  $(document).ready(function() {
    $('#chk_all').click(function() {
      if (this.checked)
        $(".chkbox").prop("checked", true);
      else
        $(".chkbox").prop("checked", false);
    });
  });

  $(document).ready(function() {
    $('#delete').submit(function(e) {
      if (!confirm("Confirm Delete?")) {
        e.preventDefault();
      }
    });
  });
</script>

<?php
if (isset($_SESSION["s"])) {
?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Driver Created successfully!',
      button: 'Ok!'
    })
  </script>
<?php
}
unset($_SESSION["s"]);
?>

<?php
if (isset($_SESSION["suc"])) {
?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Driver updated successfully!',
      button: 'Ok!'
    })
  </script>
<?php
}
unset($_SESSION["suc"]);
?>

<?php
if (isset($_SESSION["success"])) {
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
unset($_SESSION["success"]);
?>

<?php
if (isset($_SESSION["status"])) {
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
unset($_SESSION["status"]);
?>

<?php
if (isset($_SESSION["d"])) {
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
unset($_SESSION["d"]);
?>

<?php
if (isset($_SESSION["m"])) {
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
unset($_SESSION["m"]);
?>