<?
require_once('Instagram.php');

$instConnect = new Instagram();
$instConnect->setAccessToken('secret');
$instConnect->setLimit(10);

$urlsImages = $instConnect->getUrlsImages();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<? foreach ($urlsImages as $urlImage): ?>
    <img src="<?=$urlImage?>" alt="">
<? endforeach; ?>

</body>
</html>
