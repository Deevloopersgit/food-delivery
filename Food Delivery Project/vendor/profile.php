<?php
include "header.php"
?>
				<!-- Add Order -->
				
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                                <table class="table table-responsive">
                                                    <thead class="thead-light">
                                                      <?php
                                                     $w = $_SESSION["vendor_email"];
                                                     $q = mysqli_query($con,"SELECT * FROM `tbl_vendor` WHERE email='$w'");
                                                      $e = mysqli_fetch_array($q);
                                                      $id = $e['id'];
                                                      $q = mysqli_query($con,"SELECT * FROM `tbl_vendor` WHERE id='$id'");
                                                     while($row=mysqli_fetch_array($q)){
                                                      ?>
                                                    </thead>
                                                    <div class="d-flex justify-content-center">
                                                    <img src="backassets/images/vendors/<?php echo $row['image']?>"   alt="" style="width: 200;height: 200px;">                                                        
                                                    </div>
                                                    <br>
                                                    
                                                    <tbody>
                                                        <tr>
                                                            <th>Name:</th>
                                                            <th><?php echo $row['name']?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Email:</th>
                                                            <th><?php echo $row['email']?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Password:</th>
                                                            <th><?php echo $row['password']?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone:</th>
                                                            <th><?php echo $row['phone']?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Address:</th>
                                                            <th><?php echo $row['address']?></th>
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                                <?php
                                                }
                                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                         
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link active show">Setting</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="profile-settings" class="tab-pane fade active show">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <?php
                                                     $w = $_SESSION["vendor_email"];
                                                     $q = mysqli_query($con,"SELECT * FROM `tbl_vendor` WHERE email='$w'");
                                                      $e = mysqli_fetch_array($q);
                                                      $id = $e['id'];
                                                      $q = mysqli_query($con,"SELECT * FROM `tbl_vendor` WHERE id='$id'");
                                                     while($row=mysqli_fetch_array($q)){
                                                      ?>
                                                        <form action="profileupdatephp.php" method="POST" enctype="multipart/form-data">
                                                            <input type="text" name="id"  value="<?php echo $row['id']?>" hidden>
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Name</label>
                                                                    <input type="test" placeholder="Name" name="name" class="form-control" value="<?php echo $row['name']?>" required autocomplete="off">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Email</label>
                                                                    <input type="Email" placeholder="Email" name="email" class="form-control" value="<?php echo $row['email']?>" required autocomplete="off"> 
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="form-group col-md-6">
                                                                <label>Password</label>
                                                                <input type="password" placeholder="********" name="password" class="form-control" value="<?php echo $row['password']?>"  required autocomplete="off">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Address </label>
                                                                <input type="text" placeholder="123 street , abc floor" name="address" class="form-control" value="<?php echo $row['address']?>"  required autocomplete="off">
                                                            </div>
                                                                </div>
                                                           <div class="row">
                                                           <div class="form-group col-md-6">
                                                                    <label>Phone Number</label>
                                                                    <input type="number" name="phone" placeholder="Phone Number" class="form-control" value="<?php echo $row['phone']?>"  required autocomplete="off">
                                                                </div>
                                                            
                                                                <div class="form-group col-md-6">
                                                                    <label>Image</label>
                                                                    <input type="file" name="image" class="form-control" >
                                                                </div>

                                                           </div>
                                                                
                                       
                                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                                        </form>
                                                        <?php
                                                     }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
												</div>
												<div class="modal-body">
													<form>
														<textarea class="form-control" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Reply</button>
												</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
			include "footer.php";
			?>