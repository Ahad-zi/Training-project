<?php 
session_start();
if(!isset($_SESSION['role']) )
header("location:index.php");

include("includes/DBconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['do'] == "store"  ) {
    $uploadDir = 'uploads/';
    

    $TrainingProgramID = $_POST['TrainingProgramID'] ;
    $Rating = $_POST['rating'] ;
    $Rating2 = $_POST['rating2'] ;
    $Rating3 = $_POST['rating3'] ;
    $Rating4 = $_POST['rating4'] ;
    $Rating5 = $_POST['rating5'] ;
    $Rating6 = $_POST['rating6'] ;
    $Feedback = $_POST['Feedback'] ;
   
 
 
     
 
 
   $insert_ = "INSERT into evaluation(	UserID,TrainingProgramID ,Rating,Rating2,Rating3,Rating4,Rating5,Rating6,Feedback) values (?,?,?,?,?,?,?,?,?)";
   $query = mysqli_prepare($conn,$insert_);
    $query->bind_param("sssssssss",$_SESSION['id'],$TrainingProgramID,$Rating,$Rating2,$Rating3,$Rating4,$Rating5,$Rating6, $Feedback);
   
$result = $query->execute();


$insert_ = "INSERT into notification (	description,user_name ) values (?,?)";
$query = mysqli_prepare($conn,$insert_);
$Feedback = "تمت إضافة تقييم جديد";
 $query->bind_param("ss",$Feedback,$_SESSION['FullName']);
$result = $query->execute();
if($result){
header("location:evaluate.php?msg=تمت إضافة التقييم بنجاح");
}else{
header("location:evaluate.php?msg=حصل خطأ الرجاء المحاولة لاحقا");
}
} 
?>

<?php require_once('includes/header.php')?>
<style>
        .star-rating {
            direction: rtl;
            display: inline-block;
            font-size: 2em;
            padding: 0.2em;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            font-size: 2em;
            padding: 0;
            cursor: pointer;
        }
        .star-rating :checked ~ label {
            color: #f5b301;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f5b301;
        }
    </style>
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
      تقييم جهات التدريب
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <form action="evaluate.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="do" value="store">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">إسم جهة التدريب</label>
<select name="TrainingProgramID" id="TrainingProgramID" class="form-control" required>
    <?php    $usersq = "SELECT to_.*,a.Status from trainingorganization to_ join application a on a.TrainingOrganizationID =to_.OrganizationID  where a.UserID = ".$_SESSION['id'] ." AND Status = 1" ;
                $organization = mysqli_query($conn, $usersq);
        foreach ($organization as $exer ) { ?>
                <option value="<?php echo $exer['OrganizationID']?>"><?php echo $exer['OrganizationName']?></option>
        <?php } ?>
