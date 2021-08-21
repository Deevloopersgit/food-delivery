<?php
$pagename = "Add Drivers";
include_once "header.php";
?>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 float-left">Add Drivers</h4>
                <button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#proadd">
                    <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
            </div>
            <div class="card-body">
                <div id="message2"></div>
                <form action="profile_save.php" method="post">
                    <button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850 table-responsive">
                            <thead>
                                <tr>
                                    <th><input id="chk_all" name="chk_all" type="checkbox"></th>
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Image</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th>Verification</th>
                                    <th>Vkey</th>
                                    <th>Upgrade</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $count = "1";
                                $query = "SELECT * FROM tbl_user WHERE role = '3'";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>" /></td>
                                        <td><?= $count++ ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['password'] ?></td>
                                        <td><a class="fancybox" data-fancybox="gallery" href="backassets/images/drivers/<?php echo $row['image'] ?>"><img src="backassets/images/drivers/<?php echo $row['image'] ?>" class="img-fluid rounded-circle " alt="" style="width: 40px; height: 40px;"></a></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['role'] ?></td>
                                        <td><?php echo $row['verification'] ?></td>
                                        <td><?php echo $row['vkey'] ?></td>
                                        <td><?php echo $row['upgrade'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?= $row['id']; ?>', '<?= $row['name'] ?>', '<?= $row['phone'] ?>', '<?= $row['password'] ?>', '<?= $row['image'] ?>', '<?= $row['address'] ?>', '<?= $row['role'] ?>', '<?= $row['verification'] ?>', '<?= $row['vkey'] ?>' , '<?= $row['upgrade'] ?>' , '<?= $row['status'] ?>')"><i class="fa fa-pencil"></i></a>
                                                <a href="profile_save.php?del_id=<?php echo $row['id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="proadd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="driver_save.php" id="addproduct" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="text" class="form-control" name="driver_id" value="<?= $userinfo['id'] ?>" hidden>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver Name</label>
                            <input type="text" required="" class="form-control" name="name" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Mobile</label>
                            <input type="number" name="phone" class="form-control" required="" Placeholder="Phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver Email</label>
                            <input type="text" required="" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Password</label>
                            <input type="password" name="password" class="form-control" required="" Placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver Image</label>
                            <input type="file" name="image" class="form-control" required="" Placeholder="Image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Address</label>
                            <input type="text" name="address" class="form-control" required="" Placeholder="Address">
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
<!-- this is for the update modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="profile_save.php" id="updatepro" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="id" id="profile_id">

                        <input type="hidden" class="form-control" name="driver_id" id="driver_id" value="<?= $userinfo['id'] ?>">

                        <div class="col-md-6">
                            <div class="form-group"><label>Driver Name</label>
                                <input type="text" class="form-control" name="driver_name" id="driver_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver_Image</label>
                                <img id="image" alt="" height="100" width="100">
                                <input type="file" class="form-control" name="driver_image" id="driver_image" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Number</label>
                                <input type="text" class="form-control" name="vehicle_number" id="vehicle_number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Model</label>
                                <input type="text" class="form-control" name="vehicle_model" id="vehicle_model" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Booking Time</label>
                            <input type="time" class="form-control" name="booking_time" id="booking_time" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver Number</label>
                                <input type="tel" class="form-control" name="driver_number" id="driver_number" required>
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
    // Vechile insert ajax start
    function show(id, name, phone, email, password, image, address, role, verification, vkey, upgrade, status) { // parameters decleration in fucntion
        $('#profile_id').val(id);
        $('#driver_id').val(name);
        $('#driver_name').val(phone);
        $('#driver_name').val(email);
        $('#vehicle_number').val(password);
        $('#driver_image').attr('src', 'backassets/images/drivers/"' + image + '"');
        $('#booking_time').val(address);
        $('#driver_number').val(role);
        $('#vehicle_number').val(verification);
        $('#vehicle_model').val(vkey);
        $('#booking_time').val(upgrade);
        $('#driver_number').val(status);

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
if (isset($_SESSION["uu"])) {
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
unset($_SESSION["uu"]);
?>

<?php
if (isset($_SESSION["suc"])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Product Updated Successfully!',
            button: 'Ok!'
        })
    </script>
<?php
}
unset($_SESSION["suc"]);
?>

<?php
if (isset($_SESSION["d"])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Multiple Records Deleted Successfully!',
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