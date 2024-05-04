@extends('app.layouts.main')
@section('container')
    <div class="container side-hp m-footer">
        @if (session()->has('success'))
            <div class="alert bg-warning text-white" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div style="margin-top: 30px;"></div>
        <!-- Begin Page Content -->
        <div class="row mb-2 justify-content-center">

            <?php $i = 1; ?>
            <?php foreach ($gambar as $g) : ?>
            <?php $target = preg_replace('/[^a-zA-Z0-9]/', '', $g['gambar']); ?>
            <div class="gambar shadow" style="margin-left: 10px; margin-right:10px;" data-toggle="modal" data-target="<?= '#hp' .
                $target ?>">
                <img class="modified-gambar" src="{{ asset('storage/' . $g['gambar']) }}">
            </div>
            <!-- Modal Lihat Foto -->
            <div class="modal fade" id="hp<?= $target ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="gambar-modal modal-body">
                            <img class="modified-gambar1" src="{{ asset('storage/' . $g['gambar']) }}">
                        </div>
                        <form action="/acara/landing/ubah" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" id="lama" name="lama"
                                    value="<?= $g['gambar'] ?>">
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="<?= $g['id'] ?>">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar"><?= $g['gambar'] ?></label>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php $i++; ?>
            <?php endforeach; ?>

        </div>

    </div>
    <div class="container side-com">
        <div style="margin-top: 50px;"></div>
        <!-- Begin Page Content -->
        <div class="container">

            @if (session()->has('success'))
                <div class="alert bg-warning text-white" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mb-2 justify-content-center">

                <?php $i = 1; ?>
                <?php foreach ($gambar as $g) : ?>
                <?php $target = preg_replace('/[^a-zA-Z0-9]/', '', $g['gambar']); ?>
                <div class="gambar shadow" data-toggle="modal" data-target="<?= '#' . $target ?>">
                    <img class="modified-gambar" src="{{ asset('storage/' . $g['gambar']) }}">
                </div>
                <!-- Modal Lihat Foto -->
                <div class="modal fade" id="<?= $target ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="gambar-modal modal-body">
                                <img class="modified-gambar1" src="{{ asset('storage/' . $g['gambar']) }}">
                            </div>
                            <form action="/acara/landing/ubah" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-footer">
                                    <input type="hidden" class="form-control" id="lama" name="lama"
                                        value="<?= $g['gambar'] ?>">
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        value="<?= $g['id'] ?>">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar"><?= $g['gambar'] ?></label>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php $i++; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
@endsection
