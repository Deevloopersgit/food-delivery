<?php
$pagename = "Vehicle Registration";
include_once "header.php";
$LoginInDriver = $userinfo['id'];
?>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 float-left">Vehicles</h4>
                <button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#proadd">
                    <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
            </div>
            <div class="card-body">
                <div id="message2"></div>
                <form action="data_save.php" method="post">
                    <button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850 table-responsive">
                            <thead>
                                <tr>
                                    <th><input id="chk_all" name="chk_all" type="checkbox"></th>
                                    <th>Sr No</th>
                                    <th>Vehicle No</th>
                                    <th>License No</th>
                                    <th>Model</th>
                                    <th>Driver ID</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $count = "1";
                                $query = "SELECT * FROM `tbl_vehicle` WHERE user_id = '$LoginInDriver'";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['Id']; ?>" /></td>
                                        <td><?= $count++ ?></td>
                                        <td><?php echo $row['vehicle_no'] ?></td>
                                        <td><?php echo $row['license_no'] ?></td>
                                        <td><?php echo $row['vehicle_model'] ?></td>
                                        <td><?php echo $row['user_id'] ?></td>
                                        <td><a class="fancybox" data-fancybox="gallery" href="backassets/images/vehicle/<?php echo $row['vehicle_image'] ?>"><img src="backassets/images/vehicle/<?php echo $row['vehicle_image'] ?>" class="img-fluid rounded-circle " alt="" style="width: 40px; height: 40px;"></a></td>
                                        <td><?php echo $row['vehicle_type'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="show('<?= $row['Id']; ?>', '<?= $row['vehicle_no'] ?>', '<?= $row['license_no'] ?>', '<?= $row['vehicle_model'] ?>', '<?= $row['user_id'] ?>', '<?= $row['vehicle_image'] ?>', '<?= $row['vehicle_type'] ?>')"><i class="fa fa-pencil"></i></a>
                                                <a href="data_save.php?del_id=<?php echo $row['Id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
            <form action="data_save.php" id="addproduct" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="text" class="form-control" name="usrid" value="<?= $userinfo['id'] ?>" hidden>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Type</label>
                                <select class="form-control" name="vhtype">
                                    <option value="Motorcycle">Motorcycle</option>
                                    <option value="Tricycle">Tricycle</option>
                                    <option value="Car">Car</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Number</label>
                                <input type="text" class="form-control" name="vhnum" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>License Number</label>
                                <input type="text" class="form-control" name="vhlic" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Model</label>
                                <input type="text" class="form-control" name="vhmod" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Image</label>
                                <input type="file" class="form-control" name="vhimg" required>
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
            <form action="data_save.php" id="updatepro" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">

                        <input type="hidden" class="form-control" name="id" id="Id">

                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= $userinfo['id'] ?>">

                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Type</label>
                                <select class="form-control" name="up_vhtype" id="up_vhtype">
                                    <option value="Motorcycle">Motorcycle</option>
                                    <option value="Tricycle">Tricycle</option>
                                    <option value="Car">Car</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Number</label>
                                <input type="text" class="form-control" name="up_vhnum" id="up_vhnum" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>License Number</label>
                                <input type="text" class="form-control" name="up_vhlic" id="up_vhlic" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Model</label>
                                <input type="text" class="form-control" name="up_vhmod" id="up_vhmod" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Vehicle Image</label>
                                <img style="border-radius: 50%;" id="image" alt="" height="100" width="100">
                                <input type="file" class="form-control" name="up_vhimg" id="up_vhimg">
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
    function show(Id, vehicle_no, license_no, vehicle_model, user_id, vehicle_image, vehicle_type) {
        $('#Id').val(Id);
        $('#up_vhnum').val(vehicle_no);
        $('#up_vhlic').val(license_no);
        $('#up_vhmod').val(vehicle_model);
        $('#user_id').val(user_id);
        $('#image').attr('src', 'backassets/images/vehicle/' + vehicle_image + ' ');
        $('#up_vhtype').val(vehicle_type);

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
            title: 'Product updated successfully!',
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