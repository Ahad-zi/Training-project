<?php 
session_start();
if(!isset($_SESSION['role']) )
header("location:index.php");

include("includes/DBconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "store"  ) {
    $uploadDir = 'uploads/';
    

    $OrganizationName = $_POST['OrganizationName'] ;
    $Website = $_POST['Website'] ;
    $addresse = $_POST['addresse'] ;
    $city = $_POST['city'] ;
    $responsable = $_POST['responsable'] ;
    $Phone_number = $_POST['Phone_number'] ;
    $change_ = $_POST['change_'] ;
    $Email = $_POST['Email'] ;


    $file =null;
     
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $originalName = basename($_FILES['file']['name']);
        $uniqueName = date('YmdHis') . '_' . uniqid() . '_' . $originalName;
        $uploadFile = $uploadDir . $uniqueName;

        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);
        $file=$uniqueName;
    }
   
   $insert_ = "INSERT into trainingorganization(OrganizationName,Website,addresse,city,responsable,Phone_number,change_,Email,file	) values (?,?,?,?,?,?,?,?,?)";
   $query = mysqli_prepare($conn,$insert_);
    $query->bind_param("sssssssss",$OrganizationName,$Website,$addresse,$city,$responsable,$Phone_number,$change_,$Email,$file);
   
$result = $query->execute();
$new_id = mysqli_insert_id($conn);
$names = $_POST['name'];
$descriptions = $_POST['description'];
$starts = $_POST['start'];
$ends = $_POST['end'];
$nbrSeats = $_POST['nbr_seat'];
$fees = $_POST['fee'];
$prerequisites = $_POST['Prerequisites'];

foreach ($names as $index => $name) {
    $description = $descriptions[$index];
    $start = $starts[$index];
    $end = $ends[$index];
    $nbrSeat = $nbrSeats[$index];
    $fee = $fees[$index];
    $prerequisite = $prerequisites[$index];

    $insert_ = "INSERT into trainingprogram(ProgramName,Description,StartDate,EndDate,Capacity,Fee,Prerequisites,OrganizationID	) values (?,?,?,?,?,?,?,?)";
    $query = mysqli_prepare($conn,$insert_);
     $query->bind_param("ssssssss",$name,$description,$start,$end,$nbrSeat,$fee,$prerequisite,$new_id);
    
 $result = $query->execute();}



$insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
$query = mysqli_prepare($conn,$insert_);
$Feedback = "تم تسجيل طلب إضافة جهة جديدة";
 $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
$result = $query->execute();
if($result){
header("location:new_trainingorganization.php?msg=تمت إضافة الجهة بنجاح");
}else{
header("location:new_trainingorganization.php?msg=حصل خطأ ما المرجو المحاولة لاحقا");
}
}if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "delete"  ) {
    $id = $_POST['id'] ;

    $insert_ = "DELETE from  trainingorganization where  OrganizationID = ?";
    $query = mysqli_prepare($conn,$insert_);
     $query->bind_param("s",$id);
    
 $result = $query->execute();
 $insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
$query = mysqli_prepare($conn,$insert_);
$Feedback = "تمت حذف جهة  ";
 $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
$result = $query->execute();
 if($result){
 header("location:new_trainingorganization.php?msg=تم حذف الجهة بنجاح");
 }else{
 header("location:new_trainingorganization.php?msg=حصل خطأ ما المرجو المحاولة لاحقا");
 }


}
?>

