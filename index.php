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

        $type= "type";
        $tableau = $parsed_json ;
        // var_dump($tableau);

        foreach( $tableau as $l ){
            echo "type : ".$l['meta']."</br>";
            $stmt = $pdo->prepare ("INSERT INTO monster (type) VALUES( :type)") ;
            $stmt->bindParam(':type', $l['meta'] );
            $stmt->execute();         
        }

        // //! update
        // foreach( $tableau as $l ){
        //     echo "type : ".$l['meta']."</br>";
        //     $stmt = $pdo->prepare ("UPDATE monster SET name = 'Adult Black Dragon' where id = 3") ;
        //     // $stmt->bindParam(':nom', 'Adult Black Dragon' );
        //     $stmt->execute();         
        // }

        // update monster set name = "Adult Black Dragon" where id = 3;

    ?>
</body>
</html>