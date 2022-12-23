<?php
require_once 'koneksi.php';
?>

<!doctype html>
<html>
<head>
        <meta http-equiv = "Content-type" content = "text/html; charset = utf-8"/>
        <title>REKAYASA APLIKASI INTERNET</title>
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
        <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <link href="vendors/normalize-css/normalize.css" rel="stylesheet">
        <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="vendors/bootstrap-daterangepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        
        <!--Datatables-->
        <script src="datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="datatables.net-responsive-bs/js/responsive.bootstrap.js"></script><!-- -->
        <script src="datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        
        <style type = "text/css">
        body, td, th{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }
        body{
            background-color: #787575;
        }
        a:link{
            color: #000;
            text-decoration: none;
        }
        a:visited{
            text-decoration: none;
            color: #000;
        }
        a:hover{
            text-decoration: none;
            color: #9C0;
        }
        a:active{
            text-decoration: none;
        }
        a{
            font-size: 12px;
        }
        </style>
<title>BERITA</title>
</head>

<body>

<table width="100%" align="center" cellpadding="0" cellspacing="3">
   <tr>
       <th height="200" colspan="2" bgcolor=#E5ED91>
		<center>
	     <h1>PENULISAN ARTIKEL</h1>
		 <h2>MATA KULIAH PEMROGRAMAN WEB</h2>
		 <h3>Prodi Rekayasa Perangkat Lunak</h3>
		</center>
	   </th>
   </tr>
   <tr>
       <th height="8" colspan="2" bgcolor="yellow">
		<center>
	       <h4>Nama : David Win Syarif Hidayat - NIM : 1201202002</h4>
		</center>
	   </th>
   </tr
   <tr>
       <td colspan="2" height="32" bgcolor=#F15A5D>
	       <table width="400" border="0" cellpadding="4" cellspacing="3">
		         <tr>
			          <td width="40%" align="center" valign="middle" bgcolor=#93DD4F><a href="index.php">HOME</a></td>
			          <td></td>
			          <td width="40%" align="center" valign="middle" bgcolor=#93DD4F><a target="_blank" href="ittelkom-sby.ac.id">OFFICIAL CAMPUS</a></td>
			          <td></td>
			     </tr>
		   
		   </table>
	   </td>
   </tr>
	<tr>
	     <td width="700" align="center" valign="top" bgcolor=#35E7C8>
			 
	       <table width="100%" border="1" cellpadding="1" cellspacing="1">
			   <tbody>
			       <tr>
				        <td align="center" height="35"><strong>DAFTAR KATEGORI</strong></td>
				   </tr>
				   <tr>
				        <td>
					        <script type="text/javascript" language="javascript">
							     $(document).ready(function(){
									 var dataTable=$('#record-grid').DataTable({
										 "processing":true,
										 "serverSide":true,
										 "order": [[0,"desc"]],
										 "ajax": {
											 url: "daftarkategori.php",
											 type: "post",
											 error : function(){
												 $(".record-grid-error").html("");
												 $("#record-grid").append('<tbody class=="record-grid-error"><tr><th colspan="14" >Data Tidak Ada</th></tr></tbody>');
												 $("#record-grid-processing").css("display", "none");
											 }
										 }
									 });
								 });
							</script>
							<table id="record-grid" class="table table-striped table-bordered" summary="Rekaman">
							    <thead>
								   <tr>
									   <td>ID KATEGORI</td>
									   <td>KATEGORI </td>
									   <td>AKSI</td>
									</tr>
								</thead>
								<tbody>
								      <?php
									     $sql1="SELECT * FROM tbkategori order by idkategori asc";
									     $data1=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
									     while($datakate=mysqli_fetch_array($data1)){
										?>
									      
									        <tr>
									               <td><?php echo $datakate['idkategori'];?></td>
									               <td><?php echo $datakate['kategori'];?></td>
									               <td><a href=formkategori.php?edit=1&idkategori=<?php echo $datakate['idkategori']; ?>>EDIT</a> - 
									               <a href=formkategori.php?delete=1&idkategori=<?php echo $datakate['idkategori']; ?>>DELETE</a> -
                                                   <a href=detailkategori.php?detail=1&idkategori=<?php echo $datakate['idkategori']; ?>>DETAIL</a>
                                                   </td>
									        </tr>
									      
									    <?php
										 }
									    ?>
									  
								</tbody>
							</table>
					    </td>
				   </tr>
			   </tbody>  
		    </table>		
		 </td>
	</tr>
	
