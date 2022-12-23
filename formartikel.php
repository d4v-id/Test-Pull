<?php
    include 'koneksi.php';
    error_reporting(0);
if(isset($_GET['isian'])){
	
                        include "koneksi.php"; //
                        $sql="SELECT * FROM tbkategori order by kategori asc";
                        $sql1=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        $hitung=mysqli_num_rows($sql1);
                        if ($hitung==0) {
                            echo "<SCRIPT type='text/javascript'>
                            alert('Kategori Tidak Boleh Kosong');
                            window.location.replace(\"index.php\");
                            </SCRIPT>";
                            exit();
                        }

	
?>
    <form name="formartikel" action="formartikel.php" method="post">
        <table width="738" border="0" cellspacing="5" cellpadding="1" bgcolor="#E54346">
            <tbody>
                <tr>
                    <td colspan="3" align="center">FORMULIR ARTIKEL</td>
                </tr>
                <tr>
                    <td width="255">Kategori</td>
                    <td width="29"></td>
                    <td width="400">
                        <select name="idkategori">
                            <?php
                                while($data=mysqli_fetch_array($sql1)){
                            ?>
                                    <option value="<?php echo $data['idkategori'];?>"><?php echo $data['kategori'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>Pengirim</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="pengirim"></td>
                </tr>
                <tr>
                    <td valign="top">Isi</td>
                    <td>&nbsp;</td>
                    <td><textarea name="isi" cols="100" rows="20"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="key" id="submit" value="Submit"></td>
                </tr>
            </tbody>
        </table>
    </form>
<?php
    }
?>

<?php
    if(isset($_GET['edit']) == 1){
?>
    <form name="formartikel" action="formartikel.php" method="post">
        <table width="738" border="0" cellspacing="5" cellpadding="1" bgcolor="#E54346">
            <tbody>
                <tr>
                    <td colspan="3" align="center">FORMULIR ARTIKEL</td>
                </tr>
                <tr>
                    <?php
                        //include "koneksi.php";
                        $sql11="SELECT * FROM tbkategori order by kategori asc";
                        $sql111=mysqli_query($conn,$sql11) or die(mysqli_error($conn));
                    ?>
                    <td width="255">Kategori</td>
                    <td width="29"></td>
                    <td width="400">
                        <select name="idkategori">
                            <?php
                                while($datax=mysqli_fetch_array($sql111)){
                            ?>
                                    <option value="<?php echo $datax['idkategori'];?>"><?php echo $datax['kategori'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <?php
                    $arti = "SELECT * FROM tbartikel WHERE idartikel={$_GET['idartikel']} order by idartikel asc";
                    $qarti=mysqli_query($conn,$arti) or die(mysqli_error($conn));
                    $darti=mysqli_fetch_array($qarti);
                ?>
                <tr>
                    <td>Judul</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="judul" value="<?php echo $darti['judul'];?>"></td>
                </tr>
                <tr>
                    <td>Pengirim</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="pengirim" value="<?php echo $darti['pengirim']; ?>"></td>
                </tr>
                <tr>
                    <td valign="top">Isi</td>
                    <td>&nbsp;</td>
                    <td><textarea name="isi" cols="100" rows="20"><?php echo $darti['isi'];?></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <input type="hidden" name="idartikel" placeholder="Isikan Artikel" size="80" value="<?php echo $darti['idartikel'];?>">
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="formku1" id="submit" value="Submit"></td>
                </tr>
            </tbody>
        </table>
    </form> 
<?php
    }
?>

<?php
    $tanggal=date("d-m-Y");
    $waktu=date("h:i:s");

    if(isset($_POST['key'])){
    $sql = "INSERT INTO tbartikel(idkategori,judul,pengirim,isi,tanggal,waktu) VALUES ('{$_POST['idkategori']}','{$_POST['judul']}','{$_POST['pengirim']}','{$_POST['isi']}','$tanggal','$waktu')";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "<SCRIPT type='text/javascript'>
        alert('Tambah Artikel Sukses');
        window.location.replace(\"index.php\");
        </SCRIPT>";
        exit();
    }
?>

<?php
    if(isset($_POST['formku1'])){
    $tanggal=date("d-m-Y");
    $waktu=date("h:i:s");

    
    $sql = "UPDATE tbartikel set idkategori='{$_POST['idkategori']}',judul='{$_POST['judul']}',pengirim='{$_POST['pengirim']}',isi='{$_POST['isi']}',tanggal='$tanggal',waktu='$waktu' WHERE idartikel='{$_POST['idartikel']}'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "<SCRIPT type='text/javascript'>
        alert('Ubah Artikel Sukses');
        window.location.replace(\"index.php\");
        </SCRIPT>";
        exit();
    }
?>

<?php
    if(isset($_GET['delete']) == 1){
    $sql = "DELETE FROM tbartikel WHERE idartikel={$_GET['idartikel']}";
    $data=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "<SCRIPT type='text/javascript'>
        alert('Hapus Artikel Sukses');
        window.location.replace(\"index.php\");
        </SCRIPT>";
        exit();
    }

?>