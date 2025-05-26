<?php
// Inclure l'autoloader de PHPWord
require 'vendor/autoload.php';

// Utiliser les classes PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Chemin vers le template Word
$templateFile = 'test.docx';

// Nouveau processeur de template PHPWord
$templateProcessor = new TemplateProcessor($templateFile);

$prenom = "fakher";
$nom = "chamsi";
$cin = "12345678";
$tel = "98789456";          
$aa = "ddddd";

// Créez un tableau associatif avec les placeholders et les valeurs correspondantes
$placeholders = [
    '{{ACC}}' => $nom,
    '{{prenom}}' => $prenom,
    '{{cin}}' => $cin,
    '{{tel}}' => $tel,
    '{{kk}}' => $aa
];

// Remplacer les variables dans le template avec les données fournies
foreach ($placeholders as $placeholder => $value) {
    $templateProcessor->setValue($placeholder, $value);
}

// Chemin pour sauvegarder le nouveau fichier Word généré
$outputFile = "$nom.$prenom.docx";
    
// Sauvegarder le fichier Word généré
$templateProcessor->saveAs($outputFile);

echo 'Le fichier Word a été généré avec succès. <a href="' . $outputFile . '">Télécharger le fichier Word</a>';
?>
