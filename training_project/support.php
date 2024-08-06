<?php 
session_start();
if(!isset($_SESSION['role']) )
header("location:index.php");

include("includes/DBconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "store"  ) {
    $uploadDir = 'uploads/';
    

    $Subject = $_POST['Subject'] ;
    $Description = $_POST['Description'] ;
  

 
   $insert_ = "INSERT into technicalsupport(	UserID,Subject,Description) values (?,?,?)";
   $query = mysqli_prepare($conn,$insert_);
    $query->bind_param("sss",$_SESSION['id'],$Subject,$Description);
   
$result = $query->execute();
$insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
$query = mysqli_prepare($conn,$insert_);
$Feedback = "تمت  رفع تدكرة دعم فني   ";
 $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
$result = $query->execute();
if($result){
header("location:support.php?msg=تمت إضافة التدكرة بنجاح");
}else{
header("location:support.php?msg=حصل خطأ ما المرجو المحاولة لاحقا");
}
}if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "Set_mark"  ) {
    $id = $_POST['id'] ;

    $insert_ = "UPDATE technicalsupport set Status = 1 ,AdminID  = ? ,ResolvedDate = CURRENT_TIMESTAMP where  TicketID = ?";
    $query = mysqli_prepare($conn,$insert_);
     $query->bind_param("ss",$_SESSION['id'],  $id);
    
 $result = $query->execute();
 $insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
 $query = mysqli_prepare($conn,$insert_);
 $Feedback = "تم الرد على تذكرة    ";
  $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
 $result = $query->execute();
 if($result){
 header("location:support.php?msg=تم الرد على تذكرة ");
 }else{
 header("location:support.php?msg=حصل خطأ ما المرجو المحاولة لاحقا");
 }


}
?>

<?php require_once('includes/header.php')?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div  >
      <br><?php if(isset($_GET['msg'])){
    echo "<h3>".$_GET['msg']."</h3>";
}?><br>
      <?php if($_SESSION['role']=='Student' ){?>
        <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
     تسجيل تذكرة دعم فني
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <form action="support.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="do" value="store">
 
 
 
 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> الموضوع </label>
  <input type="text" class="form-control" name="Subject" required>
</div>
 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> نص المشكلة </label>
  <textarea   class="form-control" name="Description" required></textarea>
</div>
<button type="submit" class="btn btn-primary">حفظ</button>
</form>


    </div>
  </div>
        </div>   
        <?php   }?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>الأدمن</th>
                        <th>إسم الطالب/ة</th>
                        <th>رقم الطالب/ة</th>
                        <th>الموضوع</th>
                        <th>نص المشكلة</th>
                        <?php 
                        if($_SESSION['role']=='Advisor' || $_SESSION['role']=='Admin' ){ ?>
                        <th>إجراءات</th>
                        <?php } ?>
        
                  
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($_SESSION['role']=='Student')
                $usersq = "SELECT r.*,u.FullName,u.Student_Number,u2.FullName as advisor_name  from technicalsupport r join user u  on  u.UserID =  r.UserID left join user u2  on  u2.UserID =  r.AdminID   where u.UserID = ".$_SESSION['id']." ";
                else 
                $usersq = "SELECT r.*,u.FullName,u.Student_Number,u2.FullName as advisor_name  from technicalsupport r join user u  on  u.UserID =  r.UserID left join user u2  on  u2.UserID =  r.AdminID   ";

                $organization = mysqli_query($conn, $usersq);
        foreach ($organization as $exer ) { ?>
   <tr>
                        <td><?php echo $exer['advisor_name'] ?></td>
                        <td><?php echo $exer['FullName'] ?></td>
                        <td><?php echo $exer['Student_Number'] ?></td>
                        <td><?php echo $exer['Subject'] ?></td>
                        <td><?php echo $exer['Description'] ?></td>
            
      
                        <?php 
                        if($_SESSION['role']=='Advisor' || $_SESSION['role']=='Admin' ){ ?>
                                            <td><form action="support.php" method="post">
                            <input type="hidden" name="do" value="Set_mark">
                            <input type="hidden" name="id" value="<?php echo $exer['TicketID'] ?>">
                           
                        
                            <button type="submit" class="btn btn-primary">تحديد تم حل المشكلة</button>
                          
                        </form></td>
                        <?php } ?>
                    </tr>

<?php    } ?>
                </tbody>
            </table>
        </div>


         
      </div>

  
    </main>
    <?php require_once('includes/footer.php')?>