
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
    <title>details</title>
</head>
<body>

    <h1>Detail</h1>
    <?php
    require_once('connect.php');
        $id = $_GET['id'];
        // echo $id;
        $stmt = $pdo->prepare ('SELECT * FROM monster WHERE id="' . $id . '"') ;
        $stmt->execute(); 
        $array = $stmt->fetchAll();
    ?>

<div class="container">
                
            <?php

            // var_dump($array);
            foreach($array as $value){
            ?>
                <div class="card-detail">
                        <h2><?= $value['name'] ?> </h2>
                        <p><?= $value['meta'] ?> </p>
                        <br>
                        <div class="centerImage">                            
                            <img class="img" src="<?=  $value['img_url'] ?>" alt="">
                        </div>
                        <br>
                        <p> Armor Class : <span class="gras"><?= $value['armor_class'] ?></span></p>
                        <p> Hit Points : <span class="gras"><?= $value['hit_points'] ?></span></p>
                        <p> speed : <span class="gras"><?= $value['speed'] ?></span></p>
                        <p  class="centerText"><a class="retour" href="index.php">Retour</a></p>
                </div>
            <?php 
            }
            
            ?>

            </div>

</body>
</html>
