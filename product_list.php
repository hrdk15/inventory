<?php
session_start();
if(!isset($_SESSION["user"]))
{
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
include "connection.php";
include "header.php";
?>
    <div id="content">
                
        <div class="container-fluid">
            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add New Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form name="form1" action="" method="post" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Company Name:</label>

                                    
                                    <div class="controls">
                                       <input type="text" name="company_name" class="span11" placeholder="Enter company Name">
                                    </div>

                                    
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Enter Product Name:</label>

                                    <div class="controls">
                                       <input type="text" name="product_name" class="span11" placeholder="Enter Product Name">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Units:</label>

                                    
                                    <div class="controls">
                                       <input type="text" name="unit_name" class="span11" placeholder="Enter Unit">
                                    </div>

                                    
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Packing Size</label>

                                    <div class="controls">
                                        <input type="text" name="packing_size" class="span11" placeholder="Enter Packing Size">
                                    </div>
                                </div>


                                <div class="alert alert-danger" id="error" style="display:none">
                                    This Products is Already Exist! Please Try Another.
                                </div>


                                <div class="form-actions">
                                    <button type="submit" name="submit1" class="btn btn-success">Save</button>
                                </div>

                                <div class="alert alert-success" id="success" style="display:none">
                                    Record Inserted Successfully!
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>company name</th>
                                <th>product name</th>
                                <th>unit</th>
                                <th>packing size</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res = mysqli_query($link, "select * from products");
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["company_name"]; ?></td>
                                    <td><?php echo $row["product_name"]; ?></td>
                                    <td><?php echo $row["Unit"]; ?></td>
                                    <td><?php echo $row["Packing_size"]; ?></td>
                                    
                                    <td>
                                        <center>
                                            <a href="del_product.php?id=<?php echo $row["id"]; ?>" style="color:red">Delete</a>
                                        </center>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            
                        </table>
                    </div>

                </div>
            </div>


        </div>


    </div>
    <?php
if (isset($_POST["submit1"])) {
    $count = 0;
    $res = mysqli_query($link, "select * from products where company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit='$_POST[unit]' && Packing_size='$_POST[packing_size]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        ?>
        <div class="alert alert-danger">
                Product already exists...
        </div>
        <?php
    } else {
        mysqli_query($link, "insert into products values('$_POST[company_name]','$_POST[product_name]','$_POST[unit_name]','$_POST[packing_size]',NULL)") or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
                window.location = "product_list.php";
        </script>
        <?php
    }
}
?>


