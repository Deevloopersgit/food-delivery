<?php
$pagename = "Add Operations";
include "header.php";
$Vendor_ID = $_SESSION["vendor_id"];
?>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 float-left">Product</h4>
                <button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#proadd">
                    <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
            </div>
            <div class="card-body">
                <div id="message2"></div>
                <form action="product_save.php" method="post">
                    <button class="float-right btn btn-rounded btn-danger mb-3" id="delete2"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850 table-responsive">
                            <thead>
                                <tr>
                                    <th><input id="chk_all" name="chk_all" type="checkbox"></th>
                                    <th>Sr No</th>
                                    <th>Vendor ID</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $count = "1";
                                $query = "SELECT * FROM `tbl_opreations` WHERE vendor_id ='$Vendor_ID' ";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>" /></td>
                                        <td><?= $count++ ?></td>
                                        <td><?php echo $row['vendor_id'] ?></td>
                                        <td><?php echo $row['day'] ?></td>
                                        <td><?php echo $row['time'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="showmodel('<?= $row['id']; ?>', '<?= $row['day'] ?>', '<?= $row['time'] ?>')"><i class="fa fa-pencil"></i></a>
                                                <a href="operations_save.php?del_id=<?php echo $row['id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title">Insert Operations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="operations_save.php" id="addproduct" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label>Day</label>

                                <select class="basic-multiple form-control" name="days[]" multiple="multiple" required>
                                    <option>--Select Days--</option>
                                    <?php
                                    $query = "SELECT * FROM alldays";
                                    $run = mysqli_query($con, $query);
                                    $rows = mysqli_num_rows($run);
                                    if ($rows > 0) {
                                        while ($row = mysqli_fetch_array($run)) {
                                    ?>
                                            <option value="<?php echo $row['days_name'] ?>"><?php echo $row['days_name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo '<script>alert("No Record Found");</script>';
                                    }
                                    ?>

                                </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Time</label>
                                <input type="time" class="form-control" name="time" id="time" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success btn-sm" name="submit_multiple_records">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- product add modal end -->
<!-- this is for the update modal -->
<div class="modal fade" id="updatedata" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Operations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="upd_close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="operations_save.php" id="updatepro" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="id" id="id">

                        <div class="col-md-6">
                            <div class="form-group"><label>Day</label>
                            <select class="basic-multiple form-control" name="up_day[]" id="up_day" multiple="multiple" required>
                                    <?php
                                    $query = "SELECT * FROM alldays";
                                    $run = mysqli_query($con, $query);
                                    $rows = mysqli_num_rows($run);
                                    if ($rows > 0) {
                                        while ($row = mysqli_fetch_array($run)) {
                                    ?>
                                            <option value="<?php echo $row['days_name'] ?>"><?php echo $row['days_name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo '<script>alert("No Record Found");</script>';
                                    }
                                    ?>

                                </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Time</label>
                                <input type="time" class="form-control" name="up_time" id="up_time" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success btn-sm" name="updateoperations">Update</button>
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
    // Vendor Operations
    $(document).ready(function() {
        $('.basic-multiple').select2();
    });

    // Vendor Operation insert ajax start
    function showmodel(id, day, time) {
        $('#id').val(id);
        $('#up_day').val(day);
        $('#up_time').val(time);

        $('#updatedata').modal('show');
    }

    // product start
    $("#parent_category1").on("change", function() {
        var subcat = $(this).val();
        if (subcat) {
            $.ajax({
                url: "product_save.php",
                type: "POST",
                cache: false,
                data: {
                    subcat: subcat
                },
                success: function(data) {

                    $("#sub_cat_name1").html(data);
                }
            });
        } else {
            $('#sub_cat_name1').html('<option value="">No Record found</option>');

        }
    });

    $("#name").on("change", function() {
        var subcategory = $(this).val();
        if (subcategory) {
            $.ajax({
                url: "product_save.php",
                type: "POST",
                cache: false,
                data: {
                    subcategory: subcategory
                },
                success: function(data) {

                    $("#upd_sub_cat_name").html(data);
                }
            });
        } else {
            $('#upd_sub_cat_name').html('<option value="">No Record found</option>');

        }
    });


    function kkk() {

        var selectedValue = $('#name').val();

        $.ajax({
            url: 'product_save.php',
            type: 'POST',
            data: {
                opti: selectedValue
            },
            success: function(data) {

                $('#upd_sub_cat_name').val(data);
            }
        });
    }
    // product end
    // product insert ajax start
    function show(id, category, sub_category, product_name, product_price, product_image, qauntity, descp) {
        $('#id').val(id);
        $('#name').val(category);
        $('#upd_sub_cat_name').val(sub_category);
        $('#upd_pro_name').val(product_name);
        $('#upd_pro_price').val(product_price);
        // $('#upd_image').val(image);
        $('#upd_quantity').val(qauntity);
        $('#upd_desc').val(descp);

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
if (isset($_SESSION["multiple-data"])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Multiple Records Added Successfully!',
            button: 'Ok!'
        })
    </script>
<?php
}
unset($_SESSION["multiple-data"]);
?>

<?php
if (isset($_SESSION["uu"])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Operation Perfored Successfully!',
            button: 'Ok!'
        })
    </script>
<?php
}
unset($_SESSION["uu"]);
?>

<?php
if (isset($_SESSION['Updated_Operations'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Operations Updated Successfully!',
            button: 'Ok!'
        })
    </script>
<?php
}
unset($_SESSION['Updated_Operations']);
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

<head>
    <!-- Select2 Links-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>