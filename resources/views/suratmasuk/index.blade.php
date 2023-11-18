@extends('layouts.master')
@section('content')

<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row">
            <div class="col">
                <h3><i class="nav-icon fas fa-envelope my-1 btn-sm-1"></i> Surat Masuk</h3>
                <hr />
            </div>
        </div>
        <div class="col">
                <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="create" role="button"><i class="fas fa-plus"></i>
                    Arsipkan Surat</a>
                <br>
            </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="search">Pencarian:</label>
                <input type="text" class="form-control" id="search" placeholder="Ketik untuk mencari...">
            </div>
        </div>

        <div class="row table-responsive">
            <div class="col">
                <table class="table table-hover table-head-fixed" id='tabelSuratmasuk'>
                    <thead>
                        <tr class="bg-light">
                            <th>No. Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Tgl. Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($data_suratmasuk as $suratmasuk)
                        <?php $no++ ;?>
                        <tr>
                        <tr>
                        <td>{{$suratmasuk->no_surat}}</td>
                        <td>{{$suratmasuk->kode}}</td>
                        <td>{{$suratmasuk->isi}}</td>
                        <td>{{$suratmasuk->tgl_surat}}</td>
                        <td>
                            <a href="/suratmasuk/{{$suratmasuk->id}}/tampil" class="btn btn-primary btn-sm my-1 mr-sm-1 btn-block"><i class=""></i> Lihat << </a>
                            <a href="/datasuratmasuk/{{$suratmasuk->filemasuk}}" download="{{$suratmasuk->filemasuk}}" class="btn btn-primary btn-sm my-1 mr-sm-1 btn-block"><i class=""></i> Download</a>
                            @if (auth()->user()->role == 'admin')
                                <a href="/suratmasuk/{{$suratmasuk->id}}/delete" class="btn btn-danger btn-sm my-1 mr-sm-1 btn-block" onclick="return confirm('Hapus Data ?')"><i class=""></i> Hapus</a>
                            @endif
    </td>
</tr>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#tabelSuratmasuk').DataTable({
            "searching": true,
            "paging": true,
            // Opsi lainnya sesuai kebutuhan
        });
    });
</script>

@endsection
