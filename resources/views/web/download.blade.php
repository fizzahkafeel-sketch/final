<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link href="image.1.png" rel="icon">
    <title>Download Image - ImageSeal</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("bootstrap.min.css")}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset("style.css")}}" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #d4e4e4;
        }

        .header {
            background-color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 32px;
            font-weight: 300;
            color: #333;
        }

        .nav {
            display: flex;
            gap: 30px;
        }

        .nav a {
            color: #008080;
            text-decoration: none;
            font-size: 16px;
        }

        .download-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 200px);
            padding: 40px 20px;
        }

        .download-content {
            background-color: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        .download-content h2 {
            color: #008080;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .download-content p {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .image-preview {
            max-width: 100%;
            max-height: 400px;
            border: 2px solid #008080;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .download-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .download-button:hover {
            background-color: #218838;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        .download-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .back-button {
            background-color: #008080;
            color: white;
            border: none;
            padding: 10px 30px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .back-button:hover {
            background-color: #006666;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        .no-image-message {
            color: #dc3545;
            font-size: 1.2rem;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom border-2 border-white">
                <h1>imageseal</h1>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('web-home') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        @auth
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-item nav-link" style="border: none; background: none; color: #008080; cursor: pointer;">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Download Section Start -->
    <div class="download-container">
        <div class="download-content">
            <h2>Your Watermarked Image is Ready!</h2>
            <p>Preview your image below and click the download button to save it to your device.</p>
            
            <div id="imageContainer">
                <img id="imagePreview" class="image-preview" alt="Watermarked Image" style="display: none;">
                <div id="noImageMessage" class="no-image-message" style="display: none;">
                    No image found. Please go back and seal your image first.
                </div>
            </div>
            
            <button id="downloadButton" class="download-button" disabled>
                Download Image
            </button>
            
            <div style="margin-top: 20px;">
                <a href="{{ route('watermark.editor') }}" class="back-button">Back to Editor</a>
            </div>
        </div>
    </div>
    <!-- Download Section End -->

    <script>
        // Get image data from localStorage
        const imageDataUrl = localStorage.getItem('sealedImage');
        const imagePreview = document.getElementById('imagePreview');
        const downloadButton = document.getElementById('downloadButton');
        const noImageMessage = document.getElementById('noImageMessage');

        if (imageDataUrl) {
            // Display the image
            imagePreview.src = imageDataUrl;
            imagePreview.style.display = 'block';
            noImageMessage.style.display = 'none';
            downloadButton.disabled = false;
        } else {
            // No image found
            imagePreview.style.display = 'none';
            noImageMessage.style.display = 'block';
            downloadButton.disabled = true;
        }

        // Download functionality
        downloadButton.addEventListener('click', function() {
            if (!imageDataUrl) {
                alert('No image available to download.');
                return;
            }

            // Create download link
            const link = document.createElement('a');
            link.href = imageDataUrl;
            
            // Generate filename with timestamp
            const timestamp = new Date().getTime();
            link.download = `watermarked-image-${timestamp}.png`;
            
            // Trigger download
            document.body.appendChild(link);
            link.click();
            
            // Clean up
            document.body.removeChild(link);
            
            alert('Image downloaded successfully!');
        });
    </script>
</body>
</html>

