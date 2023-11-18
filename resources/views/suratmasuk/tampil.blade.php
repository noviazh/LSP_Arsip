@extends('layouts.master')
@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <div>
            <form>
                <div class=row>
                    <div class="col">
                        <h3><i class="nav-icon fas fa-envelope-open-text my-2 btn-sm-1"></i> File Surat Masuk</h3>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                            <th>No. Surat: {{$suratmasuk->no_surat}}</br>
                            <th>Kategori : {{$suratmasuk->kode}}</br>
                            <th>Judul:{{$suratmasuk->isi}}</br>
                          <th>Tgl. Surat:{{$suratmasuk->tgl_surat}}</th>
                        <h5>Nama File : {{$suratmasuk->filemasuk}}</h5>
                    </div>
                    <div class=col-4>
                        <a style="float: right" class="btn btn-primary btn-sm my-4 mr-sm-2"
                            href="/datasuratmasuk/{{$suratmasuk->filemasuk}}" download="{{$suratmasuk->filemasuk}}"
                            role="button"><i class="fas fa-file-download"></i> Download</a>      
                        <a style="float: right" class="btn btn-danger btn-sm my-4 mr-sm-2" href="/suratmasuk/index"
                            role="button"><i class="fas fa-undo"></i> Kembali</a>
                           

   
<form method="POST" action="/suratmasuk/update" enctype="multipart/form-data">
    <!-- ... bagian formulir lainnya ... -->
    <div class="input-group-append">
        <button class="btn btn-warning btn-sm my-4 mr-sm-2" type="button" onclick="document.getElementById('fileInput').click()">
            Edit file
        </button>
        <input name="filemasuk" type="file" class="form-control-file" id="fileInput" style="display:none" 
            onchange="displaySelectedFile()">
        <small id="exampleFormControlFile1" class="text-warning"></small>
    </div>
    <!-- ... tombol submit dan elemen formulir lainnya ... -->
</form>

</div>
<div id="filePreview" class="mt-2">
    <!-- Pratinjau file akan ditampilkan di sini (jika diperlukan) -->
</div>
<script>
    function updateFilePreview(input) {
        var file = input.files[0];
        var previewContainer = document.getElementById('filePreview');

        if (file) {
            // Jika ada file yang dipilih, tampilkan pratinjau atau ganti file
            var reader = new FileReader();

            reader.onload = function (e) {
                // Tampilkan pratinjau (jika diperlukan)
                var previewElement = document.createElement('div');
                previewElement.innerHTML = '<strong>Pratinjau:</strong> ' + file.name;
                previewContainer.innerHTML = '';
                previewContainer.appendChild(previewElement);

                // Tambahkan logika ganti file atau simpan data ke server
                // Anda dapat menambahkan logika penggantian file atau simpan data ke server di sini
            };

            reader.readAsDataURL(file);
        } else {
            // Jika tidak ada file yang dipilih, hapus pratinjau
            previewContainer.innerHTML = '';
        }

        // Perbarui label file dengan nama file yang baru dipilih
        document.querySelector('.custom-file-label').innerHTML = file ? file.name : 'Pilih file';
    }
</script>

                    </div>
                </div>
            </form>
            <div class="text-center">
                <embed src="{{ URL::to('/') }}/datasuratmasuk/{{$suratmasuk->filemasuk}}" type="application/pdf" width="100%"
                    height="600px" />
            </div>
        </div>
    </div>
</section>
@endsection
