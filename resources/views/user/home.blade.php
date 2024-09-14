@extends('user.layout.template')
@section('content')
<div class="position-relative overflow-hidden text-center bg-light" style="background-image: url('/img/hero.webp'); background-size: cover; height: calc(100vh - 4.75rem); background-position: center;">
    <div style="background-color: black; position: absolute; top: 0; right: 0; bottom: 0; left: 0; opacity: 0.6;"></div>
    <div class="col-md-5 mx-auto d-flex flex-column align-items-center justify-content-center" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;">
        <h1 class="display-4 fw-bold" style="color: white;">Sneakspark Shoes Laundry</h1>
        <p class="lead fw-normal" style="color: #CED4DA;">Perawatan profesional untuk sepatu dan tas dengan teknik khusus, menggunakan alat dan bahan premium. Kepuasan dan kualitas terbaik di setiap layanan.</p>
        <a class="btn btn-outline-light px-4 py-2 mt-4" href="/pesan">Pesan Sekarang</a>
    </div>
</div>

<!-- Section Tentang Kami -->
<!-- About 1 - Bootstrap Brain Component -->
<section style="padding: 10rem 0;" id="tentang">
    <div class="container">
        <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-5">
                <img class="img-fluid rounded" loading="lazy" src="/img/sneakspark-logo-black.png" alt="About 1">
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="row justify-content-xl-center">
                    <div class="col-12 col-xl-11">
                        <h2 class="mb-3">Siapa Kami?</h2>
                        <p class="lead fs-4 text-secondary mb-3">Kami membantu Anda menjaga kebersihan dan tampilan sepatu serta tas kesayangan Anda.</p>
                        <p class="mb-5">Kami adalah layanan yang terus berkembang, namun kami tidak pernah melupakan nilai-nilai inti kami. Kami percaya pada pelayanan yang prima, kualitas terbaik, dan kepuasan pelanggan. Kami selalu berusaha mencari cara baru untuk meningkatkan kualitas layanan kami, memastikan sepatu dan tas Anda selalu dalam kondisi terbaik.</p>
                        <div class="row gy-4 gy-md-0 gx-xxl-5X">
                            <div class="col-12 col-md-6">
                                <div class="d-flex">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                                <path d="M19.101 18H7.963c-2.934 0-4.4 0-5.295-1.117c-1.697-2.12.237-7.76 1.408-9.883c.397 2.4 4.486 2.333 5.975 2c-.992-1.999.332-2.666.994-3h.002c2.953 3.5 9.268 5.404 10.815 9.219c.669 1.648-1.236 2.781-2.76 2.781" />
                                                <path d="M2 14c4.165 1.43 6.731 1.844 10.022.804c.997-.315 1.495-.473 1.806-.452c.31.022.945.317 2.213.909c1.583.738 3.756 1.163 5.959.097M13.5 9.5L15 8m.5 3L17 9.5" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="h4 mb-3">Laundry Sepatu</h2>
                                        <p class="text-secondary mb-0">Perawatan profesional untuk sepatu bersih dan terawat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="d-flex">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16">
                                            <g fill="currentColor">
                                                <path d="M4.04 7.43a4 4 0 0 1 7.92 0a.5.5 0 1 1-.99.14a3 3 0 0 0-5.94 0a.5.5 0 1 1-.99-.14M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z" />
                                                <path d="M6 2.341V2a2 2 0 1 1 4 0v.341c2.33.824 4 3.047 4 5.659v5.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5V8a6 6 0 0 1 4-5.659M7 2v.083a6 6 0 0 1 2 0V2a1 1 0 0 0-2 0m1 1a5 5 0 0 0-5 5v5.5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5V8a5 5 0 0 0-5-5" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="h4 mb-3">Laundry Tas</h2>
                                        <p class="text-secondary mb-0">Cucian tas yang menjaga kualitas dan tampilan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Pelayanan -->
