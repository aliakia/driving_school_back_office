<!-- resources/views/upload.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>

<body>
    <form id="uploadForm" method="POST" enctype="multipart/form-data" action="{{ route('upload') }}">
        @csrf
        <input type="file" name="logo_big" id="logo_big" class="form-control" accept="image/*" />
        <button type="button" onclick="uploadFile()">Upload</button>
    </form>

    <script>
        function uploadFile() {
            const formData = new FormData(document.getElementById('uploadForm'));

            fetch('{{ route('upload') }}', {
                    method: 'POST',
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data); // Debugging: Log the response data
                    if (data.success) {
                        alert('File uploaded successfully');
                    } else {
                        alert('Upload failed: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred: ' + error.message);
                });
        }
    </script>

</body>

</html>
