<?php 
include 'config.php'; // panggil perintah koneksi database 
if(!isset($_SESSION['email'] )== 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
    header('Location: index.php');
}

if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
    $email = $_POST['email']; // isi varibel dengan mengambil data email pada form
    $password = $_POST['password']; // isi variabel dengan mengambil data password pada form

    try {
        $sql = "SELECT * FROM pengguna WHERE email = :email AND password = :password"; // buat queri select
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute(); // jalankan query

        $count = $stmt->rowCount(); // mengecek row
        if($count == 1) { // jika rownya ada 
            $_SESSION['email'] = $email; // set sesion dengan variabel email
            header("Location: home.php"); // lempar variabel ke tampilan index.php
            return;
        }else{
            echo "Anda tidak dapat login";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<!-- FORM LOGIN -->
<h2>Silahkan Login</h2>

<form action="" method="post">
    <table>
        <tr>
            <td>email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="Login">
            </td>
        </tr>
    </table>
</form>
<a href="daftar.php"><button>Register</button></a>