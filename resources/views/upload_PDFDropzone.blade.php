<html>
<head>
    <title>Dropzone PDF Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone PDF Upload in Laravel</h1><br>
                <form action="{{ route('pdf.store') }}" method="post" name="file" enctype="multipart/form-data" class="dropzone" id="pdf-upload">
                    @csrf
                    <div class="text-center">
                        <h3>Upload PDF Files</h3>
                    </div>
                </form>
                <button type="button" id="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;  // Disable automatic Dropzone discovery
        var myDropzone = new Dropzone('#pdf-upload', {
            maxFilesize: 1,  // Max file size in MB
            acceptedFiles: ".pdf",  // Only accept PDF files
            addRemoveLinks: true,  // Add remove links for files
            autoProcessQueue: false,  // Disable automatic upload
            init: function() {
                var submitButton = document.querySelector("#button");
                var myDropzone = this;  // Reference to the Dropzone instance

                // Trigger file upload when the button is clicked
                submitButton.addEventListener("click", function(e) {
                    e.preventDefault();  // Prevent the default action
                    myDropzone.processQueue();  // Start the upload process
                });
            },

            // Append form data to formData before sending
            this.on('sending', function(file, xhr, formData) {
                var data = $('#pdf-upload').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);  // Append each form input to formData
                });
            })
        });
    </script>
</body>
</html>
