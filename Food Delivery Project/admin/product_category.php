<?php
$pagename = "Categories";
include_once "header.php";
?>
<div class="container">
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="mb-0 float-left">Product Categories</h4>
        <button type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#add">
            <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create
            
        </button>
                            </div>
                            <div class="card-body">
                            <div id="message"></div>
                            <button class="float-right btn btn-rounded btn-danger mb-3" id="delete">
                            <span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
                                <div class="table-responsive">
                                    <table id="example7" class="display min-w850">
                                    <thead>
                    <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                        <th>Sr no</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="mb-0 float-left">Product Sub Categories</h4>
        <button type="button" class="btn btn-rounded btn-info float-right" data-toggle="modal" data-target="#subadd">
        <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>&nbsp;Create</button>
                            </div>
                            <div class="card-body">
                            <div id="message1"></div>
                            <button class="float-right btn btn-rounded btn-danger mb-3" id="delete1"><span class="btn-icon-left text-danger"><i class="fa fa-trash color-danger"></i></span>&nbsp;Delete</button>
                                <div class="table-responsive">
                                    <table id="example8" class="display min-w850">
                                    <thead>
                    <tr>
                    <th><input type="checkbox" id="checkAll1"></th>
                        <th>Sr no</th>
                        <th>Sub Category Name</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <!-- add Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Categories For Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form  method="post" id="addcategory" novalidate>
           <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label>Category Name</label>
                            <input type="text" class="form-control" name="cat_name" id="cat_name" required>
                                       <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-success btn-sm" id="catsave">Save</button>
            </div>
    
           </form> 
            </div>
    </div>
</div>
<!-- this is for the update modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Categories For Products</h5>
                <button type="button" class="close" id="upd_close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label>Category Name</label>
                            <input type="text" class="form-control" id="upd_cat_name">
                             <input type="hidden" class="form-control" id="upd_cat_id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-success btn-sm" onclick="updateData()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end for the update model -->
<!-- Sub Add Model -->
<div class="modal fade" id="subadd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Sub Categories For Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form id="addsubcategory" method="post" novalidate>
           <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label>Category Name</label>
                           <select name="parent_category" id="parent_category" class="form-control" required>
                               <?php
                               $query = "SELECT * FROM `tbl_categories`";
                               $q = mysqli_query($con,$query);
                               while($row = mysqli_fetch_array($q))
                               {
                                ?>
                            <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>
                            <?php
                               }
                               ?>
                           </select>
                                      <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Sub Category Name</label>
                            <input type="text" class="form-control" name="sub_cat_name" id="sub_cat_name" required>
                                       <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-success btn-sm" id="subsave" >Save</button>
            </div>

           </form>
        </div>
    </div>
</div>
<!-- subthis is for the update modal -->
<div class="modal fade" id="subupdate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Sub Categories For Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="updclose"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label>Category Name</label>
                           <select name="parent_category" id="upd_parent_category" class="form-control">
                               <?php
                               $query = "SELECT * FROM `tbl_categories`";
                               $q = mysqli_query($con,$query);
                               while($row = mysqli_fetch_array($q))
                               {
                                ?>
                            <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>
                            <?php
                               }
                               ?>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Sub Category Name</label>
                            <input type="text" class="form-control" id="upd_sub_cat_name">
                            <input type="hidden" class="form-control" id="hidden_ID">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-success btn-sm" onclick="subupdateData()">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- end for the update model -->

                    </div>
    
<?php
include_once "footer.php";
?>   

