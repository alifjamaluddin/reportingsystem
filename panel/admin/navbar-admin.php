<!-- navbar -->
      <div class="row">
        <div class="col-xs-12">
          <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href="./">SLKPKH</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="pengguna.php">PENGGUNA</a></li>
                <li><a href="kadet.php">PEGAWAI KADET</a></li>
                <li><a href="laporan.php">LAPORAN</a></li>
                <li><a href="kesalahan.php">KESALAHAN</a></li>
                <li><a href="hukuman.php">HUKUMAN</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                  <a href="#LINK-TO-VIEW-PROFIL" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['MM_UserName'];
?>
<b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="./">View Profile</a></li>
                    <li><a href="edit_profile.php">Edit Account</a></li>
                    <li class="divider"></li>
                    <li><a href="../../logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>

            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div> <!-- /row -->
<!-- end navbar -->