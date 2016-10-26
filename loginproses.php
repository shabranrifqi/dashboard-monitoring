<?php
$user = $_POST['username'];
$password = $_POST['password'];

if (empty($user) || empty($password)) {
include("login.php");
}
else{

	include "koneksi.php";
    $sql = mysqli_query($koneksi,"SELECT * FROM t_user WHERE username='$user' AND password='$password'");

    if(mysqli_num_rows($sql) == 0){//jika berhasil akan bernilai 1
    	session_start();
        $qry = mysqli_fetch_assoc($sql);
        $_SESSION['user'] = $qry['username'];
        $_SESSION['level'] = $qry['level'];
        if(!empty($qry['level'])){
            header("location: index.php");
        }
        
    }
    else{
		?>
		<script language="JavaScript">
			alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
			document.location='login.php';
		</script>
		<?php
    }
}
?>