<!-- INI ADALAH BATAS KATEGORI DAN ARTIKEL -->
     <tr>
        <td width="687" align="center" valign="top" bgcolor="#FFFFFF"><br/>
                    <table width="100%" border="1" cellpadding="1" cellspacing="1">
                        <tbody>
                            <tr>
                                <td align="center" height="35"><strong>DAFTAR PUBLIKASI</strong></td>
                            </tr>
                            <tr>
                                <td align="center" height="35"><strong>IMPORT EXCEL <a target="_blank" href="formimport.php">IMPORT LINK</td>
                            </tr>
                            <tr>
                                <td>
                                    <script type="text/javascript" language="javascript">
                                        $(document).ready(function(){
                                            var dataTable = $('#record-grid1').DataTable({
                                                "processing": true,
                                                "serverSide": true,
                                                "order": [[0, "desc"]],
                                                "ajax":{
                                                    url: "daftarartikel.php", //json datasource
                                                    type: "post", //method, bydefault get
                                                    error: function(){ //error handling
                                                        $(".record-grid-error").html("");
                                                        $("#record-grid").append('tbody class="record-grid-error"><tr><th colspan="14">Data tidak Ditemukan</th></tr></tbody>');
                                                        $("#record-grid_processing").css("display","none");
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                    <table id="record-grid1" class="table table-striped table-bordered" summary="Rekaman">
                                        <thead>
                                            <tr>
                                                <th>IDKATEGORI</th>
                                                <th>IDARTIKEL</th>
                                                <th>JUDUL</th>
                                                <th>PENGIRIM</th>
                                                <th>ISI</th>
                                                <th>TANGGAL</th>
                                                <th>WAKTU</th>
                                                <th>OPERASI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM tbartikel order by idartikel asc";
                                                $data = mysqli_query($conn,$sql) or die (mysqli_error($conn));
                                                while($dataku = mysqli_fetch_array($data)){
                                            ?>
                                                    <tr>
                                                        <td><?php echo $dataku['idkategori']; ?></td>
                                                        <td><?php echo $dataku['idartikel']; ?></td>
                                                        <td><?php echo $dataku['judul']; ?></td>
                                                        <td><?php echo $dataku['pengirim']; ?></td>
                                                        <td><?php echo $dataku['isi']; ?></td>
                                                        <td><?php echo $dataku['tanggal']; ?></td>
                                                        <td><?php echo $dataku['waktu']; ?>
                                                        <td><a href=formartikel.php?edit=1&idartikel=<?php echo $dataku['idartikel']; ?>>Edit</a> - 
                                                            <a href=formartikel.php?delete=1&idartikel=<?php echo $dataku['idartikel']; ?>>Delete</a> -
                                                            <a href=detailartikel.php?detail=1&idartikel=<?php echo $dataku['idartikel']; ?>>Detail</a></td>
                                                    </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table><br>
                </td>
            </tr>
            <tr>
                <td height="35" colspan="2" align="center" valign="middle" bgcolor="#00CCFF">
                    <table width="400" border="0" cellpadding="4" cellspacing="3">
                        <tr>
                            <td width="20%" height="23" align="center" valign="middle" bgcolor="#0D47CD">
                                <a href="formkategori.php?isian=1">Isi Data Formulir Kategori</a>
                            </td>
                            <td width="20%" align="center" valign="middle" bgcolor="#0D47CD">
                                <a href="formartikel.php?isian=1">Isi Data Formulir Artikel</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="35" colspan="2" align="center" valign="middle" bgcolor="#00CCFF">
                    <table width="400" border="0" cellpadding="4" cellspacing="3">
                        <tr>
                            <td width="20%" height="23" align="center" valign="middle" bgcolor="green">
                                <a href="export_excel.php"><strong>Export Form Kategori to Excel</strong></a>
                            </td>
                            <td width="20%" align="center" valign="middle" bgcolor="green">
                                <a href="export_pdf.php"><strong>Export Form Artikel to PDF</strong></a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="35" colspan="2" align="center" valign="middle" bgcolor="#00CCFF">
                    <table width="400" border="0" cellpadding="4" cellspacing="3">
                        <tr>
                            <td width="20%" height="23" align="center" valign="middle" bgcolor="yellow">
                                <a href=hapussemuakategori.php?delete=2>Hapus Semua Kategori</a>
                            </td>
                            <td width="20%" align="center" valign="middle" bgcolor="yellow">
                                <a href=hapussemuaartikel.php?delete=2>Hapus Semua Artikel</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="100" colspan="2" align="center" valign="middle" bgcolor="#00CCFF">Rekayasa Aplikasi Internet, &copy; 2022.
                    <a href="index.php"> Oleh : <br> Prodi Rekayasa Perangkat Lunak <br> ITTelkom Surabaya 2022</a>
                </td>
            </tr>
        </table>
    </body>
</html>