<!DOCTYPE html>
<html>
<head>
  <title>Ketua Batalion</title>
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
                <li class="active"><a href="semak.php">SEMAK LAPORAN</a></li>
                <li><a href="rekod.php">REKOD HUKUMAN</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                  <a href="#LINK-TO-VIEW-PROFIL" class="dropdown-toggle" data-toggle="dropdown">Nama KB <b class="caret"></b></a>
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
<!-- end navbar -->
  <div class="container">
        <div class="row">
        <h3>Kemaskini Semakan Laporan</h3>
        </div>
        <div class="row">
          <form>
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="noid">ID Laporan:</label>
            <p>ALK0141</p>
            
            <label for="nama">Nombor tentera</label>
            <p>375296</p>
            
            <label for="nomatrik">Nama:</label>
            <p>Nur Siti Binti Ali</p>
            
           <label for="pengambilan">Kesalahan:</label>
           <p>Tidak hadir</p>

            <label for="pa">Status:</label>
            <select name="level" class="form-control" >
                  <option value="1">Diterima</option>
                  <option value="2">Disemak</option>
                  <option value="3">Dilaksanakan</option>
          </select>
            <label for="pa">Hukuman:</label>
            <select name="level" class="form-control" >
                  <option value="1">Kawad tambahan</option>
                  <option value="2">Tahanan cuti</option>
                  <option value="3">Buang pangkat</option>
          </select>
            <label for="pa">Catatan:</label>
            <input type="text" name="noid" value="" placeholder="Penasihat akademik" class="form-control" />
            
            <hr>
            <input type="submit" name="daftar" value="Update" class="btn btn-primary">


          </div>
        </div>
          </form>
        </div>
      </div>
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>