<!DOCTYPE html>
<html>
<head>
    <title>Gift Certificate</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center fw-bold">{{ $sender }}</h1>

        <!-- Centered QR Code -->
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="qr-code">
                    <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code" height="250px" width="250px">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