</select>
</div>

  
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Hands on experience </label>
  <div class="star-rating">
            <input type="radio" id="5-stars" name="rating" value="5">
            <label for="5-stars" class="star">&#9733;</label>
            <input type="radio" id="4-stars" name="rating" value="4">
            <label for="4-stars" class="star">&#9733;</label>
            <input type="radio" id="3-stars" name="rating" value="3">
            <label for="3-stars" class="star">&#9733;</label>
            <input type="radio" id="2-stars" name="rating" value="2">
            <label for="2-stars" class="star">&#9733;</label>
            <input type="radio" id="1-star" name="rating" value="1">
            <label for="1-star" class="star">&#9733;</label>
          
        </div>
    </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">  Training Provided</label>
  <div class="star-rating">
            <input type="radio" id="5-stars2" name="rating2" value="5">
            <label for="5-stars2" class="star">&#9733;</label>
            <input type="radio" id="4-stars2" name="rating2" value="4">
            <label for="4-stars2" class="star">&#9733;</label>
            <input type="radio" id="3-stars2" name="rating2" value="3">
            <label for="3-stars2" class="star">&#9733;</label>
            <input type="radio" id="2-stars2" name="rating2" value="2">
            <label for="2-stars2" class="star">&#9733;</label>
            <input type="radio" id="1-star2" name="rating2" value="1">
            <label for="1-star2" class="star">&#9733;</label>
          
        </div>
    </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Attitude of Supervisor </label>
  <div class="star-rating">
            <input type="radio" id="5-stars3" name="rating3" value="5">
            <label for="5-stars3" class="star">&#9733;</label>
            <input type="radio" id="4-stars3" name="rating3" value="4">
            <label for="4-stars3" class="star">&#9733;</label>
            <input type="radio" id="3-stars3" name="rating3" value="3">
            <label for="3-stars3" class="star">&#9733;</label>
            <input type="radio" id="2-stars3" name="rating3" value="2">
            <label for="2-stars3" class="star">&#9733;</label>
            <input type="radio" id="1-star3" name="rating3" value="1">
            <label for="1-star3" class="star">&#9733;</label>
          
        </div>
    </div>
 
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Professional Work Environment </label>
  <div class="star-rating">
            <input type="radio" id="5-stars4" name="rating4" value="5">
            <label for="5-stars4" class="star">&#9733;</label>
            <input type="radio" id="4-stars4" name="rating4" value="4">
            <label for="4-stars4" class="star">&#9733;</label>
            <input type="radio" id="3-stars4" name="rating4" value="3">
            <label for="3-stars4" class="star">&#9733;</label>
            <input type="radio" id="2-stars4" name="rating4" value="2">
            <label for="2-stars4" class="star">&#9733;</label>
            <input type="radio" id="1-star4" name="rating4" value="1">
            <label for="1-star4" class="star">&#9733;</label>
          
        </div>
    </div>
 
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Attitude of Employees </label>
  <div class="star-rating">
            <input type="radio" id="5-stars5" name="rating5" value="5">
            <label for="5-stars5" class="star">&#9733;</label>
            <input type="radio" id="4-stars5" name="rating5" value="4">
            <label for="4-stars5" class="star">&#9733;</label>
            <input type="radio" id="3-stars5" name="rating5" value="3">
            <label for="3-stars5" class="star">&#9733;</label>
            <input type="radio" id="2-stars5" name="rating5" value="2">
            <label for="2-stars5" class="star">&#9733;</label>
            <input type="radio" id="1-star5" name="rating5" value="1">
            <label for="1-star5" class="star">&#9733;</label>
          
        </div>
    </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Overall lmpression of Summer Training  </label>
  <div class="star-rating">
            <input type="radio" id="5-stars6" name="rating6" value="5">
            <label for="5-stars6" class="star">&#9733;</label>
            <input type="radio" id="4-stars6" name="rating6" value="4">
            <label for="4-stars6" class="star">&#9733;</label>
            <input type="radio" id="3-stars6" name="rating6" value="3">
            <label for="3-stars6" class="star">&#9733;</label>
            <input type="radio" id="2-stars6" name="rating6" value="2">
            <label for="2-stars6" class="star">&#9733;</label>
            <input type="radio" id="1-star6" name="rating6" value="1">
            <label for="1-star6" class="star">&#9733;</label>
          
        </div>
    </div>
 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> التعليق </label>
<textarea name="Feedback" id="Feedback"  class="form-control"></textarea>
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
                         <th>إسم الطالب/ة</th>
                        <th>رقم الطالب/ة</th>
                        <th>Hands on experience</th>
                        <th>Training Provided</th>
                        <th>Attitude of Supervisor</th>
                        <th>Professional Work Environment</th>
                        <th>Attitude of Employees</th>
                        <th>Overall lmpression of Summer Training</th>
                        <th>التعليق</th>

                      </tr>
                </thead>
                <tbody>
                    <?php 
                    if($_SESSION['role']=='Student')
                $usersq = "SELECT r.*,u.FullName,u.Student_Number from evaluation r join user u  on  u.UserID =  r.UserID  where u.UserID = ".$_SESSION['id']." ";
                else 
                $usersq = "SELECT r.*,u.FullName,u.Student_Number  from evaluation r join user u  on  u.UserID =  r.UserID    ";

                $organization = mysqli_query($conn, $usersq);
        foreach ($organization as $exer ) { ?>
   <tr>
                         <td><?php echo $exer['FullName'] ?></td>
                        <td><?php echo $exer['Student_Number'] ?></td>
                        <td><?php for ($i=0; $i < $exer['Rating']; $i++) { 
                            echo "<label for='' class='star' checked>&#9733;</label>" ;
                        }  ?></td>
                              <td><?php for ($i=0; $i < $exer['Rating2']; $i++) { 
                            echo "<label for='' class='star' checked>&#9733;</label>" ;
                        }  ?></td>
                              <td><?php for ($i=0; $i < $exer['Rating3']; $i++) { 
                            echo "<label for='' class='star' checked>&#9733;</label>" ;
                        }  ?></td>
                              <td><?php for ($i=0; $i < $exer['Rating4']; $i++) { 
                            echo "<label for='' class='star' checked>&#9733;</label>" ;
                        }  ?></td>
                              <td><?php for ($i=0; $i < $exer['Rating5']; $i++) { 
                            echo "<label for='' class='star' checked>&#9733;</label>" ;
                        }  ?></td>
                              <td><?php for ($i=0; $i < $exer['Rating6']; $i++) { 
                            echo "<label for='' class='star' checked>&#9733;</label>" ;
                        }  ?></td>
                        <td><?php echo $exer['Feedback'] ?></td>
                     

                   
                                      
                    
                    </tr>

<?php    } ?>
                </tbody>
            </table>
        </div>


         
      </div>

  
    </main>
    <?php require_once('includes/footer.php')?>