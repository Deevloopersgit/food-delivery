<?php
$pagename = "Driver Profile";
include_once "header.php";
$LoginInDriver = $userinfo['id'];
?>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 float-left">Driver Profile</h4>
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
                                    <th>Driver ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Vehicle No</th>
                                    <th>Vehicle Model</th>
                                    <th>Booking Time</th>
                                    <th>Mobile</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $count = "1";
                                $query = "SELECT * FROM `driver_profile` WHERE driver_id = '$LoginInDriver'";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>" /></td>
                                        <td><?= $count++ ?></td>
                                        <td><?php echo $row['driver_id'] ?></td>
                                        <td><?php echo $row['driver_name'] ?></td>
                                        <td><a class="fancybox" data-fancybox="gallery" href="backassets/images/profile/<?php echo $row['driver_image'] ?>"><img src="backassets/images/profile/<?php echo $row['driver_image'] ?>" class="img-fluid rounded-circle " alt="" style="width: 40px; height: 40px;"></a></td>
                                        <td><?php echo $row['vehicle_no'] ?></td>
                                        <td><?php echo $row['vehicle_model'] ?></td>
                                        <td><?php echo $row['booking_time'] ?></td>
                                        <td><?php echo $row['driver_number'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?= $row['id']; ?>', '<?= $row['driver_id'] ?>', '<?= $row['driver_name'] ?>', '<?= $row['driver_image'] ?>', '<?= $row['vehicle_no'] ?>', '<?= $row['vehicle_model'] ?>', '<?= $row['booking_time'] ?>', '<?= $row['driver_number'] ?>')"><i class="fa fa-pencil"></i></a>
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
                <h5 class="modal-title">Insert Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="profile_save.php" id="addproduct" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="text" class="form-control" name="driver_id" value="<?= $userinfo['id'] ?>" hidden>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver Name</label>
                                <input type="text" class="form-control" name="driver_name" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver_Image</label>
                                <input type="file" class="form-control" name="driver_image" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Number</label>
                                <input type="text" class="form-control" name="vehicle_number" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Model</label>
                                <input type="text" class="form-control" name="vehicle_model" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Booking Time</label>
                                <input type="time" class="form-control" name="booking_time" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver Number</label>
                                <input type="tel" class="form-control" name="driver_number" pattern="[0-9]{4}-?[0-9]{7}" required>
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
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver_Image</label>
                                <img style="border-radius: 50%;" id="image" alt="" height="100" width="100">
                                <input type="file" class="form-control" name="driver_image" id="driver_image">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Number</label>
                                <input type="text" class="form-control" name="vehicle_number" id="vehicle_number" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Model</label>
                                <input type="text" class="form-control" name="vehicle_model" id="vehicle_model" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Booking Time</label>
                                <input type="time" class="form-control" name="booking_time" id="booking_time" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Driver Number</label>
                                <input type="tel" class="form-control" name="driver_number" id="driver_number" pattern="[0-9]{4}-?[0-9]{7}" required>
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
    // Vechile insert ajax start

    function show(id, driver_id, driver_name, driver_image, vehicle_no, vehicle_model, booking_time, driver_number) {
        $('#profile_id').val(id);
        $('#driver_id').val(driver_id);
        $('#driver_name').val(driver_name);
        $('#image').attr('src', 'backassets/images/profile/' + driver_image + ' ');
        $('#vehicle_number').val(vehicle_no);
        $('#vehicle_model').val(vehicle_model);
        $('#booking_time').val(booking_time);
        $('#driver_number').val(driver_number);

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