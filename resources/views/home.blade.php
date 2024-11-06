<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title> 
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>
<body>
    <!-- //menu website -->
    <ul>
        <?php foreach($menu as $key => $value): ?>  <!-- $menu didapatkan dari  app/Providers/AppServiceProvider.php bagian //Menu website -->
            <li><a href="<?= $value ?>"><?= $key ?></a></li>
        <?php endforeach; ?>
    </ul>
        
    <h2> Movie List</h2>
    <!-- Perulangan for -->
     <!-- <ul>
     @for($index = 0; $index < count($movies); $index++)
     <li>{{$movies[$index]['title']}} - {{$movies[$index]['year']}}</li>
     @endfor
     </ul> -->

     <!-- Perulangan for each + else -->
      <!-- <ul>
      @forelse ($movies as $movie)
      <li>{{$movie['title']}} - {{$movie['year']}} </li>
      @empty
      <li>No movies found.</li>
      @endforelse
      </ul> -->

      <!-- Perulangan while -->
       <!-- <ul>
      @php
            $index = 0;
      @endphp

      @while ($index < count($movies))
     <li>{{$movies[$index]['title']}} - {{$movies[$index]['year']}}</li>
    @php
            $index++;
    @endphp
    @endwhile
    </ul> -->
    
    <!-- Penerapan Continue Dan Break Di Perulangan Blade -->
     <!-- @foreach($movies as $movie)
            @if($movie['year'] < 2000)
                @continue
            @endif

            @if($movie['year'] > 2015)
                @break
            @endif                
            <li>{{$movie['title']}} - {{$movie['year']}}</li>
    @endforeach -->

<!-- Variabel tersembunyi dari perulangan -->
    <!-- menambahkan angka -->
    <!-- @foreach($movies as $movie)
    <p>{{$loop->iteration}} . {{$movie['title']}} - {{$movie['year']}}</p>
    @endforeach -->

    <!-- Menampilkan movie pertama terakhir -->
    <!-- @foreach($movies as $movie)
            @if($loop->first)
                <p>First Movie: {{$movie['title']}} - {{$movie['year']}}</p>
            @elseif($loop->last)
                <p>Last Movie: {{$movie['title']}} - {{$movie['year']}}</p>
            @else
                <p>Last Movie: {{$movie['title']}} - {{$movie['year']}}</p>
            @endif
    @endforeach      
     -->

    <!-- Menampilkan index sekarang dari seluruh movie -->
    <!-- @foreach($movies as $movie)
    <p>Movie {{$loop->remaining + 1}} of {{$loop->count}}: {{$movie['title']}} - {{$movie['year']}}</p>
    @endforeach       -->

    <!-- Menggunakan kondisi didalam atribute class -->
    <!-- @foreach($movies as $movie)
    <p class="{{$movie['year'] < 2000 ? 'text-red-500' : 'text-green-500'}}">
        {{$movie['title']}} - {{$movie['year']}}</p>
    @endforeach    -->

    <!-- Memecah Tampilan Blade Dengan Fungsi Include -->
    @foreach($movies as $movie)
            @include('partials._movie', ['movie' => $movie])  <!-- Menyertakan file partial partials._movie dan mengirimkan data $movie -->
    @endforeach
     
</body>
</html>