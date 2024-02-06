<?php
ini_set('display_errors', 0);
	include "config.php";
	session_start();

$op = $_GET['op'];
if($op == "edit"){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
        $username = $_POST['username'];
	  	
        try {
          $sql = "UPDATE pengguna SET 
            nama = :nama, 
            username = :username 
			WHERE id = $id" 
             
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':username', $username);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Data telah dirubah'); document.location.href=('home.php')</script>";
		}else{
			echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('home.php')</script>";
		}
} else if($op == "hapus"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM pengguna WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('home.php')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('home.php')</script>";
		}

}