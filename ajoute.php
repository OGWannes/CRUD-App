<?php 
include_once 'valid.php';


if(isset($_POST['ajout'])){
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
    $nbr=$_POST['nbrE'];
    $image=$_POST['image'];
    $salairenet=$_POST['salairenet'];
    $sup=$_POST['sup'];

    $datenai = explode("-",$datenais);
    //get age from date or date$datenais
    $age = (date("md", date("U", mktime(0, 0, 0,$datenai[0],$datenai[1],$datenai[2]))) > date("md")? ((date("Y") -$datenai[2]) - 1): (date("Y") -$datenai[2]));

    $SalaireBCE=$SalaireBC/$nbr;
    $SalaireBGE=$SalaireBG/$nbr;
    $SalairenetE=$salairenet/$nbr;

    $datenai = explode("-",$dateemployed);
    //get age from date or date$datenais
    $anc = (date("md", date("U", mktime(0, 0, 0,$datenai[0],$datenai[1],$datenai[2]))) > date("md")? ((date("Y") -$datenai[2]) - 1): (date("Y") -$datenai[2]));
    $datett=date('d/m/Y', strtotime('+4 year', strtotime($dateemployed)) );
    $dateret=date('d/m/Y', strtotime('+62 year', strtotime($datenais)) );
    

    $sql1 = "INSERT INTO persone (Mat,Civilite,Nom,Prenom,DateNais,CIN,TEL,Adresse,Age,hist,image) VALUES ('$mat','$civ','$prenom','$nom','$datenais','$cin','$phone','$address',$age,' ','$image')";
    $sql2 = "INSERT INTO social (Mat,situation_f,chef_f,nbr_enfant,CNSS,RIB) VALUES ('$mat','$relationship','$cheff','$nbenfant','$CNSS','$RIB')";
    $sql3 = "INSERT INTO hacodata (Mat,typecontrat,EmploiOcccupe,DIRIND,departement,Attelier,Categorie,TypeSalarie,salariebasec,salairebasecE,salairebaseG,salairebaseGE,CAT,Echelon,DateEmb,FinContract,Anciente,datetitula,Status,dateret,salairenet,salairenetE,sup) 
            VALUES ('$mat','$typecontrat','$jobtype','$DIRIND','$Depart','$Atelier','$Categorie','$Salaire',$SalaireBC,$SalaireBCE,$SalaireBG,$SalaireBGE,'$CAT','$Echelon','$dateemployed','$finc','$anc','$datett','$emplostat','$dateret',$salairenet,$SalairenetE,'$sup')";

    $result1 = mysqli_query($con,$sql1);
    $result2 = mysqli_query($con,$sql2);
    $result3 = mysqli_query($con,$sql3);


    if($result1==TRUE && $result2==TRUE && $result3==TRUE){
        echo "<script>alert('Added Succesufly')</script>";
    }else{
        echo "<script>alert('Please check your data that you entred')</script>";
    }



}


?>