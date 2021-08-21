<?php
include_once "database/connect.php";
if(isset($_POST['subcat']))
{
	
$subcat = $_POST['subcat'];
echo "$subcat";

	$query = "SELECT * FROM `tbl_sub_category` join tbl_categories ON tbl_categories.cat_id=tbl_sub_category.cat_id WHERE tbl_categories.cat_id = '$subcat' ";

	$result = $con->query($query);
// echo "alert($result)";
	if ($result->num_rows > 0) {
        echo '<option>select</option>'; 
 	   while ($row = $result->fetch_assoc()) {
		echo '       

        <option value='.$row['sub_cat_id'].' >'.$row['sub_cat_name'].'</option>';
 	    }
	}else{
	    echo '<option value="">No Record </option>'; 
	}
}
if(isset($_POST['menu']))
{
	
$menu = $_POST['menu'];


	$query = "SELECT * from tbl_products WHERE sub_category = '$menu' ";

	$result = $con->query($query);
// echo "alert($result)";
	if ($result->num_rows > 0) {
 	   while ($row = $result->fetch_assoc()) {
		echo '
        <div class="menu_product_info">
        <div class="menu_title_price">
            <div class="menu_title">
                <h5>'.$row['product_name'].'</h5>
            </div>
            <div class="menu_title_line"></div>
            <div class="menu_price">
			
                <p style="color:#fe3857;font-size: 20px;">&#8358 <span>'.$row['product_price'].'</span></p>
            </div>
			<span>'.$row['descp'].'</span>

        </div>
    </div>';
 	    }
	}else{
	    echo '<option value="">No Record </option>'; 
	}
}
?>