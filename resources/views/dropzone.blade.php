<html>
<head>
    <title>Dropzone Image Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone Image Upload in Laravel</h1><br>
                <form action="{{ route('dropzone.store') }}" method="post" name="file" enctype="multipart/form-data" class="dropzone" id="image-upload">
                    @csrf
                    <div class="text-center">
                        <h3>Upload Multiple Images</h3>
                    </div>
                </form>
                <button type="button" id="id-button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 10, // Batas ukuran file (dalam MB)
            acceptedFiles: ".jpeg,.jpg,.png,.gif", // Tipe file yang diterima
            addRemoveLinks: true, // Menambahkan tautan untuk menghapus file
            createImageThumbnails: true, // Membuat thumbnail gambar
            autoProcessQueue: false, // Menonaktifkan pemrosesan otomatis
            init: function() {
                var myDropzone = this;

                // Aksi ketika tombol upload diklik
                $("#id-button").click(function(e) {
                    e.preventDefault(); // Mencegah aksi default tombol
                    myDropzone.processQueue(); // Memproses antrian dan meng-upload
                });
            },

            // Menambahkan data form ke formData
            sending: function(file, xhr, formData) {
                var data = $('#image-upload').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
            }
        };
    </script>
</body>
</html>
