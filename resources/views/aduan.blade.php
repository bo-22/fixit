<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FIXIT - Aduan</title>

<style>
    @font-face {
        font-family: 'Brigends';
        src: url('/fonts/BrigendsExpanded.otf');
    }
    @font-face {
        font-family: 'Graphite';
        src: url('/fonts/GraphiteDEMO.otf');
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
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }
    .top-right {
        text-align: right;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 4px;
    }
    .role-badge {
        background:white;
        padding: 3px 10px;
        border-radius: 30px;
        color:#3A6BFF;
        font-size: 12px;
        font-weight: bold;
    }

    /* WHITE CARD WRAPPER UTAMA */
    .wrapper {
        width: 88%;
        background: #ffffff;
        padding: 26px;
        border-radius: 26px;
        margin: 0 auto;
        margin-top: 20px;
        margin-bottom: 120px;
        color: #102B57;
    }

    .judul {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* LIST TILE */
    .tile {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        border: 2px solid #d0dae9;
        border-radius: 16px;
        margin-bottom: 16px;
    }
    .tile img {
        width: 90px;
        height: 90px;
        border-radius: 10px;
        object-fit: cover;
    }
    .tile-text {
        flex: 1;
        font-size: 14px;
        color: #1a2a5a;
        line-height: 1.4;
    }
    .tile-text .status {
        font-weight: bold;
    }

    .status-diadu {
        color: #d68b00;
    }
    .status-diproses {
        color: #00a53f;
    }
    .status-selesai {
        color: #00a53f;
    }

    /* BUTTON “BERI RATING” */
    .btn-rating {
        border: 2px solid #102B57;
        padding: 8px 22px;
        border-radius: 30px;
        background: transparent;
        color: #102B57;
        cursor: pointer;
        font-family: 'Graphite';
        font-size: 14px;
        white-space: nowrap;
    }

    /* BUTTON BUAT ADUAN BARU */
    .btn-create {
        display: block;
        margin-left: auto;
        margin-top: 20px;
        border: 2px solid #102B57;
        padding: 10px 26px;
        border-radius: 30px;
        background: transparent;
        color: #102B57;
        cursor: pointer;
        font-size: 16px;
        font-family: 'Graphite';
    }

    /* NAV BOTTOM */
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
</style>

</head>
<body>

{{-- HEADER --}}
<div class="header">
    <div>FIXIT.</div>

    <div class="top-right">
        <div style="font-size:14px;">{{ Auth::user()->username }}</div>
        <div class="role-badge">{{ Auth::user()->role }}</div>
    </div>
</div>

{{-- WHITE WRAPPER --}}
<div class="wrapper">

    <div class="judul">aduan</div>

    {{-- LIST ADUAN --}}
    @foreach($aduan as $a)
        <div class="tile">
            <img src="{{ asset('uploads/' . $a->gambar) }}" onerror="this.src='/images/noimg.png'">

            <div class="tile-text">
                <div><b>area:</b> {{ $a->zona->nama }}</div>
                <div><b>keterangan:</b> {{ Str::limit($a->keterangan, 20) }}</div>

                <div class="status 
                    @if($a->status=='diadukan') status-diadu
                    @elseif($a->status=='diproses') status-diproses
                    @elseif($a->status=='selesai') status-selesai
                    @endif">
                    <b>status:</b> {{ $a->status }}
                </div>
            </div>

            {{-- BUTTON RATING (Hanya muncul jika status selesai & mahasiswa belum rating) --}}
            @if(Auth::user()->role=='mahasiswa' && $a->status=='selesai' && !$a->sudahRating())
                <button class="btn-rating"
                        onclick="window.location.href='/aduan/rating/{{ $a->id }}'">
                    beri rating
                </button>
            @endif
        </div>
    @endforeach

    {{-- BUTTON BUAT ADUAN BARU --}}
    @if(Auth::user()->role=='mahasiswa')
        <button class="btn-create" onclick="window.location.href='/aduan/create'">
            buat aduan baru
        </button>
    @endif

</div>

{{-- NAVIGATION --}}
<div class="nav-bottom">
    <div class="nav-item" onclick="window.location.href='/dashboard'">jelajah</div>
    <div class="nav-item active" onclick="window.location.href='/aduan'">aduan</div>
</div>

</body>
</html>
