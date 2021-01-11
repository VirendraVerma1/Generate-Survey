<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
<script src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"></script>
  <style type="text/css">
  *{
    margin: 0px;
    padding: 0px;
  }
    body{
           /* background-image: linear-gradient(to bottom right, #ff00bf, #b3b3ff);*/
    }
    .split{
      width: 50%;
      height: 100%;
      position: fixed;
      top: 0px;
      z-index:1;
      overflow-x: hidden;
      padding-top: 20px;
      opacity: 0.8;
    }
    .left{
      left: 0;
      background-image: url("res/coco2.jpg");
      object-fit: cover;
    }
    .right{
      right: 0;
      background-image: linear-gradient(to bottom right, #ff00bf, #b3b3ff);
    }
    .subdiv1{
      width: 80%;
      height: 50%;
      background:rgba(0,0,0,0.0);
      margin-top: 200px;
      margin-left: 100px
      z-index:1;
      padding: 30px;
      position: absolute;
      color:grey; 
    }
  
   .subdiv{
    width: 60%;
    height: 80%;
   background:rgba(0,0,0,0.0);
    top: 40px;
      z-index:1;
      padding: 60px;
      position: absolute;
      margin-top: 60px;
      margin-left: 60px;
   }
   
  </style>
</head>
<body>
  <div class="col-xs-4 col-sm-5 col-md-6">
   <div class="split left">
      <div class="container-fluid padding">
         <div class="row text-center padding">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <h2 class="display-4" style="font-weight: 700; position:absolute;margin-left: 120px;">Sign in with<br>Social Network</h2>
             </div>  
         </div>
      </div>
      <div class="subdiv1">
        <div class="container-fluid padding">
          <div class="row text-center padding">
            <div class="col-xs-3 col-sm-12 col-md-12 col-lg-12 ">
         <button type="button" class="btn btn-outline-primary" style="position: absolute;margin-left: 0px; box-shadow: blue; font-weight: 900; border:5px solid blue;">Log in with facebook</button>
       </div>
     </div>
   </div>
         <br><br><br>
         <div class="container-fluid padding">
          <div class="row text-center padding">
            <div class="col-xs-3 col-sm-12 col-md-12 col-lg-12 ">
         <button type="button" class="btn btn-outline-danger" style="position: absolute;margin-left: 0px;box-shadow:red; font-weight: 900; border:5px solid red;">Log in with Google+</button>
         </div>
     </div>
   </div>
      </div>
   </div>
 </div>

 <div class=" col-xs-8 col-sm-7 col-md-6">
   <div class="split right">
       <div class="container-fluid padding">
        <div class="row text-center padding">
             <div class="col-xs-12 col-sm-12 col-md-12">
               <h2 class="display-4" style="font-weight: 700; position:absolute;margin-left: 120px;">Sign Up</h2>
             </div>          
        </div>
        <form action="signup_php.php" method="POST">
          <div class="subdiv">
            <!-----------------Sub div 1-------------------->
            <div>
              <h5 class="display-6" style="font-weight: 700;">Full Name</h5>
              <div class="form-group">
                 <input type="text" class="form-control" placeholder="Name..." name="email_login">
               </div>
            </div>
            <!-----------------Sub div 2-------------------->
            <div>
              <h5 class="display-6" style="font-weight: 700;">Email</h5>
              <div class="form-group1">
                 <input type="text" class="form-control" placeholder="Email address" name="email_login">
               </div>
            </div>
            <!-----------------Sub div 3-------------------->
            <div>
            <h5 class="display-6" style="font-weight: 700;">Username</h5>
              <div class="form-group1">
                 <input type="text" class="form-control" placeholder="Username" name="email_login">
               </div>
            </div>
            <div>
            <h5 class="display-6" style="font-weight: 700;">Password</h5>
              <div class="form-group1">
                 <input type="password" class="form-control" placeholder="Password" name="email_login">
               </div>
            </div>
           <div> 
            <h5 class="display-6" style="font-weight: 700;">Repeat Password</h5>
              <div class="form-group1">
                 <input type="password" class="form-control" placeholder="Retype Password" name="email_login"><br>
               </div>
            </div>
             <div>
             <button type="button" class="btn btn-primary" style="padding-right: 25px;padding-left: 25px;">Sign Up</button>
             <button type="button" class="btn btn-primary" style="float: right;padding-right: 25px;padding-left: 25px;">Log In</button>
              </div>
          </div>
        </form>
   </div>
 </div> 
</body>
</html>