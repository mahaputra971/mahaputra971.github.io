<?php 
 global $conn;
 mysqli_query($conn, "DELETE FROM log");
 return mysqli_affected_rows($conn);
 echo "
         <script>
             alert('data berhasil dihapus!');
             document.location.href = 'index.php';
         </script>
     ";
?>