<?php 
session_start();
if(!isset($_SESSION['role']) )
header("location:index.php");

include("includes/DBconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "apply"  ) {
    $id = $_POST['id'] ;
    $user_id = $_SESSION['id'] ;

    $insert_ = "INSERT into  application (UserID,TrainingOrganizationID) values (?,?)";
    $query = mysqli_prepare($conn,$insert_);
     $query->bind_param("ss",$user_id,$id);
    
 $result = $query->execute();

 if($result){
 header("location:request_join.php?msg=تم تسجيل الطلب بنجاح");
 }else{
 header("location:request_join.php?msg=حصل خطأ الرجاء المحاولة مرة أخرى");
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
                        <th>حالة الطلب</th>
                        <th>الإسم</th>
                        <th>المنطقة</th>
                        <th>المدينة</th>
                        <th>المشرف</th>
                        <th>الجوال</th>
                        
                        <th>البريد الإلكتروني</th>
                        <th>خطة التدريب</th>
                      </tr>
                </thead>
                <tbody>
                    <?php 
                $usersq = "SELECT to_.*,a.Status from trainingorganization to_ join application a on a.TrainingOrganizationID =to_.OrganizationID  where a.UserID = ".$_SESSION['id'] ." " ;
                $organization = mysqli_query($conn, $usersq);
        foreach ($organization as $exer ) { ?>
   <tr>
                        <td><?php if($exer['Status']==0) echo "قيد المراجعة";elseif($exer['Status']==1) echo "مقبول ";elseif($exer['Status']==2) echo "مرفوض ";  ?></td>
                        <td><?php echo $exer['OrganizationName'] ?></td>
                        <td><?php echo $exer['addresse'] ?></td>
                        <td><?php echo $exer['city'] ?></td>
                        <td><?php echo $exer['responsable'] ?></td>
                        <td><?php echo $exer['Phone_number'] ?></td>
                        
                        <td><?php echo $exer['Email'] ?></td>
                        <td><a href="uploads/<?php echo $exer['file'] ?>" download="uploads/<?php echo $exer['file'] ?>">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
  <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
</svg></a> </td>
<tr>
                    <td colspan="9"><ul>
                      <li>البرنامج-الوصف-تاريخ البدأ-تاريخ الإنتهاء-عدد المقاعد
                       
<?php 
$usersq = "SELECT * from trainingprogram where OrganizationID =  ".$exer['OrganizationID'];
$progs = mysqli_query($conn, $usersq);
foreach ($progs as $prog ) { ?>
<li><?php echo $prog['ProgramName'].'-'.$prog['Description'].'-'.$prog['StartDate'].'-'.$prog['EndDate'].'-'.$prog['Capacity'] ; ?></li>
<?php }?> </ul></td>
                    </tr>   
                    </tr>

<?php    } ?>
                </tbody>
            </table>
        </div>


            
      </div>

  
    </main>
    <?php require_once('includes/footer.php')?>