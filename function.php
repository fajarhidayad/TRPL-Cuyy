<?php 
	//koneksi ke database
$conn = mysqli_connect("localhost","root","","trpl");

function query($query){
	global $conn;
	$result=mysqli_query($conn, $query);
	$rows=[];
	while ($row =mysqli_fetch_assoc($result)) {
		# code...
		$rows[]=$row;
	}
	return $rows;

}
function pendaftaran($data){
	global $conn;

	$email = strtolower(stripslashes($data["email"]));
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$alamat = strtolower(stripslashes($data["alamat"]));
	$tanggal_lahir = strtolower(stripslashes($data["tanggal_lahir"]));
	$kartu_kredit = strtolower(stripslashes($data["kartu_kredit"]));
	$telepon = strtolower(stripslashes($data["telepon"]));
	$foto = strtolower(stripslashes($data["foto"]));

	//cek apakah nama yang dimasukkan sudah ada atau belum
	

	//cek password sama dengan konfirmasi password
	// if ($password !== $password2) {
	// 	# code...
	// 	echo "<script>
 //               alert('Password anda tidak sesuai')
	// 	</script>";
	// 	return false;
	// }

	//enkripsi password
	$password=password_hash($password,PASSWORD_DEFAULT);

	//masukkan user baru
	$query = "INSERT INTO user VALUES ('','$email','$username','$password','alamat','tanggal_lahir','$kartu_kredit','$telepon','foto')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}


 ?>