<?php
include ('functions.php');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">

  <title>SAB core</title>
<style type="text/css">
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */
    body{        
        padding-top: 60px;
        padding-bottom: 40px;
    }
    .fixed-header, .fixed-footer{
        width: 100%;
        position: fixed;        
        background: #333;
        padding: 10px 0;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }

    .fixed-footer{
        bottom: 0;
    }
    .container{
        width: 100%;
        margin: 0 auto; /* Center the DIV horizontally */
    };

    
</style>

</head>
<body style= "background-color: white">
<div class="fixed-header">
Centenary Suggestion box and Teamwork
</div>
  <div class="cd-tabs cd-tabs--vertical container max-width-md margin-top-xl margin-bottom-lg js-cd-tabs">
    <nav class="cd-tabs__navigation" >
      <ul class="cd-tabs__list" style="background-color:teal">
        <li>
          <a href="#tab-inbox" class="cd-tabs__item cd-tabs__item--selected">
            
            <span>Login</span>
          </a>
        </li>

        <li>
          <a href="#tab-new" class="cd-tabs__item">
            
            <span>Create an Account</span>
          </a>
        </li>
      </ul>  
    </nav>

    <ul class="cd-tabs__panels">
      <li id="tab-inbox" class="cd-tabs__panel cd-tabs__panel--selected text-component">
      <center>Login</center>
       
        <div class="content">
          <form method="post" action="index.php">
          <div class="input-group">
     
           <center> Username: <input type="text" name="username" ></center> <br>
          <center> Password:  <input type="password" name="password" ></center><br>
          <center><input type="submit" name="login" value="login"></center>
        </div>
        </form> 

       </div>
         

      
      </li>


      <li id="tab-new" class="cd-tabs__panel text-component">
      <center>Create an account</center>
        <div class="content">
          <form method="post" action="index.php">
          <?php echo display_error(); ?>
          <div class="input-group">
     
           <center> Username: <input type="text" name="username" value="<?php echo $username; ?>"></center> 
           <br>
           <center> Email:  <input type="text" name="email" value="<?php echo $email; ?>"></center> <br>
           <center> Date Of Birth:  <input type="date" name="date_of_birth" value= "<?php echo $date_of_birth; ?>">
           </center> <br>
        
          <center> Password:  <input type="password" name="password_1" ></center> <br>
           <center> Confirm Password:  <input type="password" name="password_2" ></center><br>
           <center><input type="submit" name="create_account" ></center>

        </div>
        </form> 

       </div>

      </li>
      </ul>

  </div>  

      <div class="fixed-footer">
        <div class="container">Copyright &copy; 2019 SAB technologies</div>        
    </div>
<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
<script src="assets/js/main.js"></script>
</body>
</html>