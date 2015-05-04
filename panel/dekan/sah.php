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
                <li  class="active"><a href="sah.php">PENGESAHAN LAPORAN</a></li>
                <li><a href="rekod.php">REKOD KESALAHAN</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                  <a href="#LINK-TO-VIEW-PROFIL" class="dropdown-toggle" data-toggle="dropdown">Nama Dekan <b class="caret"></b></a>
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
      <h3>Pengesahan Laporan</h3>
    </div>
    <div class="row">
      <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading">Senarai Laporan</div>
      <div class="panel-body">
        <!-- <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> -->
      </div>

      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>ID Laporan</th>
            <th>Tarikh</th>
            <th>Catatan</th>
            <th>Pengesahan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>ALK0141</td>
            <td>21/04/2015</td>
            <td></td>

            <td>
              <a href="#terima" class="btn btn-primary">Sahkan</a>
              <a href="#batal" class="btn btn-danger">Batal</a>
            </td>
          </tr>
           <tr>
            <th scope="row">2</th>
            <td>ALK0571</td>
            <td>1/05/2015</td>
             <td></td>

            <td>
              <a href="#terima" class="btn btn-primary">Sahkan</a>
              <a href="#batal" class="btn btn-danger">Batal</a>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>ALK0600</td>
            <td>3/05/2015</td>
             <td></td>

            <td>
              <a href="#terima" class="btn btn-primary">Sahkan</a>
              <a href="#batal" class="btn btn-danger">Batal</a>
            </td>
          </tr>


        </tbody>
      </table>
    </div>
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