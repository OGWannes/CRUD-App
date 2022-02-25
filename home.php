<?php 
include_once 'valid.php';
include_once 'ajoute.php';

if(isset($_SESSION['role'])){

  if($_SESSION['role'] != 'admin'){
    header('location: login.php');

  }
  
}else{
  header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HACO Shipyard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/download.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/styleness.css" rel="stylesheet">
  <style>



ol {list-style-type: katakana-iroha;}

button{
border: none;
color: white;
padding: 2px 22px;
border-radius: 8px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}

.button1{
  background-color: #f44336;;
}
.button2{
  background-color: #008CBA;
}

 
</style>

  <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/logo.png" alt="" class="img-fluid">
        <h1 class="text-light"><a href="home.php">CATANA GROUPE</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://www.facebook.com/haco.production/" class="facebook"><i class="bx bxl-facebook"></i></a>
		  <a href="https://www.instagram.com/bali.catamarans/" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="x².php#home" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Home</span></a></li>
		      <li><a href="#consult" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Consulté</span></a></li>
          <li><a href="#ajout" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Add Employe</span></a></li>
          <li><a href="show.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Voir Tout</span></a></li>
          <li><a href="showA.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Voir Liste Active</span></a></li>
          <li><a href="showP.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Voir Liste Rouge</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Bienvenue HACO Administrateur</h2> 
          <?php echo date("d/m/Y"); ?>
			  <?php echo date("h:i:s");?> 
          <ol>

            <li><strong><button type="button" class="button1"><a href="logout.php" class="text-light">Leave</a></button></strong></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

	<section id="home" class="d-flex flex-column justify-content-center align-items-center">
    <div class="home" data-aos="fade-in">
      <h1>Haco Shipyard</h1>
    <center><span class="typed" data-typed-items="BALI,Catana"></span></center>
    </div>
  </section>
  </main><!-- End #main -->

  <main id="main">
  <section id="consult" class="consult">
      <div class="container">

        <div class="section-title">
          <h2>Consulté</h2>
          <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" placeholder="Nom/CIN/MAT" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
		  <table class="table">
  <thead>
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">CIN</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Status</th>
      <th scope="col"><center>Action</center></th>
    </tr>
  </thead>
  <tbody>
      <?php 
      if (isset($_GET['search'])) {
          $filtervalues = $_GET['search'];
          $query = "SELECT * FROM persone WHERE CONCAT (Mat,Nom,CIN) LIKE '%$filtervalues%' ";
          $query_run = mysqli_query($con, $query);

          if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $items) {
                  ?>
                  <tr>
                      <td><?= $items['Mat']; ?></td>
                      <td><?= $items['CIN']; ?></td>
                      <td><?= $items['Prenom']; ?></td>
                      <td><?= $items['Nom']; ?></td>
                      <?php $mat=$items['Mat'];
                  $req="SELECT Status FROM hacodata where Mat='$mat'";
                  $que = mysqli_query($con, $req);
                  while ($row=mysqli_fetch_assoc($que)) {
                      $status=$row['Status'];
                  }
                  if ($status=="Active") {
                      echo '<td><b><font color="Green">'.$status.'</font></b></td>';
                  } else {
                      echo '<td><b><font color="red">'.$status.'</font></b></td>';
                  } ?>
                      <td> <center><button type="button" class="btn btn-info"><?php echo '<a href="view.php?viewid='.$items['Mat'].'" class="text-light">FicheSignalitique</a>'?></button>
                        <button class="btn btn-primary"><?php echo '<a href="update.php?updateid='.$items['Mat'].'" class="text-light">Mise a jour</a>'?></button> 
                           <button class="btn btn-danger"><?php echo '<a href="delete.php?deleteid='.$items['Mat'].'"  class="text-light">Delete</a> '?></button> 
		                       
                           </center></td>
                  </tr>
                  <?php
              }
          } else {
              ?>
                  <tr>
                      <td colspan="4">No Record Found</td>
                  </tr>
              <?php
          }
      }?>
          </tr>

  </tbody>
