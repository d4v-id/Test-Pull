
<?php
    include 'koneksi.php';
    if (isset($_GET['isian'])){
?>
        <form name="formku1" action="formkategori.php" method="post">
            <table align="center" width="900" border="0" cellpadding="10" cellspacing="1" bgcolor="#D73336">
                <tbody>
                    <tr>
                        <td colspan="3" height="50" align="center">ISIAN KATEGORI</td>
                    </tr>
                    <tr>
                        <td width="20%">Kategori</td>
                        <td width="5%">:</td>
                        <td width="75%"><input type="text" name="kategori" placeholder="Isian Kategori" size="80"></td>
                    </tr>
                    <tr>
                        <td colspan="3" height="35" align="center"><input type="submit" name="fkategori" value="Submit"><input type="reset"></td>
                    </tr>
                </tbody>
            </table>
        </form>
<?php
    }
?>

<?php
    if (isset($_POST['fkategori'])) {
    $sql = "INSERT INTO tbkategori(kategori) VALUES ('{$_POST['kategori']}')";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));

    echo "<SCRIPT type='text/javascript'>
        alert('Tambah Kategori Sukses');
        window.location.replace(\"index.php\");
        </SCRIPT>";
        exit();
    }
?>

<?php
    if(isset($_GET['edit']) == 1){
        $sql = "SELECT * FROM tbkategori WHERE idkategori = $_GET[idkategori]";
        $data = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $cek = mysqli_fetch_array($data);
?>
        <form name="formku1" action="formkategori.php" method="post">
            <table align="center" width="900" border="0" cellpadding="10" cellspacing="1" bgcolor="#D73336">
                <tbody>
                    <tr>
                        <td colspan="3" height="50" align="center">ISIAN KATEGORI EDIT</td>
                    </tr>
                    <tr>
                        <td width="20%">Kategori</td>
                        <td width="5%">:</td>
                        <td width="75%"><input type="text" name="kategori" placeholder="Isikan Kategori" size="80" value="<?php echo $cek['kategori'];?>"></td>
                    </tr>
                    <input type="hidden" name="idkategori" placeholder="Isikan kategori" size="80" value="<?php echo $cek['idkategori'];?>">
                    <tr>
                        <td colspan="3" height="35" align="center"><input type="submit" name="fkategori1" value="Submit"><input type="reset"></td>
                    </tr>
                </tbody>
            </table>
        </form>
<?php
    }
?>

<?php
    if (isset($_GET['idkategori']) && ($_GET['delete']==1)) {		
	
    $sql = "DELETE FROM tbartikel WHERE idkategori={$_GET['idkategori']}";
    $data=mysqli_query($conn,$sql) or die(mysqli_error($conn));		
    $sql = "DELETE FROM tbkategori WHERE idkategori={$_GET['idkategori']}";
    $data=mysqli_query($conn,$sql) or die(mysqli_error($conn));		
		
    echo "<SCRIPT type='text/javascript'>
        alert('Hapus Kategori Sukses');
        window.location.replace(\"index.php\");
        </SCRIPT>";
        exit();
    }
?>


<?php
    if(isset($_POST['fkategori1'])){
    $sql = "UPDATE tbkategori set kategori='{$_POST['kategori']}' WHERE idkategori='{$_POST['idkategori']}'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "<SCRIPT type='text/javascript'>
        alert('Ubah Kategori Sukses');
        window.location.replace(\"index.php\");
        </SCRIPT>";
        exit();
    }
?>