<section class="album" id="layanan" style="padding: 10rem 0;">
    <div class="container">
        <h2 class="text-center mb-5">Layanan</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
            @foreach ($layanans as $layanan)
            <div class="col">
                <div class="card h-100 border-0">
                    <img src="{{asset('storage/' . $layanan->image)}}" class="card-img-top img-fluid" height="100" alt="{{$layanan->nama_layanan}}">
                    <div class="card-body px-0">
                        <h5 class="card-title fw-bold fs-3">{{$layanan->nama_layanan}}</h5>
                        <p class="card-text">{{$layanan->deskripsi}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Button trigger modal -->
        <div class="px-2 text-center">
            <button type="button" class="btn btn-outline-primary mt-5" style="padding: 16px 48px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Lihat Menu
            </button>
        </div>
    </div>
</section>

<!-- Section Testimoni -->
<section class="bg-dark text-light" id="testimoni" style="padding: 9.375rem 0;">
    <div class="container">
        <h2 class="text-center mb-5">Testimoni</h2>
        <div id="carouselExampleIndicators" class="carousel slide mt-3" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner mx-auto" style="max-width: 56.25rem;">
                <div class="carousel-item text-center fs-4 active" style="height: 15rem;">
                    <div class="mb-4">"Saya sangat puas dengan pelayanan Sneakspark Shoes Laundry. Sepatu saya yang tadinya kotor dan rusak kembali bersih dan terlihat seperti baru! Prosesnya cepat dan hasilnya sangat rapi. Recommended banget!"</div>
                    <div class="text-secondary">@mutiarajelitaa</div>
                </div>
                <div class="carousel-item text-center fs-4" style="height: 15rem;">
                    <div class="mb-4">"Saya menggunakan layanan mengganti warna sepatu di Sneakspark, dan hasilnya luar biasa! Warna baru sepatu saya sangat sesuai dengan yang saya inginkan, dan catnya tahan lama. Pelayanannya juga ramah dan profesional."</div>
                    <div class="text-secondary">@analianoya</div>
                </div>
                <div class="carousel-item text-center fs-4" style="height: 15rem;">
                    <div class="mb-4">"Sneakspark benar-benar menyelamatkan sepatu favorit saya. Jahitannya yang tadinya lepas diperbaiki dengan sangat rapi, bahkan lebih kuat dari sebelumnya. Pasti akan kembali lagi!"</div>
                    <div class="text-secondary">@jekyyy.f</div>
                </div>
                <div class="carousel-item text-center fs-4" style="height: 15rem;">
                    <div class="mb-4">"Pelayanan cepat dan hasilnya memuaskan! Sol sepatu saya diganti dengan sangat baik, dan sekarang sepatu saya kembali nyaman dipakai untuk jalan jauh. Harga sesuai kualitas!"</div>
                    <div class="text-secondary">@anggihadid</div>
                </div>
                <div class="carousel-item text-center fs-4" style="height: 15rem;">
                    <div class="mb-4">"Tas kulit saya terlihat baru lagi setelah dicuci di Sneakspark. Benar-benar terawat dan kulitnya tetap lembut. Sangat merekomendasikan bagi yang butuh perawatan tas atau sepatu!"</div>
                    <div class="text-secondary">@valdokumbangsila</div>
                </div>
                <div class="carousel-item text-center fs-4" style="height: 15rem;">
                    <div class="mb-4">"Sneakspark membantu menghilangkan noda kuning yang mengganggu di sepatu putih saya. Hasilnya benar-benar bersih, dan noda hilang total. Terima kasih Sneakspark!"</div>
                    <div class="text-secondary">@lutfialstr</div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Section Galeri -->
<section id="galeri" class="container" style="padding: 160px 0;">
    <h2 class="text-center mb-5">Galeri</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
        <div class="col">
            <img src="/img/galeri-1.jpg" class="img-fluid" alt="Galeri 1">
        </div>
        <div class="col">
            <img src="/img/galeri-2.jpg" class="img-fluid" alt="Galeri 2">
        </div>
        <div class="col">
            <img src="/img/galeri-3.jpg" class="img-fluid" alt="Galeri 3">
        </div>
        <div class="col">
            <img src="/img/galeri-4.jpg" class="img-fluid" alt="Galeri 4">
        </div>
        <div class="col">
            <img src="/img/galeri-5.jpg" class="img-fluid" alt="Galeri 5">
        </div>
        <div class="col">
            <img src="/img/galeri-6.jpg" class="img-fluid" alt="Galeri 6">
        </div>
    </div>
</section>

<!-- Section Kontak -->
<section id="kontak" class="bg-light" style="padding: 160px 0;">
    <div class="container">
        <h2 class="text-center mb-5">Kontak</h2>

        <div class="row gy-4 mt-3">

            <div class="col-lg-6">
                <div class="py-4 bg-white d-flex flex-column justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
                        <path fill="#3b82f6" d="M12 19.35q3.05-2.8 4.525-5.087T18 10.2q0-2.725-1.737-4.462T12 4T7.738 5.738T6 10.2q0 1.775 1.475 4.063T12 19.35m0 1.975q-.35 0-.7-.125t-.625-.375Q9.05 19.325 7.8 17.9t-2.087-2.762t-1.275-2.575T4 10.2q0-3.75 2.413-5.975T12 2t5.588 2.225T20 10.2q0 1.125-.437 2.363t-1.275 2.575T16.2 17.9t-2.875 2.925q-.275.25-.625.375t-.7.125M12 12q.825 0 1.413-.587T14 10t-.587-1.412T12 8t-1.412.588T10 10t.588 1.413T12 12" />
                    </svg>
                    <h4 class="mt-3">Alamat</h4>
                    <p>A108 Adam Street, New York, NY 535022</p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
                <div class="py-4 bg-white d-flex flex-column justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
                        <path fill="#3b82f6" d="M7 23q-.825 0-1.412-.587T5 21V3q0-.825.588-1.412T7 1h10q.825 0 1.413.588T19 3v18q0 .825-.587 1.413T17 23zm0-3v1h10v-1zm0-2h10V6H7zM7 4h10V3H7zm0 0V3zm0 16v1z" />
                    </svg>
                    <h4 class="mt-3">Hubungi Kami</h4>
                    <p>+62 8387 2764 001</p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
                <div class="py-4 bg-white d-flex flex-column justify-content-center h-100 align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
                        <path fill="#3b82f6" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
                    </svg>
                    <h4 class="mt-3">Instagram</h4>
                    <a href="https://www.instagram.com/sneakspark_/" target="_blank">@sneakspark_</a>
                </div>
            </div><!-- End Info Item -->

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 bg-transparent border-0">
            <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle" data-bs-dismiss="modal" aria-label="Close"></button>
            <img src="/img/menu.jpg" alt="Daftar Menu Layanan">
        </div>
    </div>
</div>

<!-- Whatsapp -->
<a href="https://wa.me/6283872764001" target="_blank" style="position: fixed; right: 32px; bottom: 32px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 256 258">
        <defs>
            <linearGradient id="logosWhatsappIcon0" x1="50%" x2="50%" y1="100%" y2="0%">
                <stop offset="0%" stop-color="#1FAF38" />
                <stop offset="100%" stop-color="#60D669" />
            </linearGradient>
            <linearGradient id="logosWhatsappIcon1" x1="50%" x2="50%" y1="100%" y2="0%">
                <stop offset="0%" stop-color="#F9F9F9" />
                <stop offset="100%" stop-color="#FFF" />
            </linearGradient>
        </defs>
        <path fill="url(#logosWhatsappIcon0)" d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a123 123 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004" />
        <path fill="url(#logosWhatsappIcon1)" d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416m40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513z" />
        <path fill="#FFF" d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561s11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716s-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64" />
    </svg>
</a>
@endsection
