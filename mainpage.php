<?php
include ('functions.php');
if (!isUser()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type= "text/javascript">
  function otherSelected(obj) {
    if(obj.value == "Others") {
        document.getElementById('div').innerHTML = ' <br> <h5> Enter the event here: </h5> <input type="text" name="Others" />';
    }else{
     document.getElementById('div').innerHTML = "<h5> You have selected a " +obj.value+ " event </h5>";
    }
}
    

  </script>

  <title>Centenary Suggestion box</title>
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
<div>
<?php 
echo $_SESSION['success']; 
unset($_SESSION['success']);
?>
</div>
<?php echo $_SESSION['user']['username']; ?>
<?php echo $_SESSION['user']['user_id'] ?>
<a href="mainpage.php?logout='1'" style="color: red;"><button>logout</button></a>
  <div class="cd-tabs cd-tabs--vertical container max-width-md margin-top-xl margin-bottom-lg js-cd-tabs">
    <nav class="cd-tabs__navigation" >
      <ul class="cd-tabs__list" style="background-color: dodgerblue">
        <li>
          <a href="#tab-inbox" class="cd-tabs__item cd-tabs__item--selected">
            <svg aria-hidden="true" class="icon icon--xs"><path d="M15,0H1C0.4,0,0,0.4,0,1v14c0,0.6,0.4,1,1,1h14c0.6,0,1-0.4,1-1V1C16,0.4,15.6,0,15,0z M14,2v7h-3 c-0.6,0-1,0.4-1,1v2H6v-2c0-0.6-0.4-1-1-1H2V2H14z"></path></svg>
            <span>Suggest</span>
          </a>
        </li>

        <li>
          <a href="#tab-new" class="cd-tabs__item">
            <svg aria-hidden="true" class="icon icon--xs"><path d="M12.7,0.3c-0.4-0.4-1-0.4-1.4,0l-7,7C4.1,7.5,4,7.7,4,8v3c0,0.6,0.4,1,1,1h3 c0.3,0,0.5-0.1,0.7-0.3l7-7c0.4-0.4,0.4-1,0-1.4L12.7,0.3z M7.6,10H6V8.4l6-6L13.6,4L7.6,10z"></path><path d="M15,10c-0.6,0-1,0.4-1,1v3H2V2h3c0.6,0,1-0.4,1-1S5.6,0,5,0H1C0.4,0,0,0.4,0,1v14c0,0.6,0.4,1,1,1h14 c0.6,0,1-0.4,1-1v-4C16,10.4,15.6,10,15,10z"></path></svg>
            <span>Announce</span>
          </a>
        </li>

        <li>
          <a href="#tab-store" class="cd-tabs__item">
            <svg aria-hidden="true" class="icon icon--xs"><path d="M13.9,0.5C13.7,0.2,13.4,0,13,0H3C2.6,0,2.3,0.2,2.1,0.5C0,4.5,0,4.7,0,5c0,1.1,0.9,2,2,2v8c0,0.6,0.4,1,1,1 h10c0.6,0,1-0.4,1-1V7c1.1,0,2-0.9,2-2C16,4.7,16,4.5,13.9,0.5z M10,14v-4H6v4H4V6.7C4.3,6.9,4.6,7,5,7c0.6,0,1.1-0.3,1.5-0.7 C6.9,6.7,7.4,7,8,7s1.1-0.3,1.5-0.7C9.9,6.7,10.4,7,11,7c0.4,0,0.7-0.1,1-0.3V14H10z"></path></svg>
            <span>NoticeBoard</span>
          </a>
        </li>

        <li>
          <a href="#tab-settings" class="cd-tabs__item">
          
            <span>Business Tips</span>
          </a>
        </li>

        <li>
          <a href="#tab-trash" class="cd-tabs__item">
          <i class='far fa-calendar' style='font-size:30px;color:orange'></i>
            <span>Events</span>
          </a>
        </li>

         <li>
          <a href="#inquiry" class="cd-tabs__item">
            <svg aria-hidden="true" class="icon icon--xs"><path d="M13.9,0.5C13.7,0.2,13.4,0,13,0H3C2.6,0,2.3,0.2,2.1,0.5C0,4.5,0,4.7,0,5c0,1.1,0.9,2,2,2v8c0,0.6,0.4,1,1,1 h10c0.6,0,1-0.4,1-1V7c1.1,0,2-0.9,2-2C16,4.7,16,4.5,13.9,0.5z M10,14v-4H6v4H4V6.7C4.3,6.9,4.6,7,5,7c0.6,0,1.1-0.3,1.5-0.7 C6.9,6.7,7.4,7,8,7s1.1-0.3,1.5-0.7C9.9,6.7,10.4,7,11,7c0.4,0,0.7-0.1,1-0.3V14H10z"></path></svg>
            <span>Inquiry</span>
          </a>
        </li>

      </ul> <!-- cd-tabs__list -->
    </nav>


    <ul class="cd-tabs__panels">
      <li id="tab-inbox" class="cd-tabs__panel cd-tabs__panel--selected text-component">
      <center>SuggestionBox</center>
       <div class="content">
       		<form method="post" action="mainpage.php">
       		<div class="input-group">
			<label><center>Topic of your Suggestion</center></label>
			<center> <input type="text" name="username" value=""></center>
		    </div><br>
		    <div class="input-group">
			<label><center>Write a description about your Suggestion</center></label><br>
			<center><textarea style="height:100px"></textarea></center><br>
			<center><input type="file" name="suggestionFile" value=""></center><br>
			<center><input type="submit" name="suggestion" value="Send"></center>
			</div>
        

       		</form>	

       </div>
       <br>
       <center>Previous Suggestion Status</center>
       <div class="content">
       
       </div>

      </li>


      <li id="tab-new" class="cd-tabs__panel text-component">
      <center>AnnouncementBox</center>
      <div class="content">
            <form method="post" action="tabpanels.php">
       		<div class="input-group">
			<label><center>Announcement Topic</center></label>
			<center> <input type="text" name="username" value=""></center>
		    </div><br>
		    <div class="input-group">
			<label><center>Write a description about your announcement</center></label><br>
			<center><textarea style="height:100px"></textarea></center><br>
			<center><input type="file" name="announcementFile" value=""></center><br>
			<center><input type="submit" name="announcement" value="Send"></center>
			</div>
        
       		</form>	
       
        </div>
        <br>
       <center>Latest Announcements</center>
       <div class="content">
       
       </div>
      </li>

      <li id="tab-store" class="cd-tabs__panel text-component">
<center>NoticeBoard</center>
      <div class="content">
      <center>Important notice from Management</center>

       
        </div>
        <br>
       <center>Successful Suggestions</center>
       <div class="content">
       
       </div>
      </li>

      

      <li id="tab-trash" class="cd-tabs__panel text-component">
      <center>Publish an Event</center>
       <div class="content">
       <form method="post" action="mainpage.php">
       
       		<div class="input-group">
			<label><center>Choose Event Type</center></label>
			<center> 
			<select name="event" onchange="otherSelected(this);">
			  <option value ="Event not Specified">-------</option>
				<option value ="Wedding ">Wedding</option>
        <option value ="BirthDay">Birthday Party</option>
				<option value = "Graduation ">Graduation</option>
				<option value ="Introduction">Introduction</option>
				<option value ="Baby Shower">Baby Shower</option>
				<option value="Others">Others(Specify)</option>

			</select>
      <div id="div">


      </div>

			</center>
		    </div>
		    <div class="input-group">
			<label><center>Description of the event</center></label><br>
			<center><textarea style="height:100px" name= "event_description"></textarea></center><br>
			<center><input type="submit" name="post_event" value="Publish"></center>
			</div>
        

       		</form>

       
       </div> <br>
<center>BirthDays Reminders</center>
      <div class="content">
     </div>
        <br>
       <center>Events</center>
       <div class="content">  
          <?php
          
          $query = "SELECT event_type, event_description,post_owner, date_of_publishment from events limit 0,5";
          global $db;
            $result = mysqli_query($db,$query);
         while($rows = mysqli_fetch_array($result)){
            ?>
            <div id="div">
              <fieldset> 
              <strong>Event type:</strong><?php echo $rows['event_type']; ?><br>
              <strong>Event description:</strong><?php echo $rows['event_description']; ?><br>
              <strong>Posted by:</strong><?php echo $rows['post_owner']; ?><br>
              <strong>Posted on:</strong><?php echo $rows['date_of_publishment']; ?> 
            </fieldset> <hr>

            </div>
          <?php
       
          }
          ?>
          <button type="submit" name= "read_more">Read More Posts</button>
       </div>
      </li>

      <li id="tab-settings" class="cd-tabs__panel text-component">
      <center>Make Your Business Grow</center>
      <div class="content">
        

      </div>
      </li>

      <li id="inquiry" class="cd-tabs__panel text-component">
      <center>Ask</center>
      <div class="content">
        

      </div>
      </li>
    </ul> <!-- cd-tabs__panels -->
  </div> <!-- cd-tabs -->

      <div class="fixed-footer">
      
        <div class="container">Copyright &copy; 2019 SAB technologies</div>        
    </div>
<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
<script src="assets/js/main.js"></script>
</body>
</html>