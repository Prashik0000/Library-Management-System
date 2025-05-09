<?php
    session_start();
    function get_user_issue_book_count(){
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,"library_mgmt");
      $user_issue_book_count=0;
      $query = "select count(*) as user_issue_book_count from issued_books where
            roll = $_SESSION[roll]";
      $query_run = mysqli_query($connection,$query);
      while ($row = mysqli_fetch_assoc($query_run)) {
        $user_issue_book_count = $row['user_issue_book_count'];
      }
      return($user_issue_book_count);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

  <script type="text/javascript" src="bootstrap/js/juqery_latest.js"></script>

  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

  <style>
    #side_bar{
      background-color: beige;
      padding: 50px;
      width: 300px;
      height: 450px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="user_dashboard.php">Library Management System</a>
      </div>
      <font style="color:white"><span><strong>Welcome <?php echo $_SESSION['name'];?></strong></span></font>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"data-toggle="dropdown">My Profile</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="view_profile.php">View Profile</a>
            <a class="dropdown-item"href="edit_profile.php">Edit Profile</a>
            <a class="dropdown-item"href="change_password.php">Change Password</a>
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </nav>
  <span>
    <marquee behaviour="scroll" direction="left" scrollamount="8">
      "Library: where Knowledge Finds Its Home, and Minds Find Their Wings."
    </marquee>
  </span><br><br>
  <div class="row">
  <div class="col-md-4" id="side_bar">
      <h5>Our Services</h5>
      <ul>
        <li>Internet Access</li>
        <li>Multimedia Materials</li>
        <li>Children's and Teen Section</li>
        <li>Perodicals and Journals</li>
        <li>Wide range of books</li>
        <li>Study Spaces</li>
      </ul>
      <h5>Library Time</h5>
      <ul>
        <li>Sunday to Thursday</li>
        <ul type="circle">
          <li>Opening Time: 11 am</li>
          <li>Closing Time: 6 pm</li>
        </ul>
        <li>Friday</li>
        <ul type="circle">
          <li>Opening Time: 11 am</li>
          <li>Closing Time: 3 pm</li>
        </ul>
        <li>Saturday : Holiday </li>
      </ul>
     
    </div>
    <div class="col-md-8">
      <div class="card bg-light" style="width: 300px">
        <div class="card-header"> Issued Books</div>
        <div class="card-body">
          <p class="card-text">Number of Total Issued Books - <?php echo get_user_issue_book_count(); ?> </p>
          <a href="view_issued_book.php" class="btn btn-primary" target="_blank">View Issued Books</a>
        </div>
      </div>
  </div>
  
</div>
</body>
</html>