</table>


        </div>

        
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= About Section ======= -->
	<section id="ajout" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Ajout d'Employé(e)</h2>
				<form id="addemployee" class="clearfix" method="POST" action="">
				<strong><div class="section_subtitle left">Données Personnel</div></strong>
			<form action="" id="manage_employee">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">MAT</label>
							<input type="text" name="mat" class="form-control form-control-sm" >
						</div>
            <div class="form-group">
							<label for="" class="control-label">CIN</label>
							<input type="text" name="cin" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Civilite</label>
							<select type="text" name="civil" class="form-control form-control-sm" >
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
                <option value="Mademoiselle">Mademoiselle</option>
              </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Prénom</label>
							<input type="text" name="prenom" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Nom</label>
							<input type="text" name="nom" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Date De Naissance</label>
							<input type="text" name="datenais" class="form-control form-control-sm" placeholder="dd-mm-yyyy" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Teléphone</label>
							<input type="text" name="phone" placeholder="12-345-678" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Adresse</label>
							<input type="text" name="address" class="form-control form-control-sm" >
            </div>
						<div class="form-group">
							<label for="" class="control-label">Situation Familiale</label>
							<select type="text" name="relationship" class="form-control form-control-sm" >
                <option value="Célebataire">Célebataire</option>
                <option value="Marié(e)">Marié(e)</option>
                <option value="divorcé(e)">divorcé(e)</option>
              </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Chef de Famille</label>
							<select type="text" name="cheff" class="form-control" >
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Nombre d'enfant</label>
							<select type="text" name="nbenfant" class="form-control form-control-sm" >
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">CNSS</label>
							<input type="text" name="CNSS" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">RIB</label>
							<input type="text" name="RIB" class="form-control form-control-sm" >
						</div>
					<strong><div class="section_subtitle left">Données HACO</div></strong>
					<hr/>
          <div class="form-group">
							<label for="" class="control-label">Status</label>
							<select type="text" name="emplostat" class="form-control form-control-sm" >
                <option value="Active">Active</option>
                <option value="Partant">Partant</option>
                <option value="Partant">Bloqué</option>
              </select>
						</div>
          <div class="form-group">
							<label for="" class="control-label">Emploi Occupe</label>
							<input type="text" name="jobtype" class="form-control form-control-sm" >
						</div>
            <div class="form-group">
							<label for="" class="control-label">Date d'embauche</label>
							<input type="text" name="dateemployed" class="form-control form-control-sm" placeholder="dd-mm-yyyy" >
						</div>
					<div class="form-group">
							<label for="" class="control-label">Type Contrat</label>
							<select type="text" name="typecontrat" class="form-control form-control-sm" >
                <option value="CDI">CDI</option>
                <option value="CDD">CDD</option>
                <option value="CIVP">CIVP</option>
                <option value="Karama">Karama</option>
              </select>
						</div>
					<div class="form-group">
							<label for="" class="control-label">DIR/IND</label>
							<select type="text" name="DIRIND" class="form-control form-control-sm" >
              <option value="DIR">DIR</option>
              <option value="IS">IS</option>
              <option value="IND/BAT">IND/BAT</option>
              </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Département</label>
							<input type="text" name="Depart" class="form-control form-control-sm" >
						</div>
            <div class="form-group">
							<label for="" class="control-label">Supérieure</label>
							<input type="text" name="sup" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Atelier</label>
							<input type="text" name="Atelier" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Catégorie</label>
							<input type="text" name="Categorie" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Type Salaire</label>
							<select type="text" name="Salaire" class="form-control form-control-sm" >
              <option value="Horaire">Horaire</option>
              <option value="Mensuelle en heure">Mensuelle en heure</option>
              <option value="Mensuelle">Mensuelle</option>
              </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Salaire de base Contrat</label>
							<input type="text" name="SalaireBC" class="form-control form-control-sm" >
						</div>
            <div class="form-group">
							<label for="" class="control-label">Salaire Net</label>
							<input type="text" name="salairenet" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Salaire de base Grille</label>
							<input type="text" name="SalaireBG" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">CAT</label>
							<input type="text" name="CAT" class="form-control form-control-sm" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Echelon</label>
							<input type="text" name="Echelon" class="form-control form-control-sm" >
						</div>
            <div class="form-group">
							<label for="" class="control-label">Fin Contrat</label>
							<input type="text" name="finc" class="form-control form-control-sm" placeholder="dd-mm-yyyy" >
						</div>
            <div class="form-group">
							<label for="" class="control-label">Image(format PNG)</label>
							<input type="text" name="image" class="form-control form-control-sm" >
						</div>
            <div class="form-group">
							<label for="" class="control-label">Euro</label>
							<input type="text" name="nbrE" class="form-control form-control-sm" >
						</div>
    <br>
					<div class="input-box">
						<center><button type="submit" name="ajout" class="btn btn-primary mr-2">Ajouter</button></center>
						

					</div>
					
				</form>
				
        </div>

      </div>
    </section><!-- End About Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>HacoShipyard</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://www.linkedin.com/in/wannes-chayeb-4a61501a1/">Wannes Chayeb</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>