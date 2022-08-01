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

            <div class="card" style="background-color: #2E363F;width: 55rem; border-style:solid; border-width: 1px; border-radius:10px; float:bottom; margin-top : 10px">
                <div class="card-body">
                    <h3 class="card-title text-center" style="color:white">No Of Products</h3>
                    <h1 class="card-text text-center" style="color:white">
                    <?php
                        $count=0;
                        $res=mysqli_query($link,"select * from products");
                        $count=mysqli_num_rows($res);
                        echo $count;
                        ?>
                    </h1>
                    <br><br>
                </div>


            </div>

            <div class="card" style="background-color: #2E363F;width: 55rem; border-style:solid; border-width: 1px; border-radius:10px; float:bottom; margin-left: 5px;margin-top : 10px">
                <div class="card-body">
                    <h3 class="card-title text-center" style="color:white">Total Orders</h3>
                    <h1 class="card-text text-center" style="color:white">
                    <?php
                        $count=0;
                        $res=mysqli_query($link,"select * from `order`");
                        $count=mysqli_num_rows($res);
                        echo $count;
                        ?>
                    </h1>
                    <br><br>
                </div>
            </div>

            <div class="card" style="background-color: #2E363F;width: 55rem; border-style:solid; border-width: 1px; border-radius:10px; float:left; margin-left: 5px;margin-top : 10px">
                <div class="card-body">
                    <h3 class="card-title text-center" style="color:white">Total Company</h3>
                    <h1 class="card-text text-center" style="color:white">
                    <?php
                        $count=0;
                        $res=mysqli_query($link,"select * from company_name");
                        $count=mysqli_num_rows($res);
                        echo $count;
                        ?>
                    </h1>
                    <br><br>
                </div>
            </div>

        </div>

    </div>
</div>
