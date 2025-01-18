<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EyeCareAI - Analysis Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="/images/eyecare_icon.png" type="image/png">
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="text-center">
            <img src="/images/eyecare_logo.png" alt="EyeCareAI Logo" width="150">
            <h1 class="mt-3">EyeCareAI</h1>
            <p class="lead">Your analysis result is ready!</p>
        </div>

        <!-- Analysis Result -->
        <div class="alert alert-info text-center mt-4" role="alert">
            @if(isset($result['result']))
                <h4>The image is classified as:</h4>
                <strong class="text-uppercase display-5">{{ $result['result'] }}</strong>
            @else
                <strong>Error:</strong> No prediction result available.
            @endif
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-center mt-4">
            <a href="/" class="btn btn-primary me-2">Analyze Another Image</a>
            <a href="/usage-guide" class="btn btn-outline-secondary">History</a>
        </div>

        <!-- Footer -->
        <footer class="text-center mt-5 text-muted">
            <small>&copy; 2025 EyeCareAI. All rights reserved.</small>
        </footer>
    </div>
</body>
</html>
