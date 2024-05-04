@extends('landing.layouts.main')

@section('container')
    {{-- Layanan --}}
    <section id="layanan" class="bg-dasar">
        <div class="container px-4 py-5">
            <h2 class="pb-2 writertext text-title">Tenaga Kependidikan
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="row">
                @foreach ($tendik as $t)
                    <div class="col-md-4 mt-4">
                        <div class="card shadow-sm">
                            <div style="width:100%;">
                                @if ($t->image == null)
                                    <img src="/img/app/default.jpg" class="card-img-top img-tendik">
                                @else
                                    <img src="{{ asset('storage/' . $t['image']) }}" class="card-img-top img-tendik" />
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="isi-card mb-1" style="height:150px; overflow:hidden;">
                                    <h5 class="card-title">{{ $t->nama }}</h5>
                                    <p>{{ $t->role }}</p>
                                    <p class="card-text">{{ $t->deskripsi }}</p>
                                </div>
                                <a data-bs-toggle="modal" data-bs-target="#view{{ $t->id }}"
                                    class="btn btn-outline-primary">More</a>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="view{{ $t->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $t->nama }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>

                                </div>
                                <div class="gambar-modal modal-body">
                                    @if ($t->image == null)
                                        <img src="/img/app/default.jpg" style="width: 100%; height:100%; object-fit:contain;">
                                    @else
                                        <img src="{{ asset('storage/' . $t['image']) }}" style="width: 100%; height:100%; object-fit:contain;" />
                                    @endif
                                    <p class="mt-2">{{ $t->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
