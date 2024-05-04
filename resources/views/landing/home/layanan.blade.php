@extends('landing.layouts.main')

@section('container')
    {{-- Layanan --}}
    <section id="layanan" class="bg-dasar">
        <div class="container px-4 py-5">
            <h2 class="pb-2 writertext text-title">{{ Request::is('*tk') ? 'Taman Kanak-Kanak' : 'Kelompok Bermain' }}
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="row">
                @foreach ($kelas as $k)
                    <div class="col-sm-4 mt-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelas {{ $k->kelas }}</h5>
                                <p class="card-text">Wali Kelas : {{ $k->tendik->nama }} <br><span>Tingkat : {{ $k->tingkat }}</span></p>
                                <a href="/about_us/kelas/{{ $k->tendik_id }}/*" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
