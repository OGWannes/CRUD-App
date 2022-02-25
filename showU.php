<?php 
include_once 'valid.php';
include_once 'ajoute.php';

if(isset($_SESSION['role'])){

  if($_SESSION['role'] != 'user'){
    header('location: login.php');

  }
  
}else{
  header('location: login.php');
}

/*
$reqc= "SELECT COUNT(*) as nbrc FROM hacodata";
$resc = mysqli_query($con, $reqc);
while ($rows=mysqli_fetch_assoc($resc)) {
    $nbrc=$rows['nbrc'];
  
    for ($i=1;$i <= $nbrc; ++$i) {
        $req = "SELECT id,salariebasec,salairebasecE,salairebaseG,salairebaseGE,salairenet,salairenetE FROM hacodata where id=$i";
        $res = mysqli_query($con, $req);
        $row=mysqli_fetch_assoc($res);
        $sbc=$row['salariebasec'];
        $sbE=$row['salairebasecE'];
        $sbG=$row['salairebaseG'];
        $sbGE=$row['salairebaseGE'];
        $s=$row['salairenet'];
        $sE=$row['salairenetE'];

        if (isset($_POST['update'])) {
            $nbr=$_POST['nbrE'];
      
            $newCE=$sbc/$nbr;
            $newGE=$sbG/$nbr;
            $newsE=$s/$nbr;

            $sql = "UPDATE hacodata set salairebasecE=$newCE,salairebaseGE=$newGE,salairenetE=$newsE where id=$i";
            $res = mysqli_query($con, $sql);
            if ($res==true) {
                echo "<script> alert('Emplyoee updated')</script>";
                header('location:show.php');
            } else {
                echo "<script> alert('Error')</script>";
            }
        }
    }
}
*/

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
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/styleness.css" rel="stylesheet">
  <style>
    body{
    background-color: #c8d8e4;
}

table{
  border-spacing: 30px; 
  border-collapse: separate;
}

  ol {list-style-type: katakana-iroha;}

  button{
  border: none;
  padding: 2px 22px;
  text-align: center;
  text-decoration: none;
  border-radius: 8px;
  display: inline-block;
  font-size: 16px;
  }

  .button1{
    background-color: #f44336;;
  }
  .button2{
    background-color: #008CBA;
  }
  .button3{
    background-color: #008CBA;
    border: none;
    padding: 2px 22px;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 8px;
    display: inline-block;
    font-size: 16px;
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
  <form method="POST">

    <div class="d-flex justify-content-between align-items-center">
      <h2>HACO Shipyard</h2><br>
    </div>
            <button><a href="homeu.php" >Home</a></button></div>
            <button class="button3" onclick="ExportToExcel('xlsx')">Export table to excel</button>
            <input class="button3" type="button" id="btnExport" value="Export table to PDF" onclick="Export()" />
						
<table id="tbl_exporttable" class="table" cellspacing="20">
  <thead>
    <tr>
      <th>Matricule</th>
      <th>Prenom</th>
      <th>Nom</th>
      <th>Civilite</th>
      <th>Date naissance</th>
      <th>CIN</th>
      <th>Tel</th>
      <th>Adresse</th>
      <th>Age</th>
      <th>CNSS</th>
      <th>RIB</th>
      <th>Date Retraite</th>
      <th>Situation Familiale</th>
      <th>Chef famille</th>
      <th>N°:Enf</th>
      <th>Type Contrat</th>
      <th>Emploi occupe</th>
      <th>DIR/IND</th>
      <th>Departement</th>
      <th>Supérieure</th>
      <th>Attelier</th>
      <th>Categorie</th>
      <th>Type Salaire</th>
      <th>SBC</th>
      <th>SBC/Euro</th>
      <th>SBG</th>
      <th>SBG/Euro</th>
      <th>Salaire Net</th>
      <th>Salaire Net/Euro</th>
      <th>CAT</th>
      <th>Echelon</th>
      <th>Date d'embauche</th>
      <th>Fin Contrat</th>
      <th>Anciente</th>
      <th>Date de titularisation</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $view = "SELECT * FROM persone p,social s,hacodata h WHERE p.Mat=s.Mat and p.Mat=h.Mat";
      $res = mysqli_query($con,$view);
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
          $Att=$row['Attelier'];
          $Categ=$row['Categorie'];
          $ts=$row['TypeSalarie'];
          $sbc=$row['salariebasec'];
          $sbE=$row['salairebasecE'];
          $sbG=$row['salairebaseG'];
          $sbGE=$row['salairebaseGE'];
          $cat=$row['CAT'];
          $ech=$row['Echelon'];
          $dateemb=$row['DateEmb'];
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
          $s=$row['salairenet'];
          $sE=$row['salairenetE'];
          $sup=$row['Sup'];
          echo'    <tr>
          <th scope="row">'.$mat.'</th>
          <td>'.$prenom.'</td>
          <td>'.$nom.'</td>
          <td>'.$civ.'</td>
          <td>'.$datenais.'</td>
          <td>'.$cin.'</td>
          <td>'.$phone.'</td>
          <td>'.$address.'</td>
          <td>'.$age.'</td>
          <td>'.$CNSS.'</td>
          <td>'.$RIB.'</td>
          <td>'.$dateret.'</td>
          <td>'.$sitf.'</td>
          <td>'.$cheff.'</td>
          <td>'.$nbenf.'</td>
          <td>'.$tc.'</td>
          <td>'.$emploi.'</td>
          <td>'.$Dir.'</td>
          <td>'.$dep.'</td>
          <td>'.$sup.'</td>
          <td>'.$Att.'</td>
          <td>'.$Categ.'</td>
          <td>'.$ts.'</td>
          <td>'.$sbc.'</td>
          <td>'.$sbE.'</td>
          <td>'.$sbG.'</td>
          <td>'.$sbGE.'</td>
          <td>'.$s.'</td>
          <td>'.$sE.'</td>
          <td>'.$cat.'</td>
          <td>'.$ech.'</td>
          <td>'.$dateemb.'</td>
          <td>'.$finc.'</td>
          <td>'.$anc.'</td>
          <td>'.$datet.'</td>';
          if ($status=="Active") {
              echo '<td><font color="green">'.$status.'</font></td>';
          } else {
              echo '<td><font color="red">'.$status.'</font></td>';
          }
      }
      ?>
  </tbody>
</table>
</form>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('tbl_exporttable'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("HACODATA.pdf");
                }
            });
        }
    </script>


<script>

function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('tbl_exporttable');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
    return dl ?
        XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
        XLSX.writeFile(wb, fn || ('HacoDATA.' + (type || 'xlsx')));
}

</script>

</body>

</html>