<?php

    $conn=mysqli_connect("localhost","raky","douze","smesp");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $query="Insert into demandes(date,nom,contact,fonction,type,priorite,cause) values('".date('d/m/Y')."','".$_POST['nom']."','".$_POST['contact']."','".$_POST['fonction']."','".$_POST['faille']."','".$_POST['priorite']."','".$_POST['cause']."')";

      $result=mysqli_query($conn,$query);

      if ($result) {
          echo "<script>location.href='demand.html';</script>";
      }
      else echo "Error: ".$conn->error;
?>