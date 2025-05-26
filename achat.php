<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transactions_db";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT username, password FROM login LIMIT 1"; // Utilisation de LIMIT pour obtenir une seule ligne
$result = $conn->query($sql);

// Initialiser les variables pour stocker les données
$dbUsername = '';
$dbPassword = '';

if ($result->num_rows > 0) {
    // Récupérer la première ligne des résultats
    $row = $result->fetch_assoc();
    $dbUsername = $row["username"];
    $dbPassword = $row["password"];
    
} else {
    echo "Aucun résultat trouvé.";
}


// Récupération des données du formulaire
//$codeTransaction = $_POST['codeTransaction'];/*
//$caisse = $_POST['caisse'];/*
//$compteCaisseDevise = $_POST['compteCaisseDevise'];/*
$devise = $_POST['devise'];
$montantDevise = $_POST['montantDevise'];
//$compteCaisseTND = $_POST['compteCaisseTND'];/*
//$deviseLocal = $_POST['deviseLocal'];/*
//$montantTnd = $_POST['montantTnd'];/*
$modechange = $_POST['modechange'];
$coursDeChange = $_POST['coursDeChange'];
$TypeConv = $_POST['TypeConv'];
$PaysOrigineDevise = $_POST['PaysOrigineDevise'];
$codeBalancePaiement = $_POST['codeBalancePaiement'];
$libelle = $_POST['libelle'];
$NomBeneficiare = $_POST['NomBeneficiare'];
$Prenomeneficiare = $_POST['Prenomeneficiare'];
$TypePieceIdentite = $_POST['TypePieceIdentite'];
$nationalitePieceIdentite = $_POST['nationalitePieceIdentite'];
$NumeroPiece = $_POST['NumeroPiece'];
$dateDelivrance = $_POST['dateDelivrance'];
$dateValidite = $_POST['dateValidite'];
$dateNaiss = $_POST['dateNaiss'];
$sexe = $_POST['sexe'];
$etatCivil = $_POST['etatCivil'];
$qualite = $_POST['qualite'];
$Profession = $_POST['Profession'];
$Nationalite = $_POST['Nationalite'];
$paysResidance = $_POST['paysResidance'];
$adresse = $_POST['adresse'];
$tlf = $_POST['tlf'];
$accompagne = $_POST['accompagne'];
$destination = $_POST['destination'];
$RefDeclarationDouaniere = $_POST['RefDeclarationDouaniere'];
$dateEmmissionDeclar = $_POST['dateEmmissionDeclar'];
$deviseDeclar = $_POST['deviseDeclar'];
$montantDeclarationDouan = $_POST['montantDeclarationDouan'];
$montantUtiliseDeclaration = $_POST['montantUtiliseDeclaration'];
if($devise=="TND" ){
    $compteCaisseDevise="TND1000101801080";
}
else if($devise=="USD" ){
    $compteCaisseDevise="USD1000201801080";
}
else if($devise=="SEK" ){
    $compteCaisseDevise="SEK1000201801080";
}
else if($devise=="SAR" ){
    $compteCaisseDevise="SAR1000201801080";
}
else if($devise=="QAR" ){
    $compteCaisseDevise="QAR1000201801080";
}
else if($devise=="NOK"){
    $compteCaisseDevise="NOK1000201801080";
}
else if($devise=="JPY"){
    $compteCaisseDevise="JPY1000201801080";
}
else if($devise=="GBP"){
    $compteCaisseDevise="GBP1000201801080";
}
else if($devise=="EUR"){
    $compteCaisseDevise="EUR1000201801080";
}
else if($devise=="DKK"){
    $compteCaisseDevise="DKK1000201801080";
}
else if($devise=="CHF"){
    $compteCaisseDevise="CHF1000201801080";
}
else if($devise=="CAD"){
    $compteCaisseDevise="CAD1000201801080";
}
else if($devise=="AED"){
    $compteCaisseDevise="AED1000201801080";
}
$codedetransaction='250';
$compteCaisseTND='TND1000101801080';
$deviseLocal='TND';
$montantTnd=$montantDevise*$coursDeChange;  
$caisse='0180';                         
// Requête SQL d'insertion
$sql = "INSERT INTO achat (codeTransaction, caisse,  devise, montantDevise, compteCaisseTND, deviseLocal, montantTnd, modechange, coursDeChange, TypeConv, PaysOrigineDevise, codeBalancePaiement, libelle, NomBeneficiare, Prenomeneficiare, TypePieceIdentite, nationalitePieceIdentite, NumeroPiece, dateDelivrance, dateValidite, dateNaiss, sexe, etatCivil, qualite, Profession, Nationalite, paysResidance, adresse, tlf, accompagne, destination, RefDeclarationDouaniere, dateEmmissionDeclar, deviseDeclar, montantDeclarationDouan, montantUtiliseDeclaration)
        VALUES ('$codedetransaction', '$caisse', '$devise', '$montantDevise', '$compteCaisseTND', '$deviseLocal', '$montantTnd', '$modechange', '$coursDeChange', '$TypeConv', '$PaysOrigineDevise', '$codeBalancePaiement', '$libelle', '$NomBeneficiare', '$Prenomeneficiare', '$TypePieceIdentite', '$nationalitePieceIdentite', '$NumeroPiece', '$dateDelivrance', '$dateValidite', '$dateNaiss', '$sexe', '$etatCivil', '$qualite', '$Profession', '$Nationalite', '$paysResidance', '$adresse', '$tlf', '$accompagne', '$destination', '$RefDeclarationDouaniere', '$dateEmmissionDeclar', '$deviseDeclar', '$montantDeclarationDouan', '$montantUtiliseDeclaration')";

