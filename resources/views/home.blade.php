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
    
    
    <p>Menampilkan variabel name dari routes/web.php </p>

     Profile:
     <!-- Menampilkan data $user dari routes/web.php dan menambah kondisi if else-->
    
    <!-- Menggunakan Switch -->
     <h2>Movie Category</h2>
    @switch($movieCategory)
        @case('action')
            <h4>Action Movies</h4>
            @break
        
            @case('comedy')
            <h4>Comedy Movies</h4>
            @break
        
        @case('drama')
            <h4>Drama Movies</h4>
            @break
            
        @default
        <h4>Other Movies</h4>
    @endswitch        

</body>
</html>