<script>

  
    // this is for the insert categories


    $("#addcategory").on("submit",function(e){
        e.preventDefault();
     
        if( $("#cat_name").val() !="" &&  $("#cat_name").val() !=null){
            var formdata = new FormData();
            formdata.append("name", $("#cat_name").val());
            formdata.append("insert","btn");
        $.ajax({
            url: "category_saveinfo.php",
            type: "POST",
            contentType:false,
            processData:false,
            data:formdata,
         
            success: function(data) {
                console.log(data);
                if (data != "" && data != null) {
                    if (data == 1) {
                        loaddata();
                        $("#addcategory").trigger("reset");
                        $("#catsave").html("Save Changes").attr("disabled",false);
                        subfff();
                        $("#add").modal('hide');
                    
                        $("#message").html('<div class="alert alert-success  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Category Create Successfully!</div>')
                        
                    } else if (data == "0") {

                    }
                }
            }
        });
        }
    });
    
    // <!-- this is for the data table -->

    var table = $('#example7').DataTable({
        // lengthChange: false,
        // responsive: true,
        // buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
    });
    //table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    $(document).ready(function() {
        loaddata();
        // setInterval(loaddata, 10000);
    });
   

    // <!-- this is for data table -->
    function loaddata() { 
        $.ajax({
            url: "category_saveinfo.php",
            type: "POST",
            data: {
                load: "btn"
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var num = 1;
                table.clear();
                for (let i = 0; i < data.length; i++) {

                    table.row.add(['<input class="checkbox" type="checkbox" name="id[]" id="' + data[i]["id"] + '" value="' + data[i]["id"] + '">',num, data[i]["categoryname"],'<button type="button" class="btn btn-primary shadow btn-xs sharp mr-1" title="Edit" onclick="edit1(' + data[i]["id"] + ')"><i class="fa fa-pencil"></i></button>&nbsp;&nbsp;|&nbsp;&nbsp;<button type="button"  class="btn btn-danger shadow btn-xs sharp" onclick="delete1(' + data[i]["id"] + ')" title="Delete"><i class="fa fa-trash"></i></button>']).draw();
                    num++;
                }

            }
        });
    }
    //function for the update categories fetch record from partcular category
    function edit1(id){
        $.ajax({
            url:"category_saveinfo.php",
            type:"POST",
            data:{fetch:"btn",id:id},
            dataType:"JSON",
            success: function(data){
                $("#upd_cat_id").val(id);
            $('#upd_cat_name').val(data.cat_name);
             $('#update').modal("show");
            }
        });
    }
    // function for the update record from model
    function updateData(){
        var id = $("#upd_cat_id").val();
        var cat_name = $("#upd_cat_name").val();
       
        $.ajax({
            url:"category_saveinfo.php",
            type:"POST",
            data:{update:"btn",id:id,cat_name:cat_name},
            success:function(data){
                $('#update').trigger("reset");
                 $('#upd_close').click();
                 loaddata();
                 subfff();

                 //this is for the update model
                    $("#message").html('<div class="alert alert-success  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Category Updated Succesfully</div>')
                 // ///////////////////////////
            }
        });
    }
    // delete
    function delete1(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-3'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "category_saveinfo.php",
                    type: "POST",
                    data: {
                        id: id,
                        deletedata: "btn"
                    },
                    success: function(res) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            icon: 'success',
                            confirmButtonText: 'Done',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (res != "" && res != null) {
                        subfff();
                                  
                                    loaddata();
                                    if (res == "1") {
                                        $("#message").html('<div class="alert alert-success  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Categories Delete Succesfully</div>')

                                    } else if (res == "0") {
                                        $("#message").html('<div class="alert alert-danger  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Categories Delete Not Succesfully</div>')

                                    }
                                }




                            }

                        });

                    }
                });


            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }
    $(document).ready(function() {
        $('#checkAll').click(function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
        //this 
        $('#delete').click(function(event) {
            var dataArr = new Array();
            if ($('input:checkbox:checked').length > 0) {
                $('input:checkbox:checked').each(function() {
                    dataArr.push($(this).attr('id'));
                });
                // console.log(dataArr);
                sendResponse(dataArr);
            } else {
                Swal.fire({
        icon: 'warning',
        title: 'No RECORD FOUND',
        text: 'Please Select The Record First'
      });
          
            }
        });

        function sendResponse(dataArr) 
        {
            $.ajax({
                url: "category_saveinfo.php",
                type: "POST",
                data: {
                    'data': dataArr
                },
                success: function(response) {
                    loaddata();
                },
                error: function(errResponse) {
                    //alert(errResponse);
                }
            });
        }
    });
    //===================================================================================
    //===================================================================================
    $(document).ready(function() {
        $('#checkAll1').click(function() {
            if (this.checked) {
                $('.checkbox1').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkbox1').each(function() {
                    this.checked = false;
                });
            }
        });
        //this 
        $('#delete1').click(function(event) {
            var dataArr = new Array();
            if ($('input:checkbox:checked').length > 0) {
                $('input:checkbox:checked').each(function() {
                    dataArr.push($(this).attr('id'));
                });
                // console.log(dataArr);
                sendResponse(dataArr);
            } else {
                Swal.fire({
        icon: 'warning',
        title: 'No RECORD FOUND',
        text: 'Please Select The Record First'
      });
          
            }
        });

        function sendResponse(dataArr) 
        {
            $.ajax({
                url: "subcategory_saveinfo.php",
                type: "POST",
                data: {
                    'data': dataArr
                },
                success: function(response) {
                    subloaddata();
                },
                error: function(errResponse) {
                    //alert(errResponse);
                }
            });
        }
    });
    
// sub ajax start

