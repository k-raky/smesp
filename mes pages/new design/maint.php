<?php

        function Connect()
        {
            $servername = "bejunitqknwdzbyfqz0y-mysql.services.clever-cloud.com";
            $username = "ulsartcj6ukxsuwr";
            $password = "fYEPeEbAu9sTiAzv276j";
            $dbname = "bejunitqknwdzbyfqz0y";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            echo "<script>alert(erreur de connexion : $conn->connect_error)</script>";
            }
            return $conn;
        }
        
      
        function getTaches()
        {            
            $conn=Connect();
            $query = "SELECT * FROM taches";
            $result = mysqli_query($conn,$query); 
            if (!$result) {
                echo "<script>alert(erreur de requete : $conn->error)</script>";
            }
            return $result;
        }

        function getTachesService($service)
        {
            $conn=Connect();

            $query = "SELECT * FROM taches where type='$service'";
            $result = mysqli_query($conn,$query); 
            if ($result) {
                return $result;
            } 
            else {
            echo "<script>alert(erreur de requete : $conn->error)</script>";
            }
        }

        function getTechService($service)
        {              
            $conn=Connect();

            $query3 = "SELECT * FROM technicien where service='$service'";
            $result3 = mysqli_query($conn,$query3); 
            if ($result3) {
                return $result3;
            } 
            else {
            echo "<script>alert(erreur de requete : $conn->error)</script>";
            }
        }

        

        if(isset($_POST['attribuerService'])){ 

            $conn=Connect();

            $currentref=$_POST['currentref'];
            $service=$_POST['service']; 
            echo "<script>alert($service)</script>";
            $query2 = "update taches set statut='EN ATTENTE',type='$service',delai=1 where ref=$currentref";
            $result2 = mysqli_query($conn,$query2); 
            if ($result2) {
            echo "<script>alert('Tache attribuee au service $service')</script>";
            echo "<script>location.href='demandemaint.php';</script>";
            } 
            else {
            echo "<script>alert(erreur de requete : $conn->error)</script>";
            }
            unset($_POST);
        }


        if(isset($_POST['attribuerTech'])){ 

            $conn=Connect();

            $currentref=$_POST['currentref'];
            $idtechnicien=$_POST['idtech']; 

            $query2 = "update taches set statut='EN COURS',idtech='$idtechnicien',delai=1 where ref=$currentref";
            $result2 = mysqli_query($conn,$query2); 
            if ($result2) {
            echo "<script>alert('Tache attribuee au technicien $idtechnicien')</script>";
            echo "<script>location.href='demandeservice.php';</script>";
            } 
            else {
            echo "<script>alert(erreur de requete : $conn->error)</script>";
            }
            unset($_POST);
        }


        function getTech($id)
        {
            $conn=Connect();
        
            $query3 = "select * from technicien where idTechnicien='$id'";
            $result3 = mysqli_query($conn,$query3); 
            if ($result3) {
            $row2=mysqli_fetch_row($result3);
            return $row2;
            } 
            else {
            echo "<script>alert(erreur de requete : $conn->error)</script>";
            }
            
        }
?>