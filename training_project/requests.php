<?php 
session_start();
if(!isset($_SESSION['role']) )
header("location:index.php");

include("includes/DBconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "change_status"  ) {
    $id = $_POST['id'] ;
    $status = $_POST['status'] ;

    $insert_ = "UPDATE  application set Status = ? where ApplicationID = ? ";
    $query = mysqli_prepare($conn,$insert_);
     $query->bind_param("ss",$status ,$id);
    
 $result = $query->execute();
 $insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
 $query = mysqli_prepare($conn,$insert_);
 $Feedback = "  تم تعديل طلب إنضمام لجهة   ";
  $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
 $result = $query->execute();
 if($result){
 header("location:requests.php?msg=تم تغيير حالة الطلب بنجاح");
 }else{
 header("location:requests.php?msg=حصل خطأ الرجاء المحاولة مجددا");
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
                        <th>إسم الجهة</th>
                        <th>إسم الطالب</th>
                        
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                $usersq = "SELECT a.*,u.FullName , to_.OrganizationName from application a join trainingorganization to_ on to_.OrganizationID = a.TrainingOrganizationID join user u on u.UserID = a.UserID order by status asc " ;
                $organization = mysqli_query($conn, $usersq);
        foreach ($organization as $exer ) { ?>
   <tr>
                        <td><?php echo $exer['OrganizationName'] ?></td>
                        <td><?php echo $exer['FullName'] ?></td>
   
                  
                         <td><form action="requests.php" method="post">
                            <input type="hidden" name="do" value="change_status">
                            <input type="hidden" name="id" value="<?php echo $exer['ApplicationID'] ?>">
                            <select name="status" id="status" class="form-control">
                                <option value="0">قيد المراجعة</option>
                                <option value="1" <?php if($exer['Status']==1) echo 'selected'; ?> >مقبول</option>
                                <option value="2" <?php if($exer['Status']==2) echo 'selected'; ?>>مرفوض</option>
                            </select>
                            <button type="submit" class="btn btn-success">تغيير الحالة</button>
                        </form></td>
                    </tr>

<?php    } ?>
                </tbody>
            </table>
        </div>


            
      </div>

  
    </main>
    <?php require_once('includes/footer.php')?>