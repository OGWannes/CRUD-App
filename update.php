<?php 
include_once 'valid.php';

if(isset($_SESSION['role'])){

  if($_SESSION['role'] != 'admin'){
    header('location: login.php');

  }
  
}else{
  header('location: login.php');
}



$mat=$_GET['updateid'];
$sql="SELECT * FROM persone p , hacodata h , social s WHERE p.Mat=h.Mat and p.Mat=s.Mat and p.Mat='$mat'";
$res = mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($res)) {
    $mat=$row['Mat'];
    $prenom=$row['Prenom'];
    $nom=$row['Nom'];
    $civ=$row['Civilite'];
    $datenais=$row['DateNais'];
    $cin=$row['CIN'];
    $phone=$row['TEL'];
    $address=$row['Adresse'];
    $age=$row['Age'];
	  $tc=$row['typecontrat'];
    $emploi=$row['EmploiOcccupe'];
    $Dir=$row['DIRIND'];
    $dep=$row['departement'];
    $sup=$row['Sup'];
    $Att=$row['Attelier'];
    $Categ=$row['Categorie'];
    $ts=$row['TypeSalarie'];
    $sbc=$row['salariebasec'];
    $sbE=$row['salairebasecE'];
    $sbG=$row['salairebaseG'];
    $sbGE=$row['salairebaseGE'];
    $cat=$row['CAT'];
    $ech=$row['Echelon'];
    $dateemp=$row['DateEmb'];
    $finc=$row['FinContract'];
    $anc=$row['Anciente'];
    $datet=$row['datetitula'];
    $status=$row['Status'];
    $dateret=$row['dateret'];
    $sitf=$row['situation_f'];
    $cheff=$row['chef_f'];
    $nbenf=$row['nbr_enfant'];
    $CNSS=$row['CNSS'];
    $RIB=$row['RIB'];
	  $hist1=$row['hist'];
    $image=$row['image'];
    $salairenet=$row['salairenet'];
}
if(isset($_POST['update'])){
    $mat=$_POST['mat'];
    $civ=$_POST['civil'];
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $datenais=$_POST['datenais'];
    $cin=$_POST['cin'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $jobtype=$_POST['jobtype'];
    $dateemployed=$_POST['dateemployed'];
    $emplostat=$_POST['emplostat'];
    $relationship=$_POST['relationship'];
    $cheff=$_POST['cheff'];
    $nbenfant=$_POST['nbenfant'];
    $CNSS=$_POST['CNSS'];
    $RIB=$_POST['RIB'];
    $typecontrat=$_POST['typecontrat'];
    $DIRIND=$_POST['DIRIND'];
    $Depart=$_POST['Depart'];
    $Atelier=$_POST['Atelier'];
    $Categorie=$_POST['Categorie'];
    $Salaire=$_POST['Salaire'];
    $SalaireBC=$_POST['SalaireBC'];
    $SalaireBG=$_POST['SalaireBG'];
    $CAT=$_POST['CAT'];
    $Echelon=$_POST['Echelon'];
    $finc=$_POST['finc'];
	  $hist=$_POST['hist'];
    $image=$_POST['image'];
    $salairenet=$_POST['salairenet'];
    $sup=$_POST['sup'];
	
    if ($hist!="") {
      $t=date("d-m-y");
      $hist=$hist1."<br> Le ".$t." :- ".$hist;
    }else{
      $hist=$hist1;
    }


    $datey=$dateemployed;
	  $datenai = explode("-",$datenais);
    //get age from date or date$datenais
    $age = (date("md", date("U", mktime(0, 0, 0,$datenai[0],$datenai[1],$datenai[2]))) > date("md")? ((date("Y") -$datenai[2]) - 1): (date("Y") -$datenai[2]));
    $datenai = explode("-",$dateemployed);
    //get age from date or date$datenais
    $anc = (date("md", date("U", mktime(0, 0, 0,$datenai[0],$datenai[1],$datenai[2]))) > date("md")? ((date("Y") -$datenai[2]) - 1): (date("Y") -$datenai[2]));
    $dateret=date('d/m/Y', strtotime('+62 year', strtotime($datenais)) );
    $datett=date('d/m/Y', strtotime('+4 year',strtotime($datey)) );
    
    

    $sql="UPDATE  persone p , hacodata h , social s set p.Mat='$mat',Civilite='$civ',Nom='$nom',Prenom='$prenom',
    DateNais='$datenais',CIN='$cin',TEL='$phone',Adresse='$address',Age=$age,typecontrat='$typecontrat',EmploiOcccupe='$jobtype',
  	DIRIND='$DIRIND',departement='$Depart',Attelier='$Atelier',Categorie='$Categorie',TypeSalarie='$Salaire',salariebasec=$SalaireBC,
    salairebaseG=$SalaireBG,CAT='$CAT',Echelon='$Echelon',DateEmb='$dateemployed',
	  FinContract='$finc',Anciente='$anc',datetitula='$datett',Status='$emplostat',dateret='$dateret',situation_f='$relationship',
	  chef_f='$cheff',nbr_enfant='$nbenfant',CNSS='$CNSS',RIB='$RIB',hist='$hist',image='$image',salairenet=$salairenet,sup='$sup' WHERE p.Mat='$mat' and p.Mat=h.Mat and p.Mat=s.Mat";
    $res = mysqli_query($con,$sql);
    if($res){
        echo "<script> alert('Emplyoee updated')</script>";
        header('location:home.php');
    }else{
        echo "<script> alert('Error')</script>";
    }

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

  <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/logo.png" alt="" class="img-fluid">
        <h1 class="text-light"><a href="index.html">CATANA GROUPE</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://www.facebook.com/haco.production/" class="facebook"><i class="bx bxl-facebook"></i></a>
		  <a href="https://www.instagram.com/bali.catamarans/" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="home.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#Update" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Update Employe</span></a></li>
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

    <!-- ======= Update Section ======= -->
	<section id="Update" class="Update">
      <div class="container">

        <div class="section-title">
          <h2>Update d'Employé(e)</h2>
				<form id="addemployee" class="clearfix" method="POST" action="">
				<strong><div class="section_subtitle left">Données Personnel</div></strong>
			<form action="" id="manage_employee">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">MAT</label>
							<input type="text" name="mat" class="form-control form-control-sm" value="<?php echo $mat;?>"required>
						</div>
            <div class="form-group">
							<label for="" class="control-label">CIN</label>
							<input type="text" name="cin" class="form-control form-control-sm" value="<?php echo $cin;?>"required>
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
							<input type="text" name="prenom" class="form-control form-control-sm" value="<?php echo $prenom;?>"required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Nom</label>
							<input type="text" name="nom" class="form-control form-control-sm" value="<?php echo $nom;?>"required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Date De Naissance</label>
							<input type="text" name="datenais" class="form-control form-control-sm" placeholder="dd-mm-yyyy" value="<?php echo $datenais;?>"required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Teléphone</label>
							<input type="text" name="phone" placeholder="12-345-678" class="form-control form-control-sm" value="<?php echo $phone;?>"required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Adresse</label>
							<input type="text" name="address" class="form-control form-control-sm" value="<?php echo $address;?>"required>
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
							<input type="text" name="CNSS" class="form-control form-control-sm" value="<?php echo $CNSS;?>" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">RIB</label>
							<input type="text" name="RIB" class="form-control form-control-sm" value="<?php echo $RIB;?>" required>
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
							<input type="text" name="jobtype" class="form-control form-control-sm" value="<?php echo $emploi;?>" required>
						</div>
                        <div class="form-group">
							<label for="" class="control-label">Date d'embauche</label>
							<input type="text" name="dateemployed" class="form-control form-control-sm" placeholder="dd-mm-yyyy" value="<?php echo $dateemp;?>" required>
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
							<input type="text" name="Depart" class="form-control form-control-sm" value="<?php echo $dep;?>" required>
						</div>
            <div class="form-group">
							<label for="" class="control-label">Supérieure</label>
							<input type="text" name="sup" class="form-control form-control-sm" value="<?php echo $sup;?>" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Atelier</label>
							<input type="text" name="Atelier" class="form-control form-control-sm" value="<?php echo $Att;?>" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Catégorie</label>
							<input type="text" name="Categorie" class="form-control form-control-sm" value="<?php echo $Categ;?>" required>
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
							<input type="text" name="SalaireBC" class="form-control form-control-sm" value="<?php echo $sbc;?>" required>
						</div>
            <div class="form-group">
							<label for="" class="control-label">Salaire Net</label>
							<input type="text" name="salairenet" class="form-control form-control-sm" value="<?php echo $sbc;?>" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Salaire de base Grille</label>
							<input type="text" name="SalaireBG" class="form-control form-control-sm" value="<?php echo $sbG;?>" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">CAT</label>
							<input type="text" name="CAT" class="form-control form-control-sm" value="<?php echo $cat;?>" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Echelon</label>
							<input type="text" name="Echelon" class="form-control form-control-sm" value="<?php echo $ech;?>" required>
						</div>
               <div class="form-group">
							<label for="" class="control-label">Fin Contrat</label>
							<input type="text" name="finc" class="form-control form-control-sm" placeholder="dd-mm-yyyy" value="<?php echo $finc;?>" required>
                        </div>
              <div class="form-group">
							<label for="" class="control-label">Image</label>
							<input type="text" name="image" class="form-control form-control-sm" value="<?php echo $image;?>" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Observation</label>
							<textarea type="textarea" name="hist" class="form-control form-control-sm"></textarea>
						</div>
             <br>
					<div class="input-box">
						<center><button type="submit" name="update" class="btn btn-primary mr-2">Update</button></center>
						

					</div>
					
				</form>
				
        </div>

      </div>
    </section><!-- End Update Section -->
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
