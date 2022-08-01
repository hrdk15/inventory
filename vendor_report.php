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
include "header.php";
include "connection.php";
?>
    <div id="content">
                <div class="container-fluid">
            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
                <div class="span12">

                    <form class="form-inline" action="" name="form1" method="post">
                        <div class="form-group">
                            <label for="email">Select Vendor </label>
                            <select class="form-control" name="vendor_name">
                            <?php
                                $res=mysqli_query($link,"select * from `vendor_list`");
                                while($row=mysqli_fetch_array($res))
                                {
                                    
                                    echo "<option>";
                                    echo $row["firstname"];
                                    echo "</option>";
                                }
                                ?> 
                            </select>

                        </div>
                        <button type="submit" name="submit1" class="btn btn-success">Show Purchase</button>
                    </form>

                    <br>




                    <div class="widget-content nopadding">
                    <?php
                        if(isset($_POST["submit1"]))
                        {
                            ?>

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Company Name</th>
                                <th>Product </th>
                                <th>Unit</th>
                                <th>Packing Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Vendor Name</th>
                                <th>Purchase Type</th>
                                <th>Expiry Date</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count=0;
                            $res = mysqli_query($link, "select * from `order` where vendor_name='$_POST[vendor_name]'");
                            while ($row = mysqli_fetch_array($res)) {
                                $count=$count+1;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row["company_name"]; ?></td>
                                    <td><?php echo $row["product_name"]; ?></td>
                                    <td><?php echo $row["unit"]; ?></td>
                                    <td><?php echo $row["packing_size"]; ?></td>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["price"]; ?></td>
                                    <td><?php echo $row["vendor_name"]; ?></td>
                                    <td><?php echo $row["purchase_type"]; ?></td>
                                    <td><?php echo $row["expiry_date"]; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <?php
                        }

                        ?>


                        </table>
                    </div>

                </div>
            </div>


        </div>


    </div>



