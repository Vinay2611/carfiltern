<?php include("header.php");?>
<section id="middle">
    <header id="page-header">
            <h1>User</h1>
    </header>
    <div id="content" class="dashboard padding-20">
        <div id="panel-1" class="panel panel-default mypanel">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>Users</strong>
                </span>
            </div>
            <div class="panel-body ">
                <table class="table table-striped table-bordered table-hover sample_5" id="sample_5">
                    <thead>
                        <tr>
                            <th  class="">Sr. No.</th>
                            <th  class="">Name</th>
                            <th  class="">Email</th>
                            <th  class="">Health Professional</th>
                            <th  class="">File</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                    $i = 1;
                    $sql=mysqli_query($db,"SELECT * from login order by id asc");
                    while($row = mysqli_fetch_assoc($sql))
                    {	
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i++;?></td>	
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php if($row['health_profesional']==1) {echo 'Yes';}else {echo 'No';};?></td>
                            <td><?php
                            if(!empty($row['health_profesional']))
                            {
                                ?>
                                <a href="../uploads/<?php echo $row['file'];?>" target='_blank'></a>
                                <?php
                            }
                            ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
       </div>
   </div>	
</section>


<?php include("footer.php");?>