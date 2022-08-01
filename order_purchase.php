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
        
        <div id="content-header">
            <div id="breadcrumb"><a href="#" class="tip-bottom"><i class="icon-home"></i>
                    Add New Purchase</a></div>
        </div>
        
        <div class="container-fluid">
            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add New Purchase</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form name="form1" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Select Company:</label>

                                    <div class="controls">
                                        <select class="span11" name="company_name" id="company_name"
                                                onchange="select_company(this.value)">
                                            <option>Select</option>
                                            <?php
                                            $res = mysqli_query($link, "select * from company_name");
                                            while ($row = mysqli_fetch_array($res)) {
                                                echo "<option>";
                                                echo $row["name"];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Select Product Name:</label>

                                    <div class="controls" id="product_name_div">
                                        <select class="span11" name = product_name>
                                        <option>Select</option>
                                            <?php
                                            $res = mysqli_query($link,"select * from products");
                                            while ($row = mysqli_fetch_array($res)) {
                                                echo "<option>";
                                                echo $row["product_name"];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Select Unit:</label>
                                    <div class="controls">
                                        <input type="text" name="unit" value="0" class="span11">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Enter Packing Size</label>
                                    <div class="controls">
                                        <input type="text" name="packing_size" value="0" class="span11">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Enter Qty</label>

                                    <div class="controls">
                                        <input type="text" name="qty" value="0" class="span11">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Enter Price</label>

                                    <div class="controls">
                                        <input type="text" name="price" value="0" class="span11">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Select Vendor Name</label>

                                    <div class="controls">
                                        <select class="span11" name="party_name">
                                            <?php
                                            $res=mysqli_query($link,"select * from vendor_list");
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                echo "<option>";
                                                echo $row["firstname"];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Select Purchase Type</label>

                                    <div class="controls">
                                        <select class="span11" name="purchase_type">
                                            <option>Cash</option>
                                            <option>Debit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Enter Expiry Date</label>

                                    <div class="controls">
                                        <input type="date" class="span11" name="dt" id="dt" autocomplete="off" required placeholder="click here to open calendar" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Enter Selling Price</label>

                                    <div class="controls">
                                        <input type="text" name="sell_price" value="0" class="span11">
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button type="submit" name="submit12" class="btn btn-success">Purchase Now</button>
                                </div>

                                <div class="alert alert-success" id="success" style="display:none">
                                    Purchase Inserted Successfully!
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>


    </div>


    

<?php
if (isset($_POST["submit12"])) {

    $today_date=date('Y-m-d');
    $insert_qry = "insert into `order` values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]','$_POST[qty]','$_POST[price]','$_POST[party_name]','$_POST[purchase_type]','$_POST[dt]','$today_date','$_SESSION[user]')";
    // die($insert_qry);
    mysqli_query($link,$insert_qry) or die(mysqli_error($link));

    $count=0;
    $res=mysqli_query($link,"select * from `stock` where company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit='$_POST[unit]'");
    $count=mysqli_num_rows($res);

    if($count==0)
    {
        mysqli_query($link,"insert into `stock` values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]','$_POST[qty]',''$_POST[sell_price]')") or die(mysqli_error($link));
    }
    else{
      mysqli_query($link,"update `stock` set quantity=quantity+$_POST[qty] where company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit='$_POST[unit]'") or die(mysqli_error($link));
    }

    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="block";
    </script>
    <?php


}
else{
    echo 'somefrtdf';
}
?>

