<?php 
session_start();
if(!isset($_SESSION['role']) )
header("location:index.php");

include("includes/DBconnection.php");
?>

<?php require_once('includes/header.php')?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div  >
      <?php if($_SESSION['role']=='Student'){?>
        <h1 class="h2">الملف الشخصي</h1>
        <h3>

     
        <?php echo    "<i class='bi bi-telephone-forward-fill' ></i>&nbsp&nbsp&nbspرقم التواصل ؛".  $_SESSION['ContactNumber']."<br><i class='bi bi-person-lines-fill'></i>&nbsp&nbsp&nbspالأإسم الكامل ؛".     $_SESSION['FullName']."<br><i class='bi bi-backpack4'></i> &nbsp&nbsp&nbspرقم الطالب ؛".     $_SESSION['Student_Number']."&nbsp&nbsp&nbsp  <br><i class='bi bi-map'></i>&nbsp&nbsp&nbsp العنوان ؛ ".     $_SESSION['Address']."<br>";?>
        </h3>
        <?php   }elseif($_SESSION['role']=='Admin' || $_SESSION['role']=='Advisor'){?>
            <h1 class="h2">الإشعارات </h1>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>التاريخ</th>
                <th>الإجراء</th>
                <th>الطالب/ة</th>
              </tr>
            </thead>
       
            <?php 
                $usersq = "SELECT * from notification order by date_ desc ";
                $users = mysqli_query($conn, $usersq);
        foreach ($users as $exer ) {
                             ?>
   <tr>
                <td><?php echo $exer['date_']?></td>
                <td><?php echo $exer['description']?></td>
                <td><?php echo $exer['user_name']?></td>
              </tr>

            <?php   }?>   
            
            </table>
            </div>
            
            
            <?php   }?>
      </div>

  
    </main>
    <?php require_once('includes/footer.php')?>