if ($conn->query($sql) === TRUE) {
    echo "Enregistrement réussi !";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Inclure la bibliothèque Dompdf
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Initialisation de Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$dompdf = new Dompdf($options);


// Générer le contenu HTML pour le PDF
$html = '

<h1>Formulaire de transaction</h1>
<p>Code transaction:  250</p>
<p>Caisse: ' . $caisse . '</p>
<p>Compte Caisse Devise: ' . $compteCaisseDevise . '</p>
<p>Devise: ' . $devise . '</p>
<p>Montant Devise: ' . $montantDevise . '</p>
<p>Compte Caisse TND: ' . $compteCaisseTND . '</p>
<p>Devise Locale: ' . $deviseLocal . '</p>
<p>Montant TND: ' . $montantTnd . '</p>
<p>Mode de Change: ' . $modechange . '</p>
<p>Cours de Change: ' . $coursDeChange . '</p>
<p>Type de Conversion: ' . $TypeConv . '</p>
<p>Pays d\'Origine de la Devise: ' . $PaysOrigineDevise . '</p>
<p>Code de Balance de Paiement: ' . $codeBalancePaiement . '</p>
<p>Libellé: ' . $libelle . '</p>
<p>Nom du Bénéficiaire: ' . $NomBeneficiare . '</p>
<p>Prénom du Bénéficiaire: ' . $Prenomeneficiare . '</p>
<p>Type de Pièce d\'Identité: ' . $TypePieceIdentite . '</p>
<p>Nationalité de la Pièce d\'Identité: ' . $nationalitePieceIdentite . '</p>
<p>Numéro de Pièce: ' . $NumeroPiece . '</p>
<p>Date de Délivrance: ' . $dateDelivrance . '</p>
<p>Date de Validité: ' . $dateValidite . '</p>
<p>Date de Naissance: ' . $dateNaiss . '</p>
<p>Sexe: ' . $sexe . '</p>
<p>État Civil: ' . $etatCivil . '</p>
<p>Qualité: ' . $qualite . '</p>
<p>Profession: ' . $Profession . '</p>
<p>Nationalité: ' . $Nationalite . '</p>
<p>Pays de Résidence: ' . $paysResidance . '</p>
<p>Adresse: ' . $adresse . '</p>
<p>Téléphone: ' . $tlf . '</p>
<p>Accompagné: ' . $accompagne . '</p>
<p>Destination: ' . $destination . '</p>
<p>Référence de la Déclaration Douanière: ' . $RefDeclarationDouaniere . '</p>
<p>Date d\'Émission de la Déclaration: ' . $dateEmmissionDeclar . '</p>
<p>Devise Déclarée: ' . $deviseDeclar . '</p>
<p>Montant Déclaré: ' . $montantDeclarationDouan . '</p>
<p>Montant Utilisé dans la Déclaration: ' . $montantUtiliseDeclaration . '</p>
';
$dateHeureActuelle = date('Y-m-d H:i:s');

function genererReferenceOperation() {
    // Partie fixe
    $reference = 'TT';

    // Nombre total de jours du mois en cours plus le jour actuel
    $joursParMois = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $mois = date('n') - 1; // Mois en cours (0 = janvier, 1 = février, ..., 11 = décembre)
    $jourActuel = date('j'); // Jour du mois
    $totalJours = $joursParMois[$mois] + $jourActuel;

    // Ajouter la partie entière à la référence
    $reference .= str_pad($totalJours, 2, '0', STR_PAD_LEFT);

    // Partie aléatoire de 3 caractères
    $randomChars = '';
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $length = strlen($characters);
    for ($i = 0; $i < 3; $i++) {
        $randomChars .= $characters[rand(0, $length - 1)];
    }
    $reference .= $randomChars;

    return $reference;
}
$sql = "
        SELECT *
        FROM login as l ,achat as a
        WHERE l.username = a.username " ;  // Remplacez ? par l'identifiant ou la condition appropriée pour récupérer le nom
      
// Exemple d'utilisation
$reference = genererReferenceOperation();
echo $reference;

// Charger le contenu HTML dans Dompdf
$dompdf->loadHtml($html);

// (Optionnel) Configurer la taille et l'orientation du papier
$dompdf->setPaper('A4', 'portrait');

// Render le PDF
$dompdf->render();

// Enregistrer le PDF sur le serveur
$output = $dompdf->output();
$filename = 'transaction_' . date('Ymd') . '.pdf';
file_put_contents($filename, $output);

// Inclure l'autoloader de PHPWord
require 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;



// Hachage MD5 que vous voulez "décrypter"
$md5_hash = '25d55ad283aa400af464c76d713c07ad'; // Exemple : hachage MD5 pour 'password'

// Liste de mots de passe potentiels
$passwords = ['12345678','password',  'admin', 'letmein'];

// Fonction pour créer un hachage MD5 d'un mot de passe
function md5_hash_password($password) {
    return md5($password);
}

// Essayer de trouver le mot de passe correspondant
function find_password($md5_hash, $passwords) {
    foreach ($passwords as $password) {
        if (md5_hash_password($password) === $md5_hash) {
            return $password;
        }
       else{
        return '*****';
       }
    }
    return null;
}

// Utiliser la fonction
$found_password = find_password($md5_hash, $passwords);
if ($found_password) {
 $pass=$found_password;

}

require('fpdf186/fpdf.php');

// Chemin vers le fichier texte d'entrée
$inputFile2 = 'achatclient.txt';

// Lire le contenu du fichier texte
$content2 = file_get_contents($inputFile2);

$currentDateTime = date('Y-m-d H:i:s'); 


function nombreEnLettres($nombre) {
    if (!is_numeric($nombre)) return 'Valeur non numérique';
    
    $nombre = floatval($nombre);
    
    // Séparer la partie entière et la partie décimale
    $partieEntiere = intval($nombre);
    $partieDecimale = round(($nombre - $partieEntiere) * 100); // Convertir en centièmes

    if ($partieDecimale >= 100) {
        $partieDecimale = 99; // Limiter la partie décimale à deux chiffres
    }

    // Convertir la partie entière en lettres
    $resultatEntier = convertPartieEntiere($partieEntiere);
    $resultatDecimal = $partieDecimale > 0 ? convertPartieEntiere($partieDecimale) : '';

    // Combiner les parties
    $resultat = $resultatEntier;
    if ($partieDecimale > 0) {
        $resultat .= ' virgule ' . $resultatDecimal;
    }

    return $resultat;
}

function convertPartieEntiere($nombre) {
    if ($nombre < 0) return 'Nombre négatif non supporté';
    if ($nombre == 0) return 'zéro';

    $unites = ['zéro', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf'];
    $dizaines = ['dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix-sept', 'dix-huit', 'dix-neuf'];
    $multiplesDeDix = ['vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante', 'quatre-vingts', 'quatre-vingt'];
    $unités = [1000000000 => 'milliard', 1000000 => 'million', 1000 => 'mille'];

    $resultat = '';

    // Conversion des milliers et au-delà
    foreach ($unités as $valeur => $nome) {
        if ($nombre >= $valeur) {
            $partie = intdiv($nombre, $valeur);
            $nombre %= $valeur;
            $resultat .= convertPartieEntiere($partie) . ' ' . $nome;
            if ($nombre > 0) $resultat .= ' ';
        }
    }

    // Conversion des centaines
    if ($nombre >= 100) {
        $centaines = intdiv($nombre, 100);
        $nombre %= 100;
        $resultat .= ($centaines > 1 ? $unites[$centaines] . ' cents' : 'cent');
        if ($nombre > 0) $resultat .= ' ';
    }

    // Conversion des dizaines
    if ($nombre >= 20) {
        $dizaine = intdiv($nombre, 10);
        $unite = $nombre % 10;
        $resultat .= $multiplesDeDix[$dizaine - 2];
        if ($unite > 0) $resultat .= '-' . $unites[$unite];
    } elseif ($nombre >= 10) {
        $resultat .= $dizaines[$nombre - 10];
    } elseif ($nombre > 0) {
        $resultat .= $unites[$nombre];
    }

    return $resultat;
}


$montantlettre=nombreEnLettres($montantDevise);










$placeholders = [
    '{{nom}}' => $NomBeneficiare,
    '{{prenom}}' => $Prenomeneficiare,
    '{{devise}}' => $devise,
    '{{montantdevise}}' =>  $montantDevise,
    '{{coursdechange}}' =>  $coursDeChange,
    '{{montanttnd}}' =>   $montantTnd ,
    '{{dateop}}' =>   $currentDateTime ,
    '{{montantlettres}}' =>   $montantlettre ,
  
];

// Remplacer les placeholders dans le contenu
foreach ($placeholders as $placeholder => $value) {
    $content2 = str_replace($placeholder, $value, $content2);
}

// Chemin pour sauvegarder le nouveau fichier texte généré
$outputFile2 = "achatclient2.txt";

// Sauvegarder le contenu modifié dans le nouveau fichier texte
file_put_contents($outputFile2, $content2);

echo "Le fichier a été généré : $outputFile2\n";


// Création du PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, $content2);
$pdf->Output('F', 'achatclient2.pdf'); // Sauvegarder le PDF dans un fichier

echo "Le fichier PDF a été généré : achatclient2.pdf\n";












// Chemin vers le fichier texte d'entrée
$inputFile = 'achat.txt';

// Lire le contenu du fichier texte
$content = file_get_contents($inputFile);

// Variables à remplacer
$devise=$devise ;
          $nom=$NomBeneficiare;
          $prenom=$Prenomeneficiare; 
$amountlocal = $deviseLocal ;
$montant = $montantDevise; 
$compteCaisseDevise=$compteCaisseDevise;
$modechange1="Normal";                                                                                                             
// Assurez-vous de définir $montant

    // Créez un tableau associatif avec les placeholders et les valeurs correspondantes
    $placeholders = [
        '{{montantdevise}}' => $montant,
        '{{local}}' => $amountlocal,
        '{{montanttnd}}' => $montantTnd,
        '{{devise}}' => $devise,
        '{{comptecaissedevise}}' =>  $compteCaisseDevise,
        '{{deviselocal}}' =>  $deviseLocal,
        '{{comptecaissetnd}}' =>   $compteCaisseTND ,
        '{{paysoriginedevise}}' =>   $PaysOrigineDevise ,
        '{{modedechange}}' =>   $modechange1 ,
        '{{username}}' =>   $dbUsername ,
        '{{passwords}}' =>   $pass                   ,
    ];

    // Remplacer les placeholders dans le contenu
    foreach ($placeholders as $placeholder => $value) {
        $content = str_replace($placeholder, $value, $content);
    }

    // Chemin pour sauvegarder le nouveau fichier texte généré
    $outputFile = "./OFS/$nom.$prenom.OFS.achat.txt";

    // Sauvegarder le contenu modifié dans le nouveau fichier texte
    file_put_contents($outputFile, $content);

    echo "Le fichier a été généré : $outputFile\n";

    
    $content2 = file_get_contents($outputFile);
    if ($content2 === false) {
        die("Erreur lors de la lecture du fichier.");
    }
    $content2 = strtoupper($content2);
   
    $content2 = str_replace('NORMAL', 'Normal', $content2);
       // Sauvegarder le contenu modifié dans le nouveau fichier texte
       $result2 = file_put_contents($outputFile, $content2);
    
       if ($result2 === false) {
           die("Erreur lors de la sauvegarde du fichier.");
       }
      


echo 'Le fichier OFS a été généré avec succès. <br><a href="' . $outputFile . '">Télécharger le fichier OFS</a><br>';



// Afficher les liens pour télécharger les PDF et le document Word
echo "Documents générés: <br>";
echo "<a href='$filename' download> Télécharger le reçu 1</a><br>";
echo "<a href='achatclient2.pdf' download> Télécharger le reçu 2</a><br>";

// Fermeture de la connexion
$conn->close();
?>
