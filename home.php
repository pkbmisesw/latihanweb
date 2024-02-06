<?php
include 'config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: index.php');
}
?>

<h1><p>welcome <?php echo $_SESSION['email']; ?></p></h1>
<br><a href="logout.php">Logout</a>


<style>
table, td, th {
	border:1px solid black;
	border-collapse: collapse;
}
</style>

<br>
<table>
<a href="tambah.php">Tambah</a>
<caption>Nama Mahasiswa</caption>
<tr>
<th>No</th>
<th>Nama</th>
<th>email</th>
<th>Aksi</th>
</tr>

<?php
$count = 1;			   
$sql = $conn->prepare("SELECT * FROM pengguna ORDER BY id DESC");
$sql->execute();
while($data=$sql->fetch()) {
?>

	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $data['nama'];?></td>
		<td><?php echo $data['email'];?></td>
		<td>
		<a href="edit.php?id=<?php echo $data['id']?>">Edit</a>
		<a onclick="return confirm('are you want deleting data')" href="pg_proses.php?op=hapus&id=<?php echo $data['id']; ?>">❌</a>
		</td>
	</tr>

<?php
$count=$count+1;
} 
?>

</table>
