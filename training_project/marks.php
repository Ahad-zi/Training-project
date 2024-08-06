<?php 
session_start();
if(!isset($_SESSION['role']) )
header("location:index.php");

include("includes/DBconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "store"  ) {
    $uploadDir = 'uploads/';
    

    $TrainingProgramID = $_POST['TrainingProgramID'] ;
  
 


    $file =null;
     
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $originalName = basename($_FILES['file']['name']);
        $uniqueName = date('YmdHis') . '_' . uniqid() . '_' . $originalName;
        $uploadFile = $uploadDir . $uniqueName;

        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);
        $file=$uniqueName;
    }
 
   $insert_ = "INSERT into report(	UserID,TrainingProgramID,File) values (?,?,?)";
   $query = mysqli_prepare($conn,$insert_);
    $query->bind_param("sss",$_SESSION['id'],$TrainingProgramID,$file);
   
$result = $query->execute();
$insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
$query = mysqli_prepare($conn,$insert_);
$Feedback = "تم رفع تقرير جديد";
 $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
$result = $query->execute();
if($result){
header("location:reports.php?msg=تم إضافة التقرير بنجاح");
}else{
header("location:reports.php?msg=حصل خطأ الرجاء المحاولة مجددا ");
}
}if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "Set_mark"  ) {
    $id = $_POST['id'] ;
    $mark = $_POST['mark'] ;

    $insert_ = "UPDATE report set Status = 1 ,AdvisorID = ? ,mark = ? ,date_mark_set = CURRENT_TIMESTAMP where  ReportID  = ?";
    $query = mysqli_prepare($conn,$insert_);
     $query->bind_param("sss",$_SESSION['id'],$mark,  $id);
    
 $result = $query->execute();
 $insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
$query = mysqli_prepare($conn,$insert_);
$Feedback = "تمت تسجيل درجة ";
 $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
$result = $query->execute();
 if($result){
 header("location:reports.php?msg=تم  تسجيل الدرجة بنجاح");
 }else{
 header("location:reports.php?msg=حصل خطأ ما الرجاء المحاولة مجددا");
 }


}
?>

<?php require_once('includes/header.php')?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div  >
      <br><?php if(isset($_GET['msg'])){
    echo "<h3>".$_GET['msg']."</h3>";
}?><br>
     
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>المرشد/ة</th>
                        <th>إسم الطالب/ة</th>
                        <th>رقم الطالب/ة</th>
                        <th>الملف</th>
                         
        
                        <th>الدرجة</th>
                 
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($_SESSION['role']=='Student')
                $usersq = "SELECT r.*,u.FullName,u.Student_Number,u2.FullName as advisor_name  from report r join user u  on  u.UserID =  r.UserID left join user u2  on  u2.UserID =  r.AdvisorID   where u.UserID = ".$_SESSION['id']." ";
                else 
                $usersq = "SELECT r.*,u.FullName,u.Student_Number,u2.FullName as advisor_name  from report r join user u  on  u.UserID =  r.UserID left join user u2  on  u2.UserID =  r.AdvisorID   ";

                $organization = mysqli_query($conn, $usersq);
        foreach ($organization as $exer ) { ?>
   <tr>
                        <td><?php echo $exer['advisor_name'] ?></td>
                        <td><?php echo $exer['FullName'] ?></td>
                        <td><?php echo $exer['Student_Number'] ?></td>
                        <td><a href="uploads/<?php echo $exer['File'] ?>" download="uploads/<?php echo $exer['File'] ?>">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
  <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
</svg></a></td>
      

                   
                                            <td><?php echo $exer['mark'] ?></td>
                    
                    </tr>

<?php    } ?>
                </tbody>
            </table>
        </div>


         
      </div>

  
    </main>
    <?php require_once('includes/footer.php')?>