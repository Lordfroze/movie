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

    <!-- Menampilkan data $user dari routes/web.php dan menambah kondisi if else-->
    Profile:
    <ul>
        <li>Name: {{$user['name']}}</li>
        <li>Email: {{$user['email']}}</li>
        @if ($user['role']== 'admin')
        <li>Role: Administrator</li>
        @elseif ($user['role']== 'user')
        <li>Role: User</li>
        @else
        <li>Role: Unknown</li>
        @endif
        </ul>
</body>
</html>