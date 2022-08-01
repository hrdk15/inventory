
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
                <form class="form-inline" action="" name="form1" method="post">
                    <div class="form-group">
                        <label for="email">Select Start Date</label>
                        <input type="Date" name="start_date" id="dt" autocomplete="off" class="form-control" required style="width:200px;border-style:solid; border-width:1px; border-color:#666666" placeholder="click here to open calender"  >
                    </div>
                    <div class="form-group">
                        <label for="email">Select End Date</label>
                        <input type="Date" name="end_date" id="dt2" autocomplete="off" placeholder="click here to open calender"  class="form-control" style="width:200px;border-style:solid; border-width:1px; border-color:#666666" >
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success">Show Purchases</button>
                    <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                </form>

                <br>


                <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">



                <div class="span12">

                    <div class="widget-content nopadding">

                        <?php
                        if(isset($_POST["submit1"]))
                        {
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Purchase By</th>
                                    <th>Company</th>
                                    <th>Product </th>
                                    <th>Unit</th>
                                    <th>Packing Size</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Vendor Name</th>
                                    <th>Purchase Type</th>
                                    <th>Expiry Date</th>
                                    <th>Purchase Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=0;
                                $res = mysqli_query($link, "select * from `order` where (purchase_date>='$_POST[start_date]' && purchase_date<='$_POST[end_date]')");
                                while ($row = mysqli_fetch_array($res)) {
                                    $count=$count+1;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["company_name"]; ?></td>
                                        <td><?php echo $row["product_name"]; ?></td>
                                        <td><?php echo $row["unit"]; ?></td>
                                        <td><?php echo $row["packing_size"]; ?></td>
                                        <td><?php echo $row["quantity"]; ?></td>
                                        <td><?php echo $row["price"]; ?></td>
                                        <td><?php echo $row["vendor_name"]; ?></td>
                                        <td><?php echo $row["purchase_type"]; ?></td>
                                        <td><?php echo $row["expiry_date"]; ?></td>
                                        <td><?php echo $row["purchase_date"]; ?></td></tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                            }
                        ?>


                    </div>

                </div>
            </div>


        </div>


    </div>






