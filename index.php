<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('connect.php');
        // indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL
        $json = file_get_contents("srd_5e_monsters.json");
        $parsed_json = json_decode($json,true);

   
        $name = "name";
        $tableau = $parsed_json ;

        foreach( $tableau as $l ){
            echo "name : ".$l['name']."</br>";
            $stmt = $pdo->prepare ("INSERT INTO monster (name) VALUES( :name)") ;
            $stmt->bindParam(':name', $l['name'] );
            $stmt->execute();         
        }
       
                // echo $value . '<br />';
                // echo $valeur;
                // echo $nom->{'name'};
            

        
    // echo "<pre>";
    // echo $jsonArray;
    // echo "</pre>";

    ?>
</body>
</html>