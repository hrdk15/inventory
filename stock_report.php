
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

                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr No</th>
                                <th> Company</th>
                                <th>Product </th>
                                <th> Unit</th>
                                <th>Quantity</th>
                                <th>Selling Price</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count=0;
                            $res = mysqli_query($link, "select * from stock");
                            while ($row = mysqli_fetch_array($res)) {
                                $count=$count+1;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row["company_name"]; ?></td>
                                    <td><?php echo $row["product_name"]; ?></td>
                                    <td><?php echo $row["unit"]; ?></td>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["selling_price"]; ?></td>
                                    

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




