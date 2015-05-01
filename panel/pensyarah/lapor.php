<!DOCTYPE html>
<html>
<head>
  <title>Lapor Kesalahan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../../css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../../css/flat-ui.min.css" rel="stylesheet">
    <link href="../../css/custom.css" rel="stylesheet">
</head>
<body>
<!-- navbar -->
      <div class="row">
        <div class="col-xs-12">
          <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href="#">SLKPKH</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">
                <li  class="active"><a href="#">LAPOR KESALAHAN</a></li>
                <li><a href="rekod.php">REKOD KESALAHAN</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                  <a href="#LINK-TO-VIEW-PROFIL" class="dropdown-toggle" data-toggle="dropdown">Nama Pensyarah <b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="#LINK-TO-VIEW-PROFILE">View Profile</a></li>
                    <li><a href="#LINK-TO-EDIT-ACCOUNT">Edit Account</a></li>
                    <li class="divider"></li>
                    <li><a href="#LINK-TO-LOGOUT">Logout</a></li>
                  </ul>
                </li>
              </ul>

            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div> <!-- /row -->
      <div class="container">
        <div class="row">
        <h3>Lapor Kesalahan</h3>
        </div>
        <div class="row">
          <form>
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="nomatrik">Cari Pelajar:</label>
            <div class="input-group">
              <input type="text" name="nomatrik" class="form-control" placeholder="Nombor matrik">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Cari</button>
              </span>
            </div><!-- /input-group -->
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="" placeholder="Nama Pelajar" class="form-control" />
            <label for="nama">Nombor tentera:</label>
            <input type="text" name="notentera" value="" placeholder="Nombor tentera" class="form-control" />
            <label for="nama">Pengambilan:</label>
            <input type="text" name="pengambilan" value="" placeholder="Pengambilan" class="form-control" />
            <label for="nama">Mata Pelajaran:</label>
            <input type="text" name="kos" value="" placeholder="Mata pelajaran" class="form-control" />
            <label for="nama">Tarikh:</label>
            <input type="date" name="tarikh" value="" class="form-control" />
            <label for="nama">Masa:</label>
            <input type="time" name="masa" value="" class="form-control" />
            <label for="nama">Nama Penasihat Akademik:</label>
            <input type="text" name="penasihat" value="" placeholder="Nama Penasihat Akademik" class="form-control" />
            <label for="nama">Kesalahan:</label>
            <select name="kesalahan" class="form-control" >
                  <option value="1">Tidak hadir kuliah / tutorial / amali / penilaian akademik tanpa sebab munasabah</option>
                  <option value="2">Lapor sakit Attend B, tetapi tidak hadir kuliah / tutorial / amali / penilaian akademik</option>
                  <option value="3">Tidur sewaktu kuliah / tutorial / amali / penilaian akademik</option>
                  <option value="4">Terlewat masuk kelas kuliah / tutorial / amali / penilaian akademik</option>
                  <option value="5">Menipu/meniru dalam penilaian akademik</option>
                  <option value="6">Keputusan penilaian akademik tidak memuaskan</option>
                  <option value="7">Lain-lain...(sila nyatakan)</option> 
          </select>
            <label for="nama">Keterangan/Catatan:</label>
            <input type="text" name="keterangan" value="" placeholder="Keterangan" class="form-control" />
            <hr>
            <input type="checkbox" name="pengesahan" value="Pengesahan">
            Saya akui bahawa laporan yang dibuat adalah benar.<br>
            <input type="submit" name="lapor" value="Submit" class="btn btn-primary">

          </div>
        </div>
          </form>
        </div>
      </div>
<!-- end navbar -->
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>