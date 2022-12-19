<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="style.css">
    <title>Liste</title>
</head>
<body>

<h1>Liste des monsters</h1>
    <?php
    require_once('connect.php');
        // indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL
        $json = file_get_contents("srd_5e_monsters.json");
        $parsed_json = json_decode($json,true);

        $type= "type";
        $tableau = $parsed_json ;


        //? inserer dans la bdd
        // foreach( $tableau as $l ){
        //     echo "type : ".$l['name']."</br>";
        //     $stmt = $pdo->prepare ("INSERT INTO monster (name, meta, armor_class, hit_points, speed, img_url) VALUES( :name, :meta, :armor_class, :hit_points, :speed, :img_url)") ;
        //     $stmt->bindParam(':name', $l['name'] );
        //     $stmt->bindParam(':meta', $l['meta'] );
        //     $stmt->bindParam(':armor_class', $l['Armor Class'] );
        //     $stmt->bindParam(':hit_points', $l['Hit Points'] );
        //     $stmt->bindParam(':speed', $l['Speed'] );
        //     $stmt->bindParam(':img_url', $l['img_url'] );
        //     $stmt->execute();        
        // }
        
        //lire la bdd

            $stmt = $pdo->prepare ("SELECT * FROM `monster`") ;
            $stmt->execute(); 
            $array = $stmt->fetchAll();
            // var_dump($array);


            ?>

            <div class="container">
                
            <?php

            // var_dump($array);
            foreach($array as $value){
            ?>
                <div class="card">
                        <h2><?= $value['name'] ?> </h2>
                        <p><?= $value['meta'] ?> </p>
                        <br>
                        <img class="img" src="<?=  $value['img_url'] ?>" alt="">
                        <br>
                        <p> Armor Class : <span class="gras"><?= $value['armor_class'] ?></span></p>
                        <p> Hit Points : <span class="gras"><?= $value['hit_points'] ?></span></p>
                        <p> speed : <span class="gras"><?= $value['speed'] ?></span></p>
                        <p class="detail"><a href="detail.php?id=<?= $value['id'] ?>">+ detail</a></p>
                </div>
            <?php 
            }
            
            ?>

            </div>
            <?php
        // echo  $stmt;

        // //! update
        // foreach( $tableau as $l ){
        //     echo "type : ".$l['meta']."</br>";
        //     $stmt = $pdo->prepare ("UPDATE monster SET name = 'Adult Black Dragon' where id = 3") ;
        //     // $stmt->bindParam(':nom', 'Adult Black Dragon' );
        //     $stmt->execute();         
        // }



    ?>
</body>
</html>