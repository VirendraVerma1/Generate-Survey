<!DOCTYPE html>
<html>
<head>
  <title>login page</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"></script>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Roboto')
    /* <i class="fas fa-sign-in-alt"></i>*/
    body{
      font-family: 'Roboto',sans-serif;
    }
    .btn{
      position: static;
      margin-top: 25px;
      margin-right: 15px;
      float: right;
    }
    .display-4{
      margin-left: 30px;
    }
   .main-section{
      margin: 0px,auto;
      position: static;

      padding: 0px;
    }
    .modal-content{
      padding: 0,18;
      box-shadow: 1px 1px 6px cyan;
    }
    .user-img{
      padding: 35px;
    }
    .form-group{
      margin-bottom: 35px;
    }
    .form-group input{
      height: 42px;
      border-radius: 5px;
      font-size: 18px;
      padding-left: 58px;
    }
    .form-group::before{
      font-family: 'Font Awesome\ 5 Free';
      content: "\f007";
      position: absolute;
      font-size: 22px;
      color: #555e60;
      left: 28px;
      padding-top: 4px;
    }
    .form-group:last-of-type::before {
     content: "\f023";
    }
    #button2{
      width: 40%;
      margin: 5px 0 25px;
    }
    #button2{
      font-size: 19px;
      padding: 7px 14px;
      border-radius: 5px;
      box-shadow:cyan;
      border-bottom: 4px solid cyan;
    }
    #button2:hover,#button2:focus{
      background-color: cyan!important;
      border-bottom: 4px solid cyan!important;
    }
    .svg-inline--fa{
      font-size: 20px;
      margin-right: 7px;
    }
    .forgot{
      padding: 5px 0 25px;
    }
    .forgot a{
      color: grey;
    }
  </style>
  <body>
    <!-------Sign up button-------->
    <div class="contained-fluid padding">
      <div class="row text-center padding">
        <div class="col-xs-2 col-sm-11 col-md-11">
          <button type="button" class="btn btn-outline-primary" class="button1" style="font-size: 15px">Sign up</button>
        </div>
      </div>
    </div>
    <!------------Log in Written--------------->
    <div class="contained-fluid padding">
      <div class="row text-center padding">
        <div class=" col-xs-12 col-sm-12 col-md-10">
           <h2 class="display-4">Login</h2>
        </div>
      </div>
    </div>
    <!----------Form------------>
    <div class="modal-dialog text-center">
       <div class="col-sm-8 main-section">
         <div class="modal-content">
        <!-------User Circle---------->
           <div class="col-12 user-img"> 
             <i class="fas fa-user-circle" style="font-size:70px;"></i>
           </div>
        <!----------User Name And Password------->
           <div>
             <form class="col-12" action="login_php.php" method="POST">

               <div class="form-group">
                 <input type="text" class="form-control" placeholder="Enter Email" name="email_login">
               </div>

               <div class="form-group">
                 <input type="password" class="form-control" placeholder="Enter Password" name="password_login">
               </div>
        <!----------Login Button--------->

               <button type="submit" id="button2" name="submit_login">
                   <i class="fas fa-sign-in-alt"></i>Login
               </button>
              
             </form>
             <div class="col-12 forgot">
               <a href="#">Forgotten Password?</a>
             </div>
           </div>

         </div><!-----End of Modal content------->
       </div>
     </div>
  </body>
</html>