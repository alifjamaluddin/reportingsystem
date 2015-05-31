<!DOCTYPE html>
<html>
<head>
	<title>Rekod Kesalahan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../../css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../../css/flat-ui.min.css" rel="stylesheet">
    <link href="../../css/custom.css" rel="stylesheet">
</head>
<body>
<?php include('navbar-dekan.php'); ?>

  <div class="container">
    <div class="row">
      <h3>Rekod Kesalahan</h3>
    </div>
    <div class="row">
      <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading">Senarai Rekod Laporan</div>
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
            <th>Status</th>
            <th>Catatan</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>ALK0141</td>
            <td>21/04/2015</td>
            <td>Disemak</td>
            <td></td>
          </tr>
           <tr>
            <th scope="row">2</th>
            <td>ALK0571</td>
            <td>1/05/2015</td>
            <td>Disemak</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>ALK0600</td>
            <td>3/05/2015</td>
            <td>Disemak</td>
            <td></td>
          </tr>


        </tbody>
      </table>
    </div>
    </div>
  </div>
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>