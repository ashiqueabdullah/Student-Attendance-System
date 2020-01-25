<?php include_once 'heade.php'?>
    <?php
    $host="localhost";
    $name="std_atten";
    $user="root";
    $pass="";

    $con= new mysqli($host,$user,$pass,$name);
?>
        <div class="container">
            <div class="box">
                <h1>Student Attendance System</h1>
            </div>
            <div class="mid">
                <h2>
                <a href="add.php" class="btn btn-success">Add Student</a>
                <a href="index.php" class="btn btn-info  float-right mt-1">Back</a>
            </h2>
                <?php
                if (isset($_POST['submit'])) {
                    $name=$_POST['name'];
                    $roll=$_POST['roll'];
                    if ($name!='' && $roll!='') {
                        $sql="INSERT INTO `stdinfo`(`name`, `roll`) VALUES ('$name',$roll)";
                        $con->query($sql);
                        //$sql="INSERT INTO `attendance`(`roll`) VALUES ('$roll')";
                        //$con->query($sql);
                        header("location:add.php");
                    }
                }
            ?>
                    <div class="m-5">
                        <form action="" method="post">
                            <label for="">Enter Name</label>
                            <input type="text" class="form-control col-md-5" name="name">
                            <label class="mt-2" for="">Enter Roll</label>
                            <input type="text" class="form-control col-md-5" name="roll">
                            <input type="submit" class="btn btn-info mt-2" name="submit">
                        </form>
                    </div>
            </div>
            <div class="box ">
                <h1>Devoloped by Ashique Abdullah</h1>
            </div>
        </div>

        <?php include_once 'footer.php'?>