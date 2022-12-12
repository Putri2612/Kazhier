<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1"/>
    <link rel="shortcut icon" href="{{ asset('storage/logo/favicon.png?').config('asset-version.img.favicon') }}" type="image/png"/>
    <link rel="canonical" href="https://kazhier.com"/>

    <title>{{ config('landing-page.title') }}</title>
    <meta name="description" content="{{ config('landing-page.description') }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://kazhier.com">
    <meta property="og:title" content="{{ config('landing-page.title') }}">
    <meta property="og:description" content="{{ config('landing-page.description') }}">
    <meta property="og:image" content="{{ asset('img/props/thumbnail-social.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="kazhier.com">
    <meta property="twitter:url" content="https://kazhier.com">
    <meta name="twitter:title" content="{{ config('landing-page.title') }}">
    <meta name="twitter:description" content="{{ config('landing-page.description') }}">
    <meta name="twitter:image" content="{{ asset('img/props/thumbnail-social.png') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('assets/modules/landing-page/main.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/modules/custom-element/custom-element.css') }}"/>

    <!-- Analytic -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5ENX028256"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'G-5ENX028256');
    </script>
</head>
<body>
    <header id="page-header" class="stick-top">
        <div class="header-container">
            <div class="logo-container"><img src="{{ asset('assets/img/props/logo.png') }}" alt="Logo Kazhier" height="36"></div>
            <div class="nav-container">
                <nav>
                    <div id="nav-btn" class="nav-btn">
                        <div id="navburg-00" class="btn-burg-top"></div>
                        <div id="navburg-01" class="btn-burg-mid"></div>
                        <div id="navburg-02" class="btn-burg-bot"></div>
                    </div>
                    <ul id="nav-list" class="nav-list kakaflex-col-gap-sm-lg kakaflex-align-right-lg">
                        <a class="nav-item active kakaflex-item" href="."><li>Beranda</li></a>
                        <a class="nav-item kakaflex-item" href="#fitur"><li>Fitur Lengkap</li></a>
                        <a class="nav-item kakaflex-item" href="#price"><li>Harga</li></a>
                        @if (Auth::check())
                            <a class="nav-item highlights kakaflex-item" href="{{ route('dashboard') }}"><li>Dasbor</li></a>
                        @else 
                            <a class="nav-item kakaflex-item" href=" {{ route('user.login') }} "><li>Login</li></a>
                            <a class="nav-item highlights kakaflex-item" href="{{ route('user.register') }}"><li>Daftar</li></a>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="nav-spacer"></div>
    <main>
        <section id="headline" class="kakabg-00">
            <div class="kakakonten-xl kakapadding-atas-lg kakapadding-sisi-sm kakaflex kakaflex-hori kakaflex-row-gap-sm">
                <div class="kakapanel-1-per-3-lg kakaflex-item txt-just">
                    <h2>Akuntansi menjadi <br/>mudah & cepat <br/>dengan Kazhier</h2>
                    <p>Memudahkan pencatatan keuangan dan memberikan laporan dalam waktu singkat.</p>
                    <a href="./app/register" id="trial" class="btn-primary txt-center"><span>Daftar Sekarang!</span></a>
                </div>
                <div class="kakapanel-2-per-3-lg kakaflex-item kakaflex kakaflex-align-right-lg kakaflex-align-center">
                    <img class="headline-card" id="headline-card" src="{{ asset('assets/img/props/headline.png') }}?1" alt="Kazhier" height="auto">
                </div>
            </div>
        </section>
        <section id="overview" class="kakakonten-md txt-center kakapadding-atas-md kakapadding-sisi-sm">
                <h1 class="txt-spotlight" id="punchline-card">Kazhier adalah solusi akuntansi untuk UKM di Indonesia</h1>
        </section>
        <section id="penjabaran" class="kakakonten-sm kakaflex kakaflex-reverse-hori kakaflex-row-gap-sm kakapadding-sisi-sm">
            <div class="kakapanel-1-per-4-lg kakapadding-sisi-xs kakaflex-item">
                <h2>Proses Bisnis Lengkap untuk Usaha Anda</h2>
                <p class="txt-just">Kazhier dapat membantu usaha Anda menjadi efisien, apapun bentuk usaha yang Anda jalankan. Buat penawaran penjualan, pengiriman pesanan, faktur penjualan, hingga penerimaan pembayaran dengan mudah dan cepat.</p>
            </div>
            <div class="kakapanel-3-per-4-lg kakaflex-item kakaflex kakaflex-align-left-lg kakaflex-align-center">
                <img class="service-card" id="service-card" src="{{ asset('assets/img/props/service.png') }}" alt="service">
            </div>
        </section>
        <section id="fitur" class="kakakonten-xl kakapadding-atas-md kakapadding-sisi-sm txt-center">
            <h2>Selesaikan pekerjaan lebih cepat dengan tepat</h2>
            <p>Dengan beragam fitur Kazhier, Anda dapat mengoptimalkan kinerja usaha Anda.</p>
            <div class="feature-list row">
                <div class="feature-item col">
                    <div class="icon-container">
                        <img src="{{ asset('assets/img/icon/keuntungan.svg') }}" width="auto" height="48" alt="laba-rugi">
                    </div>
                    <div class="name">
                        Laba/Rugi
                    </div>
                </div>
                <div class="feature-item col">
                    <div class="icon-container">
                        <img src="{{ asset('assets/img/icon/aliranUang.svg') }}" width="auto" height="48" alt="arus kas">
                    </div>
                    <div class="name">
                        Arus Kas
                    </div>
                </div>
                <div class="feature-item col">
                    <div class="icon-container">
                        <img src="{{ asset('assets/img/icon/laporan.svg') }}" width="auto" height="48" alt="jurnal">
                    </div>
                    <div class="name">
                        Jurnal
                    </div>
                </div>
                <div class="feature-item col">
                    <div class="icon-container">
                        <img src="{{ asset('assets/img/icon/buku.svg') }}" width="auto" height="48" alt="buku besar">
                    </div>
                    <div class="name">
                        Buku Besar
                    </div>
                </div>
            </div>
            <div class="feature-list row">
                <div class="feature-item col-lg-3 col">
                    <div class="icon-container">
                        <img src="{{ asset('assets/img/icon/neraca.svg') }}" width="auto" height="48" alt="neraca">
                    </div>
                    <div class="name">
                        Neraca
                    </div>
                </div>
                <div class="feature-item col">
                    <div class="icon-container">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="ellipsis-dot"></div>
                            <div class="ellipsis-dot"></div>
                            <div class="ellipsis-dot"></div>
                        </div>
                    </div>
                    <div class="name">
                        Laporan-laporan Lainnya
                    </div>
                </div>
            </div>
        </section>
        <section id="price" class="kakakonten-md kakapadding-atas-md kakapadding-sisi-sm txt-center">
            <h2>Berlangganan</h2>
            <p>Tingkatkan produktivitas dengan paket yang sesuai dengan kebutuhan Anda.</p>
            <plan-display url="{{ route('plans.list') }}"></plan-display>
        </section>
        <section id="benefits" class="kakakonten-lg kakapadding-atas-md kakapadding-sisi-sm">
            <div class="benefit-container kakaflex kakaflex-hori kakaflex-col-gap-lg-lg kakaflex-align-center" id="benefit-card">
                <div class="benefit-item kakaflex-item txt-center">
                    <div class="benefit-icon"><img src="{{ asset('assets/img/icon/team.svg') }}" alt="tim handal" height="96px" width="auto"></div>
                    <p class="title">Percayakan tugas Anda kepada tim</p>
                    <p>Serahkan kegiatan Administrasi pada tim dan Anda dapat fokus mengembangkan bisnis. Dengan akses multi-user, Anda dapat membagi tugas kepada anggota tim sesuai dengan kebutuhan.</p>
                </div>
                <div class="benefit-item kakaflex-item txt-center">
                    <div class="benefit-icon"><img src="{{ asset('assets/img/icon/anywhere.svg') }}" alt="dimanapun" height="96px" width="auto"></div>
                    <p class="title">Kerja tanpa batasan ruang</p>
                    <p>Selesaikan pekerjaan Anda dari mana saja untuk memberikan hasil kerja yang lebih efisien seperti membuat faktur penjualan dan pembelian, cek stok barang, hingga persetujuan transaksi</p>
                </div>
                <div class="benefit-item kakaflex-item txt-center">
                    <div class="benefit-icon"><img src="{{ asset('assets/img/icon/anytime.svg') }}" alt="kapanpun" height="96px" width="auto"></div>
                    <p class="title">Lihat laporan keuangan setiap saat</p>
                    <p>Tidak perlu menunggu hingga akhir bulan untuk mengetahui kondisi keuangan perusahaan. Lakukan analisa dan pengambilan keputusan lebih cepat untuk kemajuan bisnis Anda.</p>
                </div>
            </div>
        </section>
        <section id="partner" class="kakakonten-sm txt-center kakapadding-atas-sm kakapadding-sisi-sm">
            <h2>Partner Kami</h2>
            <ul class="partner-list">
                <li class="spin-0"><img src="{{ asset('assets/img/partner/ayam geprek') }}.png" alt="ayam geprek Mr.D"></li>
                <li class="spin-1"><img src="{{ asset('assets/img/partner/nasgorbas.jpeg') }}" alt="nasgorbas"></li>
                <li class="spin-2"><img src="{{ asset('assets/img/partner/tumbasgo.png') }}" alt="tumbasgo"></li>
                <li class="spin-3"><img src="{{ asset('assets/img/partner/Logo.jpg') }}" alt="HuHus"></li>
            </ul>
        </section>
        <section id="trial" class="kakabg-01">
            <div class="kakakonten-xl">
                <div class="txt-center kakapadding-atas-md kakapadding-sisi-sm kakatrial" id="try-card">
                    <h2>Kelola Bisnis Anda dengan Mudah dengan Kazhier</h2>
                    <div class="kakapadding-atas-sm">
                        <a href="./app/register" class="btn-secondary">Coba Gratis</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <section class="social-media-footer">
            <div class="kakakonten">
                <a href="https://www.instagram.com/kazhier.official/" class="social-item">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/Kazhier-101082205801767/" class="social-item">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
        </section>
        <section id="footer-menu" class="kakakonten-sm bot-menu">
            <div class="row align-items-stretch">
                <div class="col col-md-6">
                    <div class="logo-container d-flex align-items-center">
                        <img src="{{ asset('assets/img/props/logo.png') }}?1" alt="Logo Kazhier" height="36">
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="footer-navigation pb-3">
                        <a href="{{ route('agreement.show', 'term-of-service') }}">Syarat & Ketentuan</a> |
                        <a href="{{ route('agreement.show', 'policy') }}">Kebijakan Privasi</a> |
                        <a href="#">Tentang Kami</a> |
                        <a href="mailto:hello@kazhier.com">Hubungi Kami</a>
                    </div>
                    <div class="copyright">
                        Copyright &copy; PT. Teknologi Inspirasi Nusantara {{ date('Y') }}
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="{{ asset('assets/js/main-debug.js') }}"></script>
    <script src="{{ asset('assets/modules/custom-element/custom-element.js') }}"></script>
</body>
</html>