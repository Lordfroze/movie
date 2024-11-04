<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title> 
</head>
<body>
    <!-- //menu website -->
    <ul>
        <?php foreach($menu as $key => $value): ?>  <!-- $menu didapatkan dari  app/Providers/AppServiceProvider.php bagian //Menu website -->
            <li><a href="<?= $value ?>"><?= $key ?></a></li>
        <?php endforeach; ?>
    </ul>
    <h1>Selamat Datang di Home dari views</h1>
</body>
</html>