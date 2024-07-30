<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Text Me One:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Times New Roman:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inknut Antiqua:wght@400&display=swap" />

  <style>
    body {
      margin: 0;
      line-height: normal;
    }
  </style>
</head>

<body>
  <div style="
        width: 100%;
        position: relative;
        background-color: #fff;
        height: 832px;
        overflow: hidden;
        text-align: left;
        font-size: 24px;
        color: #000;
        font-family: Inter;
      ">
    <div style="
          position: absolute;
          top: 0px;
          left: -54px;
          background-color: rgba(217, 217, 217, 0.51);
          width: 1347px;
          height: 832px;
        "></div>
    <img style="
          position: absolute;
          top: -15px;
          left: 544px;
          width: 809px;
          height: 855px;
          object-fit: cover;
        " alt="" src="img/whatsapp-image-20240708-at-125028-pm-1@2x.png" />

    <img style="
          position: absolute;
          top: 24px;
          left: 994px;
          width: 253px;
          height: 124px;
          object-fit: cover;
        " alt="" src="img/science-footer-2@2x.png" />

    <div style="
          position: absolute;
          top: 124px;
          left: 68px;
          box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
          background-color: #fff;
          width: 430px;
          height: 630px;
        "></div>
    <div style="
          position: absolute;
          top: 203px;
          left: 104px;
          width: 350.3px;
          height: 459px;
        ">
      <form action="login.php" method="post">
      <div>
        
        <input type="text" style="  position: absolute;
        top: 53px;
        left: 30px;
        border-radius: 100px;
        background-color: #ffffff;
        width: 283px;
        height: 43px;
        border: 5px  solid #d9d9d9;;
        padding-left: 10px;
        "  type="text" id="username" name="username" required>

      </div>

      <div style="
            position: absolute;
            top: 0px;
            left: 186px;
            display: inline-block;
            width: 157.3px;
            height: 18.9px;
          ">
        الرقم الجامعي
      </div>
      <div style="
            position: absolute;
            top: 140px;
          ">
              <input  style="  position: absolute;
              top: 53px;
              left: 30px;
              border-radius: 100px;
              background-color: #ffffff;
              width: 283px;
              height: 43px;
              border: 5px  solid #d9d9d9;;
              padding-left: 10px;
              "  type="password" id="password" name="password" required>
        
        </div>

      
      <div style="
            position: absolute;
            top: 137px;
            left: 193px;
            display: inline-block;
            width: 157.3px;
            height: 18.9px;
          ">
        الرقم السري
      </div>
      <div style="
            position: absolute;
            top: 351px;
            left: 149px;
            text-decoration: underline;
            display: inline-block;
            width: 78px;
            height: 30px;
            backdrop-filter: blur(4px);
            cursor: pointer;
          " id="text2">
         <input type="submit" style="
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            cursor: pointer;
            opacity: 0;
            z-index: 10;
          ">
        تسجيل
      </div>
           <div style="
            position: absolute;
            top: 269px;
            left: 0px;
            display: inline-block;
            width: 218px;
            height: 28px;
          ">
        نسيت كلمة المرور
      </div>
      <div style="
            position: absolute;
            top: 415px;
            left: 108px;
            text-decoration: underline;
            display: inline-block;
            width: 156px;
            height: 44px;
            backdrop-filter: blur(4px);
            cursor: pointer;
          " id="text4">
        انشاء حساب
      </div>
      </form>
    </div>
   
  </div>

  <script>

    var text4 = document.getElementById("text4");
    if (text4) {
      text4.addEventListener("click", function (e) {
        window.location.href = "new-account.php";
      });
    }
  </script>
</body>

</html>