<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name= "description" content="<?= $description ?>"/>
    <title><?= $title ?></title>

    <link href="twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=News+Cycle&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
</head>


<body>
<?php include 'header.php';?>
<div id="content">

    <?= $content ?>
    <?php include 'footer.php';?>
    <?php include 'navbar_mobil.php' ; ?>
</div>
</body>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="twbs/bootstrap/dist/js/bootstrap.js"></script>

<script>
console.log('c');
$('.toast').toast({
animation: true,
autohide: true,
delay: 20000,
});

$('.toast').toast('show');
</script>
</html>