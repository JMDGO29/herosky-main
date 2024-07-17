<?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection, 'appointment');

  if(isset($_POST['deletedata']))
  {
      $book_id = $_POST['delete_id'];

      $query = "DELETE FROM book WHERE BOOK_ID='$book_id'";
      $query_run = mysqli_query($connection, $query);

      echo header("Location:appointment.php");
  }
?>