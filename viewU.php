<?php 

include_once 'valid.php';
include_once 'header.php';

if(isset($_SESSION['role'])){

  if($_SESSION['role'] != 'user'){
    header('location: login.php');

  }
  
}else{
  header('location: login.php');
}
$mat=$_GET['viewid'];
$view = "SELECT * FROM persone p , hacodata h , social s WHERE p.Mat=h.Mat and p.Mat=s.Mat and p.Mat='$mat'";
$res = mysqli_query($con,$view);
      while($row=mysqli_fetch_assoc($res)){
          $mat=$row['Mat'];
          $prenom=$row['Prenom'];
          $nom=$row['Nom'];
          $CIN=$row['CIN'];
          $dateemp=$row['DateEmb'];
          $Status=$row['Status'];
          $dateF=$row['FinContract'];
          $dateT=$row['datetitula'];
          $CAT=$row['CAT'];
          $hist=$row['hist'];
          $Ech=$row['Echelon'];
          $Salaire=$row['salariebasec'];
          $Salairenet=$row['salairenet'];
          $EmpOC=$row['EmploiOcccupe'];
          $hist=$row['hist'];
          $image=$row['image'];
          $tpc=$row['typecontrat'];
        }
                        ?>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:20px;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:20px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-hf2e{border-color:#ffffff;font-family:Arial, Helvetica, sans-serif !important;text-align:left;vertical-align:top}
.ff{
  border: 2px solid;
}
</style>
<div id="record_container" class="record_container">
                              <center><b><font face="Verdana" size="20"><button onclick="window.print();">Fiche Signalitique</button> </font></b><br>
                              <img src="assets/img/logo.png" width="100" />
                     <center>  
                         <table border="2">
                             <tr>
                                 <td>
<table class="tg">
<thead>
  <tr>
    <th class="tg-hf2e"><b>Matricule : <?php echo $mat;?></b></th>
    <th class="tg-hf2e" colspan="7" rowspan="3"><img src="assets/img/<?php echo "$image.png"?>" width="200" /></th>
  </tr>
  <tr>
    <th class="tg-hf2e"><b>Nom et Prénom : <?php echo "$nom $prenom"; ?> </b></th>
    <th class="tg-hf2e" colspan="2"></th>
  </tr>
  <tr>
    <th class="tg-hf2e"><b>CIN : <?php echo $CIN;?></b></th>
    <th class="tg-hf2e" colspan="2"></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-hf2e" colspan="14"></td>
  </tr>
  <tr>
    <td class="tg-hf2e"><b>Date D'ambauche : <?php echo "$dateemp"; ?></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>

  </tr>
  <tr>
    <td class="tg-hf2e"><b>Status : <?php echo "$Status"; ?></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
  </tr>
  <tr>
    <td class="tg-hf2e"><b> Type Contrat : <?php echo "$tpc"; ?></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
  </tr>
  <?php if($tpc=="CDD" || $tpc=="CIVP" || $tpc=="Karama"){ 
    echo "
  <tr>
    <td class='tg-hf2e'><b>Date Fin de Contrat : $dateF </b></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
  </tr>
  <tr>
    <td class='tg-hf2e'><b>Date Fin Titulation : $dateT </b></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
    <td class='tg-hf2e'></td>
  </tr>" ;}?>
  <tr>
    <td class="tg-hf2e"><b> CAT : <?php echo "$CAT"; ?></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"><b>Echelon : <?php echo "$Ech"; ?></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
  </tr>
  <tr>
    <td class="tg-hf2e"> <b> Salaire Brut : <?php echo "$Salaire"; ?></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"><b> Salaire Net : <?php echo "$Salairenet"; ?></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    
  </tr>
  <tr>
    <td class="tg-hf2e"><b> Poste Occupe : <?php echo "$EmpOC"; ?></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
    <td class="tg-hf2e"></td>
  </tr>
  <tr class="ff">
    <td class="tg-hf2e"><b> Observation :</b><b><?php echo $hist;?></b></td>

    <td class="tg-hf2e" colspan="8"></td>

  </tr>
</tbody>
</table>
</td>
</tr>
</table>
                    </center>   
					          
					        </div>
				         </div>
		         	</div>
		        </div>
                </section>
                            </body>

                        </html>