<?php require_once('includes/header.php')?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div  >
      <br><?php if(isset($_GET['msg'])){
    echo "<h3>".$_GET['msg']."</h3>";
}?><br>
      <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Advisor'){?>
        <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      طلب إضافة جهة جديدة 
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <form action="new_trainingorganization.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="do" value="store">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">إسم جهة التدريب</label>
  <input type="text" class="form-control" name="OrganizationName">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">المنطقة</label>
  <input type="text" class="form-control" name="addresse">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">المدينة</label>
  <input type="text" class="form-control" name="city">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">إسم المشرف على التدريب</label>
  <input type="text" class="form-control" name="responsable">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">رقم الجوال</label>
  <input type="text" class="form-control" name="Phone_number">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">التحويلة</label>
  <input type="text" class="form-control" name="change_">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">البريد الإلكتروني</label>
  <input type="email" class="form-control" name="Email">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">الموقع الإلكتروني</label>
  <input type="text" class="form-control" name="Website">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">تحميل نص خطة التدريب</label>
  <input type="file" class="form-control" name="file">
</div>
<script>
        function addRow() {
            var table = document.getElementById("myTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);

            newRow.innerHTML = `
                <td><input type="text" name="name[]" class="form-control"></td>
                <td><input type="text" name="description[]" class="form-control"></td>
                <td><input type="date" name="start[]" class="form-control"></td>
                <td><input type="date" name="end[]" class="form-control"></td>
                <td><input type="number" name="nbr_seat[]" class="form-control"></td>
                <td><input type="number" name="fee[]" class="form-control"></td>
                <td><input type="text" name="Prerequisites[]" class="form-control"></td>
                <td><button class="btn btn-danger" type="button" onclick="deleteRow(this)">حذف</button></td>
            `;
        }
  function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
</script>
 <h1>البرامج التدريبية</h1>
 <button class="btn btn-primary" type="button" onclick="addRow()">أضف</button>
 <table class="table" id="myTable">
  <thead>
    <tr>
      <th>إسم البرنامج</th>
      <th>الوصف</th>
      <th>تاريخ البدأ</th>
      <th>تاريخ الإنتهاء</th>
      <th>عدد المقاعد</th>
      
      <th>المتطلبات</th>
      <th>إجراءات</th>
    </tr>
  </thead>
  <tbody>
<tr>
<td><input type="text" name="name[]" class="form-control"> </td>
      <td><input type="text" name="description[]" class="form-control"></td>
      <td><input type="date" name="start[]" class="form-control"> </td>
      <td><input type="date" name="end[]" class="form-control"> </td>
      <td><input type="number" name="nbr_seat[]" class="form-control"></td>
      
      <td><input type="text" name="Prerequisites[]" class="form-control"></td>
      <td><button class="btn btn-danger" type="button" onclick="deleteRow(this)" >حذف</button></td>
</tr>
  </tbody>
 </table>
<button type="submit" class="btn btn-primary">حفظ</button>
</form>


    </div>
  </div>
        </div>   
         
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>الإسم</th>
 
                        <th>المنطقة</th>
                        <th>المدينة</th>
                        <th>المشرف</th>
                        <th>الجوال</th>
                        
                        <th>البريد الإلكتروني</th>
                        <th>خطة التدريب</th>
                         <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                $usersq = "SELECT * from trainingorganization  ";
                $organization = mysqli_query($conn, $usersq);
        foreach ($organization as $exer ) { ?>
   <tr>
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
                         <td><form action="new_trainingorganization.php" method="post">
                            <input type="hidden" name="do" value="delete">
                            <input type="hidden" name="id" value="<?php echo $exer['OrganizationID'] ?>">
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form></td>
                    </tr>
                    <tr>
                    <td colspan="9"><ul>
                      <li>البرنامج - الوصف - تاريخ البدأ - تاريخ الإنتهاء - عدد المقاعد </li>

                       
<?php 
$usersq = "SELECT * from trainingprogram where OrganizationID =  ".$exer['OrganizationID'];
$progs = mysqli_query($conn, $usersq);
foreach ($progs as $prog ) { ?>
<li><?php echo $prog['ProgramName'].'-'.$prog['Description'].'-'.$prog['StartDate'].'-'.$prog['EndDate'] ; ?></li>
<?php }?> </ul></td>
                    </tr>

<?php    } ?>
                </tbody>
            </table>
        </div>


            <?php   }?>
      </div>

  
    </main>
    <?php require_once('includes/footer.php')?>