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
                            <h5>Add New Vendor</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form name="form1" action="" method="post" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">First Name :</label>

                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="First name" name="firstname" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Last Name :</label>

                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Last name" name="lastname" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Company Name :</label>

                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Company name" name="company_name" required/>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Contact</label>

                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Enter Contact No"
                                               name="contact" required/>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">address</label>
                                    <div class="controls">
                                        <textarea class="span11" name="address" required></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">City</label>

                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Enter City"
                                               name="city" required/>
                                    </div>
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res = mysqli_query($link, "select * from vendor_list");
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $row["firstname"]; ?></td>
                                    <td><?php echo $row["lastname"]; ?></td>
                                    <td><?php echo $row["company_name"]; ?></td>
                                    <td><?php echo $row["contact"]; ?></td>
                                    <td><?php echo $row["address"]; ?></td>
                                    <td><?php echo $row["city"]; ?></td>
                                    
                                    <td><a href="del_vendor.php?id=<?php echo $row["id"]; ?>" style="color:red">Delete</a></td>
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

        mysqli_query($link, "insert into vendor_list values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[company_name]','$_POST[contact]','$_POST[address]','$_POST[city]')") or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
            window.location = "vendor_list.php"
        </script>
        <?php



}

?>






