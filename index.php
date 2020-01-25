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
                <a href="view.php" class="btn btn-info  float-right mt-1">View Student List</a>
            </h2>
            <h4>Date: <strong><?php echo $cur_date= date('Y-m-d')?></strong></h4>
            <form action="" class="p-3" method="post">
                <?php 
                    if (isset($_POST['submit'])) {
                        $aten=$_POST['at'];
                        foreach ($aten as $key => $value) {
                            if ($value==1) {
                                $sql="INSERT INTO `attendance`(`roll`, `dates`, `atend`) VALUES ($key,now(),'Present')";
                                $res=$con->query($sql);  
                            }else if ($value==0) {
                                $sql="INSERT INTO `attendance`(`roll`, `dates`, `atend`) VALUES ($key,$dt,'Absent')";
                                $res=$con->query($sql); 
                            }
                        }
                        header('location:index.php');
                    }
                ?>
                <table class="table table-striped">
                    
                    <tr>
                        <th>Serial Number</th>
                        <th>Student Name</th>
                        <th>Student Roll</th>
                        <th>Attendance</th>
                    </tr>
                
                <?php 
                        $sql="SELECT * FROM `stdinfo`";
                        $res=$con->query($sql);
                        $i=0;
                        while($myres=$res->fetch_assoc()){
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $myres['name']?></td>
                        <td><?php echo $myres['roll']?></td>
                        <td>
                            <input type="radio" name="at[<?php echo $myres['roll']?>]" value="0">A
                            <input type="radio" name="at[<?php echo $myres['roll']?>]" value="1">P
                        </td>
                    </tr>
                    <?php }?>
                </table>
                <input type="submit" class="btn btn-info" name="submit">
            </form>
        </div>
        <div class="box ">
            <h1>Devoloped by Ashique Abdullah</h1>
        </div>
    </div>

<?php include_once 'footer.php'?>