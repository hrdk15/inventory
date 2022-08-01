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
                            <h5>Add New Company</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form name="form1" action="" method="post" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Company Name :</label>

                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Company name" name="companyname" required/>
                                    </div>
                                </div>

                                <div class="alert alert-danger" id="error" style="display:none">
                                    This Company Already Exist! Please Try Another.
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
                                <th>Company name</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res = mysqli_query($link, "select * from company_name");
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    
                                    <td>
                                        <center>
                                            <a href="del_company.php?id=<?php echo $row["id"]; ?>" style="color:red">Delete</a>
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
    $res = mysqli_query($link, "select * from company_name where name='$_POST[companyname]'");
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        ?>
        <div class="alert alert-danger">
                Company with this name already exists...
        </div>
        <?php
    } else {
        mysqli_query($link, "insert into company_name values('$_POST[companyname]',NULL)") or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
                window.location = "company_list.php";
        </script>
        <?php
    }
}
?>
