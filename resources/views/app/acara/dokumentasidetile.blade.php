@extends('app.layouts.main')
@section('container')
    <!-- Begin Page Content -->

    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert bg-warning text-white" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h5 class="mb-3 text-uppercase">DOKUMENTASI
            {{ $kegiatan->judul }}
        </h5>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12 mb-3">
                <a href="/acara/dokumentasi/{{ $jenis }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                </a>
                <a data-toggle="modal" data-target="#tambahFoto" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Dokumentasi</span>
                </a>
            </div>
        </div>

    </div>



    <div class="container side-hp m-footer">

        <div>

            <div class="row mb-2 justify-content-center">
                <?php foreach ($dokumentasi as $d) : ?>
                <?php $target = preg_replace('/[^a-zA-Z0-9]/', '', $d['gambar']);
                $gambar = false;
                foreach ($img as $i) {
                    if ($d['id'] == $i['id']) {
                        $gambar = true;
                        break;
                    }
                }
                ?>
                <?php if ($gambar) : ?>
                <div class="gambar shadow" data-toggle="modal" data-target="<?= '#hp' . $target ?>">
                    <img class="modified-gambar" src="{{ asset('storage/' . $d['gambar']) }}">
                    <p class="text-center tulisan-gambar text-gray-600"><?= $d['judul'] ?></p>
                </div>
                <!-- Modal Lihat Foto -->
                <div class="modal fade" id="hp<?= $target ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="gambar-modal modal-body">
                                <img class="modified-gambar1" src="{{ asset('storage/' . $d['gambar']) }}">
                            </div>
                            <form action="/acara/dokumentasi/ubahdok" method="POST">
                                @csrf
                                <div class="modal-footer">
                                    <input type="hidden" class="form-control" id="iddok" name="iddok"
                                        value="{{ $d->id }}">
                                    <input type="hidden" class="form-control" id="idkegiatan" name="idkegiatan"
                                        value="{{ $kegiatan->id }}">
                                    <input type="hidden" class="form-control" id="jenis" name="jenis"
                                        value="{{ $jenis }}">
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="<?= $d['judul'] ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <a href="/acara/dokumentasi/hapusdok/{{ $jenis }}/{{ $kegiatan->id }}/{{ $d->id }}"
                                        class="btn btn-danger">Hapus</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                <div class="gambar shadow" data-toggle="modal" data-target="<?= '#' . $target ?>">
                    <video controls="true" class="modified-gambar">
                        <source src="{{ asset('storage/' . $d['gambar']) }}" type="video/webm">
                    </video>
                    <p class="text-center tulisan-gambar text-gray-600"><?= $d['judul'] ?></p>
                </div>
                <div class="modal fade" id="hp<?= $target ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="gambar-modal modal-body">
                                <video controls="true" class="modified-gambar1">
                                    <source src="{{ asset('storage/' . $d['gambar']) }}" type="video/webm">
                                </video>
                            </div>
                            <form action="/acara/dokumentasi/ubahdok" method="POST">
                                @csrf
                                <div class="modal-footer">
                                    <input type="hidden" class="form-control" id="iddok" name="iddok"
                                        value="{{ $d->id }}">
                                    <input type="hidden" class="form-control" id="idkegiatan" name="idkegiatan"
                                        value="{{ $kegiatan->id }}">
                                    <input type="hidden" class="form-control" id="jenis" name="jenis"
                                        value="{{ $jenis }}">
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="<?= $d['judul'] ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <a href="/acara/dokumentasi/hapusdok/{{ $jenis }}/{{ $kegiatan->id }}/{{ $d->id }}"
                                        class="btn btn-danger">Hapus</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <!-- End Table -->

    <div class="container side-com">

        <!-- DataTales Example -->
        <div class="row mb-2 justify-content-center">
            <?php foreach ($dokumentasi as $d) : ?>
            <?php $target = preg_replace('/[^a-zA-Z0-9]/', '', $d['gambar']);
            $gambar = false;
            foreach ($img as $i) {
                if ($d['id'] == $i['id']) {
                    $gambar = true;
                    break;
                }
            }
            ?>
            <?php if ($gambar) : ?>
            <div class="gambar shadow" data-toggle="modal" data-target="<?= '#' . $target ?>">
                <img class="modified-gambar" src="{{ asset('storage/' . $d['gambar']) }}">
                <p class="text-center tulisan-gambar text-gray-600"><?= $d['judul'] ?></p>
            </div>
            <!-- Modal Lihat Foto -->
            <div class="modal fade" id="<?= $target ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="gambar-modal modal-body">
                            <img class="modified-gambar1" src="{{ asset('storage/' . $d['gambar']) }}">
                        </div>
                        <form action="/acara/dokumentasi/ubahdok" method="POST">
                            @csrf
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" id="iddok" name="iddok"
                                    value="{{ $d->id }}">
                                <input type="hidden" class="form-control" id="idkegiatan" name="idkegiatan"
                                    value="{{ $kegiatan->id }}">
                                <input type="hidden" class="form-control" id="jenis" name="jenis"
                                    value="{{ $jenis }}">
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="<?= $d['judul'] ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="/acara/dokumentasi/hapusdok/{{ $jenis }}/{{ $kegiatan->id }}/{{ $d->id }}"
                                    class="btn btn-danger">Hapus</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php else : ?>
            <div class="gambar" data-toggle="modal" data-target="<?= '#' . $target ?>">
                <video controls="true" class="modified-gambar">
                    <source src="{{ asset('storage/' . $d['gambar']) }}" type="video/webm">
                </video>
                <p class="text-center tulisan-gambar text-gray-600"><?= $d['judul'] ?></p>
            </div>
            <div class="modal fade" id="<?= $target ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="gambar-modal modal-body">
                            <video controls="true" class="modified-gambar1">
                                <source src="{{ asset('storage/' . $d['gambar']) }}" type="video/webm">
                            </video>
                        </div>
                        <form action="/acara/dokumentasi/ubahdok" method="POST">
                            @csrf
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" id="iddok" name="iddok"
                                    value="{{ $d->id }}">
                                <input type="hidden" class="form-control" id="idkegiatan" name="idkegiatan"
                                    value="{{ $kegiatan->id }}">
                                <input type="hidden" class="form-control" id="jenis" name="jenis"
                                    value="{{ $jenis }}">
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="<?= $d['judul'] ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="/acara/dokumentasi/hapusdok/{{ $jenis }}/{{ $kegiatan->id }}/{{ $d->id }}"
                                    class="btn btn-danger">Hapus</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>



    <!-- Modal Tambah Foto -->
    <div class="modal fade" id="tambahFoto" tabindex="-1" role="dialog" aria-labelledby="tambahFotoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahFotoLabel">Tambah Foto Kegiatan</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/acara/dokumentasi/tambahdok" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Judul Dokumentasi</label>
                            <input type="hidden" class="form-control" id="jenis" name="jenis"
                                value="{{ $jenis }}">
                            <input type="hidden" class="form-control" id="idkegiatan" name="idkegiatan"
                                value="{{ $kegiatan->id }}">
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-2">
                            <label>Foto/Video</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" required>
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
