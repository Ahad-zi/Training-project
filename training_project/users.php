<?php 
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='Admin')
header("location:register.php");

include("includes/DBconnection.php");
$do = isset($_GET['do']) ? $_GET['do'] : 'index';
if ($do =="delete"){
    $id=$_GET['id'];
    $add= "DELETE  from  user where UserID = ?";
    $query = mysqli_prepare($conn,$add);
    $query->bind_param("s",$id);
    
$result = $query->execute();
$insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
$query = mysqli_prepare($conn,$insert_);
$Feedback = "  تم حذف مستخدم ";
 $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
$result = $query->execute();
if($result){
header("location:users.php?msg=تم حذف الحساب ");
}else{
header("location:users.php?msg=حصل خطأ الرجاء المحاولة مجددا ");
}
}else if ($do =="update"){
  
    $id=$_GET['id'];
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $Email = isset($_POST['Email']) ? $_POST['Email'] : '';

     $password = isset($_POST['pwd']) ? $_POST['pwd'] : '';
 
     
 
 
$role=$_POST['role'];
 
  
      $add= "UPDATE user set FullName=?,  Password=? ,RoleUser = ?  ,Email = ?  where UserID = ?";
 
      $query = mysqli_prepare($conn,$add);
      $query->bind_param("sssss",$name,$password,$role,$Email, $id);
      $result = $query->execute();
 
      $insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
      $query = mysqli_prepare($conn,$insert_);
      $Feedback = "  تم تحديث حساب مستخدم   ";
       $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
      $result = $query->execute();

 
    if($result){
      header("location:users.php?msg=تم تحديث الحساب ");
      }else{
      header("location:users.php?msg=حصل خطأ الرجاء المحاولة مجددا ");
      }
}
  
  else if ($do =="store"){
    $image_file_name = null;
    $passport_file_name = null;
 
 
 
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
 
 
    $password = isset($_POST['pwd']) ? $_POST['pwd'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : 'User';
    $query =  "SELECT COUNT(*) as userwith_name FROM user WHERE user.Email = '$Email'";

    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
 
    if((int)$row['userwith_name']>0)
    {
       header("location:users.php?msg= البريد الإلكرتوني مستخدم");
       return ;
    }   
 
 
   $insert_ = "INSERT into user( FullName,Email,  Password, RoleUser ) values (?,?,?,?)";
   $query = mysqli_prepare($conn,$insert_);
    $query->bind_param("ssss",$name,$Email,$password, $role);
   
$result = $query->execute();
$insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
$query = mysqli_prepare($conn,$insert_);
$Feedback = "  تم تسجيل مستخدم جديد         ";
 $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
$result = $query->execute();
if($result){
  header("location:users.php?msg=تم تسجيل الحساب ");
  }else{
  header("location:users.php?msg=حصل خطأ الرجاء المحاولة مجددا ");
  }

  }

?> 
 
 
 <?php require_once('includes/header.php')?>
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  
 
 
 
<div class="col-lg-8 col-sm-6">
<div class="mt-4 mt-sm-0 d-flex align-items-center justify-content-sm-end">
<div class="mb-2 me-2">
<div class="dropdown">
<a href="users.php?do=create" class="btn btn-primary  " type="button"  >
<i class="mdi mdi-plus me-1"></i> اضافة مستخدم جديد
</a>
 
</div>
</div>

</div>
</div>
 

<!--  -->
<div class="d-flex flex-wrap">
<h5 class="font-size-16 me-3">المستخدمين</h5>
<div class="ms-auto">
</div>
</div>
<hr class="mt-2">
<?php  if(isset($_GET['msg'])){
    echo "<div class='alert alert-primary' role='alert'>".$_GET['msg']."</div>";
} ?><br>
<?php if($do=="index"){?>
 
<div class="table-responsive">
<table class="table align-middle table-nowrap table-hover mb-0" id="myTable">
<thead class="table-light">
<tr>
<th scope="col">الاسم</th>
<th scope="col">البريد الإلكرتوني</th>
<th scope="col">كلمة السر</th>
<th scope="col">الصلاحيات</th>
<th scope="col">اخرى</th>
</tr>
</thead>
<tbody>
<?php 
                $usersq = "SELECT * from user ";
                $users = mysqli_query($conn, $usersq);
        foreach ($users as $exer ) {
                             ?>

<tr>
<td><?php echo $exer['FullName']; ?></td>
<td><?php echo $exer['Email']; ?></td>
<td><?php echo $exer['Password']; ?></td>
<td><?php echo $exer['RoleUser']; ?></td>
 
<td>
  
  
<a class="btn btn-primary" href="users.php?do=edit&id=<?php echo $exer['UserID'] ?>">Edit</a>
 <a class="btn btn-danger" href="users.php?do=delete&id=<?php echo $exer['UserID'] ?>">Remove</a>
  </td>
</tr>
 
 
 <?php } ?>
 
 
 
</tbody>
</table>
</div>
<?php } else if( $do == "create"){?>
    <form action="users.php?do=store" enctype="multipart/form-data" method="post">

    <div class="mb-3">
  <label  class="form-label"> إسم المستخدم</label>
  <input type="text" class="form-control" name="name" required>
</div>

<div class="mb-3">
  <label  class="form-label"> البريد الإلكرتوني </label>
  <input type="email" class="form-control" name="Email" required>
</div>

    <div class="mb-3">
    <label for="floatingPassword">كلمة السر</label>

      <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="pwd">
    </div>
    <label for="floatingPassword"> نوع المستخدم</label>

<select name="role" id="role" class="form-control">
  <option value="Student">Student</option>
  <option value="Advisor">Advisor</option>
  <option value="Admin">Admin</option>
</select>
<br><br>

<button type="submit" class="btn btn-success">حفظ</button>
<a href="users.php" class="btn btn-secondary    ">إلغاء</a>
</form>
<?php } else if( $do == "edit"){
    
    $id=$_GET['id'];
    $query =  "SELECT * FROM user WHERE UserID = ? ";
    $query = mysqli_prepare($conn,$query);
    $query->bind_param("s",$id);
    $query->execute();
    $result = $query->get_result(); // get the mysqli result
    $user = $result->fetch_assoc();
    ?>
    <form action="users.php?do=update&id=<?php echo $user['UserID'] ?>" enctype="multipart/form-data" method="post">

    <div class="mb-3">
  <label  class="form-label">إسم المستخدم</label>
  <input type="text" class="form-control" name="name" value="<?php echo $user['FullName']?>">
    </div>
    <div class="mb-3">
  <label  class="form-label"> البريد الإلكرتوني</label>
  <input type="text" class="form-control" name="Email" value="<?php echo $user['Email']?>">
    </div>
 
    <div class="mb-3">
    <label for="floatingPassword">كلمة السر</label>

      <input type="password" class="form-control" id="floatingPassword" value="<?php echo $user['Password']?>" required placeholder="Password" name="pwd">
    </div> 
 
<label for="floatingPassword"> نوع المستخدم</label>

<select name="role" id="role" class="form-control">
  <option value="Student">Student</option>
  <option value="Advisor" <?php if($user['RoleUser']=='Advisor'){ echo "selected"; } ?>>Advisor</option>
  <option value="Admin" <?php if($user['RoleUser']=='Admin'){ echo "selected"; } ?>>Admin</option>
</select>
 
<button type="submit" class="btn btn-success">حفظ</button>
<a href="users.php" class="btn btn-secondary    ">الغاء</a>
</form>




<?php } ?> 





 
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

 

</main>
<?php require_once('includes/footer.php')?>