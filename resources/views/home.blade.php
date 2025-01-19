<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EyeCareAI - Cataract Detection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="/images/eyecare_icon.png" type="image/png">
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="text-center">
            <img src="/images/eyecare_logo.png" alt="EyeCareAI Logo" width="150">
            <h1 class="mt-3">EyeCareAI</h1>
            <p class="lead">Empowering early detection of cataracts with AI technology.</p>
        </div>

        <!-- Model Description -->
        <div class="card mt-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">About the Model</h5>
                <p class="card-text">
                    The EyeCareAI system uses a Convolutional Neural Network (CNN) trained on thousands of eye images to detect the presence of cataracts with high accuracy. The model ensures quick and reliable predictions for medical practitioners and researchers.
                </p>
            </div>
        </div>

        <!-- Usage Steps -->
        <div class="card mt-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">How to Use</h5>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item">Upload an eye image in <strong>JPG</strong> or <strong>PNG</strong> format.</li>
                    <li class="list-group-item">Click the <strong>Analyze</strong> button.</li>
                    <li class="list-group-item">View the results to see if the image is classified as <strong>Cataract</strong> or <strong>Normal</strong>.</li>
                </ol>
            </div>
        </div>

        <!-- Upload Form -->
        <div class="card mt-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Upload Eye Image</h5>
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="/upload" method="POST" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Select Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Analyze</button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-transparent text-gray-700 py-4">
            <div class="container mx-auto text-center">
                <p class="text-sm">&copy; 2025 <span class="font-semibold">EyeCareAI</span>. Developed by <strong>Yudha Jarod Krisnawan</strong>. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
