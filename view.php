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
            <form action="" class="p-3">
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
            </form>
        </div>
        <div class="box ">
            <h1>Devoloped by Ashique Abdullah</h1>
        </div>
    </div>

<?php include_once 'footer.php'?>