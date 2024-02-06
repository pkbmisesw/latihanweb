<?php
include 'config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['username'])== 0) {
	header('Location: index.php');
}
?>

<h1><p>welcome <?php echo $_SESSION['username']; ?></p></h1>

                 <br><a href="logout.php">Logout</a>

                <?php
				$id = $_GET['id']; 
                $sql = "SELECT * FROM pengguna WHERE id = $id ORDER BY id DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch();
                ?>

				<h3>Silahkan Edit</h3>
                <form action="pg_proses.php?op=edit" method="post"  enctype="multipart/form-data" class="form-horizontal">

                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                  
				  <label>Nama</label>
                 <input type="text" placeholder="Nama" name="nama" value="<?php echo $row['nama']; ?>">
				 
				 <br>
				 
				 <label>username</label>
                 <input type="text" placeholder="Username" name="username" value="<?php echo $row['username']; ?>">
                  
				  <br>
                  
                      <button type="submit" >Update</button>
                    </div>
                  </div>
                </form>
