@extends('admin.layout.template')
@section('content')
<section class="container">
    <div class="mb-3 mt-5" style="border-radius: .5rem;">
        <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center"
                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                <img src="/img/profil.png"
                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                <h5>Marie Horwitz</h5>
                <p>Pemilik</p>
            </div>
            <div class="col-md-8">
                <div class="card-body p-4">
                    <div class="row pt-1">
                        <div class="col-6 mb-3">
                            <h6>Email</h6>
                            <p class="text-muted">info@example.com</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6>No Handphone</h6>
                            <p class="text-muted">08123456789</p>
                        </div>
                        <div class="col-12 mb-3">
                            <h6>Alamat</h6>
                            <p class="text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi doloremque repudiandae omnis veniam eaque architecto, mollitia voluptatem esse maiores tenetur, magni, officiis quo culpa voluptate! Accusamus rem vero vitae doloribus!</p>
                        </div>
                        <hr />
                        <div class="col-12 mb-3">
                            <a class="btn btn-primary mt-2" href="/pegawai/profil/ubah/123">Ubah Profil</a>
                            <a class="btn btn-primary mt-2" href="/pegawai/profil/password/123">Ubah Password</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
