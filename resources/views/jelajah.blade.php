<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FIXIT - Jelajah</title>

<style>
    @font-face {
        font-family: 'Brigends';
        src: url('/fonts/BrigendsExpanded.otf') format('opentype');
    }
    @font-face {
        font-family: 'Graphite';
        src: url('/fonts/GraphiteDEMO.otf') format('opentype');
    }

    body {
        margin: 0;
        background: #102B57;
        font-family: 'Graphite', sans-serif;
        color: white;
        overflow-x: hidden;
    }

    /* HEADER */
    .header {
        padding: 20px 30px;
        font-size: 32px;
        font-family: 'Brigends';
        letter-spacing: 2px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .top-right {
        text-align: right;
        font-family: 'Graphite';
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 6px;
    }

    .username-text {
        font-size: 15px;
        margin-bottom: 2px;
    }

    .role-badge { /* ADDED - moved under username */
        background:white ;
        padding: 3px 10px;
        font-size: 12px;
        border-radius: 6px;
        font-weight: bold;
        color: #3A6BFF;
    }

    .dropdown-floor { /* ADDED - placed under role-badge */
        border: 1.5px solid white;
        background: transparent;
        color: white;
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 4px;
        font-family: 'Graphite';
    }

    /* MAP
    .map-container {
        position: auto;
        width: 100%;
        max-width: 720px;
        margin: 0 auto;
        margin-top: 10px;
        justify-content: center;
    }

    .map-image {
        width: 118%;
        display: block;
        border-radius: 18px;
    } */

    /* MAP */
.map-container {
    position: relative;      
    width: 100%;
    max-width: 720px;
    margin: 0 auto;
    margin-top: 10px;

    display: flex;           
    justify-content: center;
}

.map-image {
    width: 118%;
    display: block;
    border-radius: 18px;

    margin-left: auto; 
    margin-right: auto;
}


    /* TILE PILIH ZONA */
    .bounding-box {
        position: absolute;
        border: 3px solid #213158;
        border-radius: 10px;
        display: none;
        pointer-events: none;
    }

    .poly-click {
        position: absolute;
        cursor: pointer;
        opacity: 0;
    }

    /* LIST TILE PUTIH DI ATAS NAV (ADDED) */
    .list-tile { /* ADDED */
        width: 86%;
        margin: 20px auto 60px auto;
        background: #ffffff;
        padding: 22px 26px;
        border-radius: 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #102B57;
        font-size: 20px;
        font-weight: bold;
    }

    .btn-outline {
        border: 2px solid #102B57;
        background: transparent;
        color: #102B57;
        padding: 8px 22px;
        border-radius: 30px;
        cursor: pointer;
        font-family: 'Graphite';
    }

    /* NAVIGATION */
    .nav-bottom {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #102B57;
        padding: 16px 0;
        display: flex;
        justify-content: space-around;
        border-top: 1px solid rgba(255,255,255,0.25);
    }

    .nav-item {
        color: white;
        opacity: 0.6;
        font-size: 16px;
        cursor: pointer;
    }

    .nav-item.active {
        opacity: 1;
        border-bottom: 2px solid white;
        padding-bottom: 4px;
    }
    .nav-fas{
        font-size: 16px;
        cursor: pointer;
    }
</style>

</head>
<body>

{{-- HEADER --}}
<div class="header">
    <div>FIXIT.</div>

    <div class="top-right">
        <div class="username-text">{{ Auth::user()->username }}</div>
        <div class="role-badge">{{ Auth::user()->role }}</div>
        <select class="dropdown-floor">
            <option>Lantai 1</option>
        </select>
    </div>
</div>

{{-- MAP --}}
<div class="map-container">

    <img src="/images/unduhan.png"
         class="map-image"
         id="map-img"
         onerror="this.style.border='2px solid red'; this.alt='Gambar tidak ditemukan';">

    <div id="bbox" class="bounding-box"></div>

    {{-- INVISIBLE POLYGON CLICK --}}
    @foreach($zona as $z)
        @php
            if (!is_array($z->polygon) || count($z->polygon) < 4) continue;
            $arr = $z->polygon;
            $xs=[]; $ys=[];
            foreach($arr as $i=>$v){ if($i%2==0) $xs[]=$v; else $ys[]=$v; }
            $minX=min($xs); $maxX=max($xs);
            $minY=min($ys); $maxY=max($ys);
        @endphp

        <div class="poly-click"
             data-id="{{ $z->id }}"
             data-nama="{{ $z->nama }}"
             data-rating="{{ $z->rating_agg }}"
             style="
                left:{{ $minX }}px;
                top:{{ $minY }}px;
                width:{{ $maxX - $minX }}px;
                height:{{ $maxY - $minY }}px;
             ">
        </div>
    @endforeach

</div>


{{-- LIST TILE “LOBBY UTAMA + BUAT ADUAN BARU” (ADDED) --}}
<div class="list-tile">
    <div>Lobby utama</div>

    @if(Auth::user()->role === 'mahasiswa')
        <button class="btn-outline" onclick="window.location.href='/aduan'">buat aduan baru</button>
    @endif
</div>


{{-- NAVIGATION --}}
<div class="nav-bottom">
    <div class="nav-item active" onclick="window.location.href='/dashboard'">jelajah</div>
    <div class="nav-naf" onclick="window.location.href='/fasilitas'">fasilitas</div>
    <div class="nav-item" onclick="window.location.href='/aduan'">aduan</div>
</div>


<script>
document.addEventListener('DOMContentLoaded', () => {

    const bbox = document.getElementById('bbox');

    document.querySelectorAll('.poly-click').forEach(poly => {
        poly.addEventListener('click', () => {

            let rect = poly.getBoundingClientRect();
            let parent = poly.parentElement.getBoundingClientRect();

            bbox.style.left = (rect.left - parent.left) + "px";
            bbox.style.top  = (rect.top - parent.top) + "px";
            bbox.style.width  = rect.width + "px";
            bbox.style.height = rect.height + "px";
            bbox.style.display = "block";
        });
    });

});
</script>

</body>
</html>
