@extends('user.layout.template')
@section('content')
<div class="position-relative overflow-hidden text-center bg-light" style="background-image: url('/img/hero.jpg'); background-size: cover; height: 560px;">
    <div style="background-color: black; position: absolute; top: 0; right: 0; bottom: 0; left: 0; opacity: 0.3;"></div>
    <div class="col-md-5 px-lg-4 py-lg-5 mx-auto my-5" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;">
        <h1 class="display-4 fw-bold" style="color: white;">Sneakspark Shoes Laundry</h1>
        <p class="lead fw-normal text-white">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
        <a class="btn btn-outline-secondary" href="#">Coming soon</a>
    </div>
</div>

<!-- Section Tentang Kami -->
<!-- About 1 - Bootstrap Brain Component -->
<section style="padding: 160px 0;">
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
<section class="album" style="padding: 160px 0;">
    <div class="container">
        <h2 class="text-center mb-5">Pelayanan</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top img-fluid" height="100" alt="Gambar Layanan">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Easy Clean</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Gambar Layanan">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Medium Clean</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Gambar Layanan">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Hard Clean</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Gambar Layanan">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Leather Treatment</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Gambar Layanan">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Unyellowing</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Button trigger modal -->
        <div class="px-2 text-center">
            <button type="button" class="btn btn-primary mt-5" style="padding: 1rem 3rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Lihat Menu
            </button>
        </div>
    </div>
</section>

<!-- Section Testimoni -->
<section class="bg-dark text-light" style="padding: 150px 0;">
    <div class="container">
        <h2 class="text-center mb-5">Testimoni</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner mx-auto" style="max-width: 900px;">
                <div class="carousel-item text-center fs-4 active" style="height: 240px;">
                    <div class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis vitae officiis at provident earum architecto, autem possimus aut cum. Nesciunt.</div>
                    <div class="text-secondary">Gama Kusumah</div>
                </div>
                <div class="carousel-item text-center fs-4" style="height: 240px;">
                    <div class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis vitae officiis at provident earum architecto, autem possimus aut cum. Nesciunt.</div>
                    <div class="text-secondary">Gama Kusumah</div>
                </div>
                <div class="carousel-item text-center fs-4" style="height: 240px;">
                    <div class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis vitae officiis at provident earum architecto, autem possimus aut cum. Nesciunt.</div>
                    <div class="text-secondary">Gama Kusumah</div>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 bg-transparent border-0">
            <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle" data-bs-dismiss="modal" aria-label="Close"></button>
            <img src="/img/menu.jpg" alt="Daftar Menu Layanan">
        </div>
    </div>
</div>

@endsection