$("#addsubcategory").on("submit",function(e){
    e.preventDefault();
        var parentCat= $("#parent_category").val();
        var subCat = $("#sub_cat_name").val();
        $.ajax({
            url: "subcategory_saveinfo.php",
            type: "POST",
            data: {
                insert: "btn",
                parentCat: parentCat,
                subCat:subCat
            },
            beforeSend:function(res){
            $("#subsave").html('<i class="fas fa-circle-notch fa-spin" aria-hidden="true"></i>&nbsp;&nbsp; Please Wait.....').attr("disabled", true);
            },
            success: function(data) {
                if (data != "" && data != null) {
                    if (data == 1) {
                        subloaddata();
                        $("#addsubcategory").trigger("reset");
                        $("#subsave").html("Save Changes").attr("disabled",false);
                        $("#subadd").modal('hide');
                       
                        $("#message1").html('<div class="alert alert-success  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Sub category Create Successfully!</div>')
                     
                    } else if (data == "0") {

                    }
                }
            }
        });
    });
    // <!-- this is for the data table -->

    var subtable = $('#example8').DataTable({
        // lengthChange: false,
        // responsive: true,
     
    });
    //subtable.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    $(document).ready(function() {
       subloaddata();
        // setInterval(subloaddata, 30000);
    });

    // <!-- this is for data table -->
    function subloaddata() {
        $.ajax({
            url: "subcategory_saveinfo.php",
            type: "POST",
            data: {
                load: "btn"
            },
            dataType: "JSON",
            success: function(data) {
                var num = 1;
                subtable.clear().draw();

                for (let i = 0; i < data.length; i++) {

                    subtable.row.add(['<input class="checkbox1" type="checkbox" name="id[]" id="' + data[i]["id"] + '" value="' + data[i]["id"] + '">',num, data[i]["subCat"],data[i]["parentCat"],'<button type="button" class="btn btn-primary shadow btn-xs sharp mr-1" title="Edit" onclick="subedit1(' + data[i]["id"] + ')"><i class="fa fa-pencil"></i></button>&nbsp;&nbsp;|&nbsp;&nbsp;<button type="button"  class="btn btn-danger shadow btn-xs sharp" onclick="subdelete1(' + data[i]["id"] + ')" title="Delete"><i class="fa fa-trash"></i></button>']).draw();
                    num++;
                }

            }
        });
    }
    //function for the update categories fetch record from particular category
    function subedit1(id){
        $.ajax({
            url:"subcategory_saveinfo.php",
            type:"POST",
            data:{fetch:"btn",id:id},
            dataType:"JSON",
            success: function(data){
                $("#hidden_ID").val(id);
            $('#upd_sub_cat_name').val(data.sub_cat_name);
            $('#upd_parent_category').val(data.cat_id);
             $('#subupdate').modal("show");
            }
        });
    }
    // function for the update record from model
    function subupdateData(){
        var id = $("#hidden_ID").val();
        var parent = $("#upd_parent_category").val();
        var sub = $("#upd_sub_cat_name").val();
       
        $.ajax({
            url:"subcategory_saveinfo.php",
            type:"POST",
            data:{update:"btn",
            id:id,
            parent:parent,
            sub:sub
        },
            success:function(data){
                $('#update').trigger("reset");
                 $('#updclose').click();
                 subloaddata();
                 //this is for the update model
                    $("#message1").html('<div class="alert alert-success  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Sub category Updated Succesfully</div>')
                 // ///////////////////////////
            }
        });
    }
    // delete
    function subdelete1(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-3'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "subcategory_saveinfo.php",
                    type: "POST",
                    data: {
                        id: id,
                        deletedata: "btn"
                    },
                    success: function(res) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            icon: 'success',
                            confirmButtonText: 'Done',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (res != "" && res != null) {
                                  
                                    subloaddata();
                                    if (res == "1") {
                                        $("#message1").html('<div class="alert alert-success  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Sub categories Delete Succesfully</div>')

                                    } else if (res == "0") {
                                        $("#message1").html('<div class="alert alert-danger  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Sub categories Delete Not Succesfully</div>')

                                    }
                                }




                            }

                        });

                    }
                });


            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }


    function subfff() {
        $.ajax({
            url: "category_saveinfo.php",
            type: "POST",
            data: {
                loadforsubcat: "btn"
            },
            dataType: "JSON",
            success: function(data) {
               $("#upd_parent_category").empty();
               $("#parent_category").empty();

               for (let index = 0; index < data.length; index++) {
                $("#parent_category").append('<option value="'+data[index]["id"]+'">'+data[index]["categoryname"]+'</option>');
                $("#upd_parent_category").append('<option value="'+data[index]["id"]+'">'+data[index]["categoryname"]+'</option>');
                   
               }
            
            }
        });

            }


// sub ajax end
</script>
