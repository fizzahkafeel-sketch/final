<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Favicon -->
    <link href="image.1.png" rel="icon">
    <title>ImageSeal</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("bootstrap.min.css")}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset("style.css")}}" rel="stylesheet">

    <!-- Custom Styles for Image Upload -->
    <style>
        .drop-zone {
            border: 2px dashed #ccc;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
            background-color: #fff;
            cursor: pointer;
        }

        .drop-zone:hover {
            border-color: #007bff;
            background-color: #f8f9fa;
        }

        .drop-zone.drag-over {
            border-color: #007bff;
            background-color: #e7f3ff;
            transform: scale(1.02);
        }

        .drop-zone.file-selected {
            border-color: #28a745;
            background-color: #f0fff4;
        }

        .drop-zone.uploading {
            border-color: #ffc107;
            background-color: #fffbf0;
        }

        .drop-zone.upload-success {
            border-color: #28a745;
            background-color: #d4edda;
        }

        .drop-zone.upload-error {
            border-color: #dc3545;
            background-color: #f8d7da;
        }

        .drop-zone-text {
            font-size: 1.2rem;
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
        }

        .drop-zone-subtext {
            color: #666;
            margin: 10px 0;
        }

        .browse-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .browse-btn:hover {
            background-color: #0056b3;
        }

        .file-input {
            display: none;
        }

        .button-row {
            width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        @media (max-width: 576px) {
            .button-row {
                flex-direction: column;
            }

            .button-row .btn {
                width: 100%;
            }
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
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

        .main-container {
            display: flex;
            height: calc(100vh - 80px);
            background-color: #d4e4e4;
        }

        /* 50% white div covering left side */
        .left-section {
            width: 70%;
            background-color: #e7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        /* Right side with green background and buttons */
        .right-section {
            /* width: 50%;
            display: flex;*/
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 40px;

        }

        .button {
            width: 200px;
            padding: 15px 30px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;

        }

        /* Text button - top button */
        .text-button {
            background-color: #008080;
            color: white;
            margin-bottom: 0px;
            margin-top: 40px;
        }
        sealyourimagenow-button{
            background-color: #28a745;
            color: #ccc;
        }

        .text-button:hover {
            background-color: #006666;
            /*transform: translateY(-2px);*/
        }

        /* Watermark button - bottom button */
        .watermark-button {
            background-color: #20b2aa;
            color: white;
            margin-bottom: 50px;
            margin-top: 50px;
        }

        .watermark-button:hover {
            background-color: #1a9999;
            /*transform: translateY(-2px);*/
        }

        /* Text Options Panel */
        .text-options-panel {
            display: none;
            position: absolute;
            background-color: white;
            border: 2px solid #008080;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            min-width: 300px;
            margin-top: 10px;
        }

        .text-options-panel.show {
            display: block;
        }

        .text-options-panel h3 {
            margin: 0 0 15px 0;
            color: #008080;
            font-size: 18px;
            font-weight: 600;
        }

        .option-group {
            margin-bottom: 20px;
        }

        .option-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 14px;
            font-weight: 500;
        }

        .option-group input[type="range"],
        .option-group input[type="number"],
        .option-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .option-group input[type="color"] {
            width: 100%;
            height: 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .range-value {
            display: inline-block;
            margin-left: 10px;
            color: #008080;
            font-weight: 600;
        }

        .relative-container {
            position: relative;
        }

        /* Image Editor Styles */
        .image-editor-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .image-dropbox {
            width: 100%;
            max-width: 800px;
            max-height: 90%;
            border: 3px dashed #008080;
            border-radius: 10px;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .image-dropbox.has-image {
            border: 2px solid #008080;
            padding: 10px;
        }

        .image-dropbox-content {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #imageCanvas {
            max-width: 100%;
            max-height: 100%;
            cursor: crosshair;
        }

        .dropbox-placeholder {
            text-align: center;
            color: #666;
            padding: 40px;
        }

        .dropbox-placeholder h3 {
            color: #008080;
            margin-bottom: 10px;
        }

        .dropbox-placeholder p {
            color: #999;
            font-size: 14px;
        }

        .text-input-overlay {
            position: absolute;
            border: 2px dashed #008080;
            padding: 5px;
            background: transparent;
            min-width: 100px;
            min-height: 30px;
            resize: both;
            overflow: hidden;
            cursor: move;
            z-index: 10;
        }

        .text-input-overlay input {
            width: 100%;
            height: 100%;
            border: none;
            background: transparent;
            outline: none;
            font-size: 24px;
            color: #000;
            text-align: center;
        }

        .text-input-overlay.selected {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .canvas-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text-layer {
            position: absolute;
            cursor: move;
            user-select: none;
            border: 2px dashed transparent;
            padding: 5px;
        }

        .text-layer.selected {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .text-layer-content {
            pointer-events: none;
        }

        .delete-text-btn {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            cursor: pointer;
            font-size: 12px;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .text-layer.selected .delete-text-btn {
            display: flex;
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

                            <div class="dropdown-menu bg-light mt-2">
                                <a href="feature.html" class="dropdown-item">Features</a>
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                    </div>

            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->

    <div class="main-container">

        <div class="left-section">
            <div class="image-editor-container">
                <div class="image-dropbox" id="imageDropbox">
                    <div class="image-dropbox-content" id="imageDropboxContent">
                        <div class="dropbox-placeholder" id="dropboxPlaceholder">
                            <h3>Image Editor</h3>
                            <p>Your image from the previous page will appear here</p>
                            <p style="margin-top: 10px; font-size: 12px;">Or drop an image here to edit</p>
                        </div>
                        <div class="canvas-container" id="canvasContainer" style="display: none;">
                            <canvas id="imageCanvas"></canvas>
                            <div id="textLayersContainer"></div>
                        </div>
                        <input type="file" id="imageFileInput" accept="image/*" style="display: none;">
                        <input type="file" id="watermarkImageInput" accept="image/*" style="display: none;">
                    </div>
                </div>
            </div>
        </div>
        <div class="right-section">
            <h2>Watermark Settings</h2>
            <div class="relative-container">
                <button class="button text-button" id="textButton">Text</button>
                <div class="text-options-panel" id="textOptionsPanel">
                    <h3>Text Options</h3>

                    <div class="option-group">
                        <label for="textSize">Text Size: <span class="range-value" id="textSizeValue">24</span>px</label>
                        <input type="range" id="textSize" min="10" max="100" value="24">
                    </div>

                    <div class="option-group">
                        <label for="textFont">Font Family</label>
                        <select id="textFont">
                            <option value="Arial">Arial</option>
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Helvetica">Helvetica</option>
                            <option value="Comic Sans MS">Comic Sans MS</option>
                            <option value="Impact">Impact</option>
                        </select>
                    </div>

                    <div class="option-group">
                        <label for="textOpacity">Opacity: <span class="range-value" id="textOpacityValue">100</span>%</label>
                        <input type="range" id="textOpacity" min="0" max="100" value="100">
                    </div>

                    <div class="option-group">
                        <label for="textColor">Text Color</label>
                        <input type="color" id="textColor" value="#000000">
                    </div>

                    <div class="option-group">
                        <label for="textInput">Enter Text</label>
                        <input type="text" id="textInput" placeholder="Type your text here" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>

                    <div class="option-group">
                        <button type="button" id="addTextButton" style="width: 100%; padding: 10px; background-color: #008080; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Add Text to Image
                        </button>
                    </div>
                </div>
            </div>
            <button class="button watermark-button" id="watermarkImageButton">Watermark Image</button>
            <button class="button sealyourimagenow-button" id="sealImageButton">Seal your Image Now</button>
        </div>
    </div>



    <!-- Hero End -->





    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <a href="index.html" class="d-inline-block mb-3">
                        <h1 class="text-white">imageseal</h1>
                    </a>
                    <p class="mb-0">Seal your Image with style!</p>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="text-white mb-4">Get In Touch WIth Us</h5>
                    <p><i class="fa fa-envelope me-3"></i>fizzahkafeel@gmail.com</p>

                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <h5 class="text-white mb-4">Popular Link</h5>
                    <a class="btn btn-link" href="#!">About Us</a>
                    <a class="btn btn-link" href="#!">Contact Us</a>
                </div>
                </div>
        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">


                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->

                        <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="#!">Home</a>
                            <a href="#!">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <script>
        // Global variables
        let canvas, ctx;
        let currentImage = null;
        let textLayers = [];
        let watermarkImageLayers = [];
        let selectedTextLayer = null;
        let selectedWatermarkLayer = null;
        let isDragging = false;
        let isResizing = false;
        let dragOffset = { x: 0, y: 0 };
        let resizeHandle = null; // 'nw', 'ne', 'sw', 'se' for corners
        const handleSize = 8; // Size of resize handles

        // Initialize canvas
        function initCanvas() {
            canvas = document.getElementById('imageCanvas');
            ctx = canvas.getContext('2d');
        }

        // Load image from URL, session, or localStorage
        function loadImage(imageSrc) {
            const img = new Image();
            img.crossOrigin = 'anonymous';

            img.onload = function() {
                currentImage = img;

                // Set canvas dimensions
                const maxWidth = 800;
                const maxHeight = 600;
                let width = img.width;
                let height = img.height;

                // Scale if too large
                if (width > maxWidth || height > maxHeight) {
                    const ratio = Math.min(maxWidth / width, maxHeight / height);
                    width = width * ratio;
                    height = height * ratio;
                }

                canvas.width = width;
                canvas.height = height;

                // Draw image on canvas
                ctx.drawImage(img, 0, 0, width, height);

                // Show canvas and hide placeholder
                document.getElementById('dropboxPlaceholder').style.display = 'none';
                document.getElementById('canvasContainer').style.display = 'flex';
                document.getElementById('imageDropbox').classList.add('has-image');

                // Redraw all text layers
                redrawCanvas();
            };

            img.onerror = function() {
                console.error('Failed to load image');
                alert('Failed to load image. Please try uploading again.');
            };

            img.src = imageSrc;
        }

        // Redraw canvas with image and all text layers
        function redrawCanvas() {
            if (!currentImage) return;

            // Clear canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Draw image
            ctx.drawImage(currentImage, 0, 0, canvas.width, canvas.height);

            // Draw all text layers on canvas
            textLayers.forEach(layer => {
                drawTextOnCanvas(layer);
                // Draw selection indicators if selected
                if (selectedTextLayer && selectedTextLayer.id === layer.id) {
                    drawTextSelection(layer);
                }
            });

            // Draw all watermark image layers on canvas
            watermarkImageLayers.forEach(layer => {
                drawWatermarkImageOnCanvas(layer);
                // Draw selection indicators if selected
                if (selectedWatermarkLayer && selectedWatermarkLayer.id === layer.id) {
                    drawWatermarkSelection(layer);
                }
            });
        }

        // Draw text on canvas
        function drawTextOnCanvas(layer) {
            ctx.save();

            // Set font properties
            const fontSize = parseInt(layer.size) || 24;
            const fontFamily = layer.font || 'Arial';
            ctx.font = `${fontSize}px ${fontFamily}`;

            // Set opacity
            const opacity = (parseInt(layer.opacity) || 100) / 100;
            ctx.globalAlpha = opacity;

            // Set color
            ctx.fillStyle = layer.color || '#000000';

            // Draw text
            ctx.fillText(layer.text, layer.x, layer.y);

            ctx.restore();
        }

        // Draw text selection indicators
        function drawTextSelection(layer) {
            ctx.save();

            // Set font to measure text
            const fontSize = parseInt(layer.size) || 24;
            const fontFamily = layer.font || 'Arial';
            ctx.font = `${fontSize}px ${fontFamily}`;

            // Measure text
            const metrics = ctx.measureText(layer.text);
            const textWidth = metrics.width;
            const textHeight = fontSize;

            // Draw selection border around text
            ctx.strokeStyle = '#007bff';
            ctx.lineWidth = 2;
            ctx.setLineDash([5, 5]);
            ctx.strokeRect(
                layer.x - 5,
                layer.y - textHeight - 5,
                textWidth + 10,
                textHeight + 10
            );

            ctx.restore();
        }

        // Check if point is inside text
        function isPointInText(x, y, layer) {
            ctx.save();

            // Set font to measure text
            const fontSize = parseInt(layer.size) || 24;
            const fontFamily = layer.font || 'Arial';
            ctx.font = `${fontSize}px ${fontFamily}`;

            // Measure text
            const metrics = ctx.measureText(layer.text);
            const textWidth = metrics.width;
            const textHeight = fontSize;

            // Check if point is within text bounds
            const textX = layer.x - 5;
            const textY = layer.y - textHeight - 5;
            const textWidthWithPadding = textWidth + 10;
            const textHeightWithPadding = textHeight + 10;

            ctx.restore();

            return x >= textX && x <= textX + textWidthWithPadding &&
                   y >= textY && y <= textY + textHeightWithPadding;
        }

        // Draw watermark image on canvas
        function drawWatermarkImageOnCanvas(layer) {
            if (!layer.image) return;

            ctx.save();

            // Set opacity
            const opacity = (parseInt(layer.opacity) || 100) / 100;
            ctx.globalAlpha = opacity;

            // Draw watermark image at position with size
            ctx.drawImage(
                layer.image,
                layer.x,
                layer.y,
                layer.width || layer.image.width,
                layer.height || layer.image.height
            );

            ctx.restore();
        }

        // Draw selection indicators and resize handles for watermark
        function drawWatermarkSelection(layer) {
            ctx.save();

            // Draw selection border
            ctx.strokeStyle = '#007bff';
            ctx.lineWidth = 2;
            ctx.setLineDash([5, 5]);
            ctx.strokeRect(layer.x, layer.y, layer.width, layer.height);

            // Draw resize handles at corners
            ctx.fillStyle = '#007bff';
            ctx.strokeStyle = '#ffffff';
            ctx.lineWidth = 2;
            ctx.setLineDash([]);

            const handles = [
                { x: layer.x, y: layer.y }, // Top-left
                { x: layer.x + layer.width, y: layer.y }, // Top-right
                { x: layer.x, y: layer.y + layer.height }, // Bottom-left
                { x: layer.x + layer.width, y: layer.y + layer.height } // Bottom-right
            ];

            handles.forEach(handle => {
                ctx.beginPath();
                ctx.arc(handle.x, handle.y, handleSize / 2, 0, Math.PI * 2);
                ctx.fill();
                ctx.stroke();
            });

            ctx.restore();
        }

        // Check if point is inside watermark
        function isPointInWatermark(x, y, layer) {
            return x >= layer.x && x <= layer.x + layer.width &&
                   y >= layer.y && y <= layer.y + layer.height;
        }

        // Get resize handle at point
        function getResizeHandle(x, y, layer) {
            const handles = {
                'nw': { x: layer.x, y: layer.y },
                'ne': { x: layer.x + layer.width, y: layer.y },
                'sw': { x: layer.x, y: layer.y + layer.height },
                'se': { x: layer.x + layer.width, y: layer.y + layer.height }
            };

            for (let handleName in handles) {
                const handle = handles[handleName];
                const distance = Math.sqrt(Math.pow(x - handle.x, 2) + Math.pow(y - handle.y, 2));
                if (distance <= handleSize) {
                    return handleName;
                }
            }

            return null;
        }

        // Create text layer
        function createTextLayer(text, x, y) {
            const layer = {
                id: Date.now(),
                text: text,
                x: x,
                y: y,
                size: document.getElementById('textSize').value,
                font: document.getElementById('textFont').value,
                opacity: document.getElementById('textOpacity').value,
                color: document.getElementById('textColor').value
            };

            textLayers.push(layer);
            // Automatically select the newly created text layer
            selectedTextLayer = layer;
            selectedWatermarkLayer = null;
            // Sync controls with the new text properties
            syncControlsWithSelectedText();
            redrawCanvas();
            updateTextLayerDisplay(layer);

            return layer;
        }

        // Update text layer display (for interactive editing)
        function updateTextLayerDisplay(layer) {
            // This creates a visual representation that can be moved
            // The actual text is drawn on canvas
            redrawCanvas();
        }

        // Sync controls with selected text layer properties
        function syncControlsWithSelectedText() {
            if (!selectedTextLayer) return;

            // Update all controls to match the selected text
            document.getElementById('textSize').value = selectedTextLayer.size || 24;
            document.getElementById('textSizeValue').textContent = selectedTextLayer.size || 24;
            document.getElementById('textFont').value = selectedTextLayer.font || 'Arial';
            document.getElementById('textOpacity').value = selectedTextLayer.opacity || 100;
            document.getElementById('textOpacityValue').textContent = selectedTextLayer.opacity || 100;
            document.getElementById('textColor').value = selectedTextLayer.color || '#000000';
            document.getElementById('textInput').value = selectedTextLayer.text || '';
        }

        // Update selected text layer properties from controls
        function updateSelectedTextLayer() {
            if (!selectedTextLayer) return;

            const layer = textLayers.find(l => l.id === selectedTextLayer.id);
            if (layer) {
                layer.size = document.getElementById('textSize').value;
                layer.font = document.getElementById('textFont').value;
                layer.opacity = document.getElementById('textOpacity').value;
                layer.color = document.getElementById('textColor').value;
                // Update the selectedTextLayer reference to keep it in sync
                selectedTextLayer.size = layer.size;
                selectedTextLayer.font = layer.font;
                selectedTextLayer.opacity = layer.opacity;
                selectedTextLayer.color = layer.color;
                redrawCanvas();
            }
        }

        // Try to load image from various sources
        function tryLoadImage() {
            // Try to get image from URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            const imageUrl = urlParams.get('image');

            if (imageUrl) {
                loadImage(imageUrl);
                return;
            }

            // Try to get from localStorage
            const savedImage = localStorage.getItem('selectedImage');
            if (savedImage) {
                loadImage(savedImage);
                return;
            }

            // Try to get from sessionStorage
            const sessionImage = sessionStorage.getItem('selectedImage');
            if (sessionImage) {
                loadImage(sessionImage);
                return;
            }

            // If no image found, enable drop zone
            enableDropZone();
        }

        // Enable drop zone functionality
        function enableDropZone() {
            const dropbox = document.getElementById('imageDropbox');
            const fileInput = document.getElementById('imageFileInput');

            // Click to browse
            dropbox.addEventListener('click', function(e) {
                if (e.target === dropbox || e.target.closest('.dropbox-placeholder')) {
                    fileInput.click();
                }
            });

            // File input change
            fileInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const file = e.target.files[0];
                    const reader = new FileReader();

                    reader.onload = function(event) {
                        loadImage(event.target.result);
                    };

                    reader.readAsDataURL(file);
                }
            });

            // Drag and drop
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropbox.addEventListener(eventName, preventDefaults, false);
            });

            ['dragenter', 'dragover'].forEach(eventName => {
                dropbox.addEventListener(eventName, function() {
                    dropbox.classList.add('drag-over');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropbox.addEventListener(eventName, function() {
                    dropbox.classList.remove('drag-over');
                }, false);
            });

            dropbox.addEventListener('drop', function(e) {
                const dt = e.dataTransfer;
                const files = dt.files;

                if (files && files[0]) {
                    const file = files[0];
                    if (file.type.match('image.*')) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            loadImage(event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            }, false);
        }

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Initialize on page load
        window.addEventListener('DOMContentLoaded', function() {
            initCanvas();
            tryLoadImage();
        });

        // Toggle text options panel
        document.getElementById('textButton').addEventListener('click', function(e) {
            e.stopPropagation();
            const panel = document.getElementById('textOptionsPanel');
            panel.classList.toggle('show');
        });

        // Close panel when clicking outside
        document.addEventListener('click', function(e) {
            const panel = document.getElementById('textOptionsPanel');
            const button = document.getElementById('textButton');
            if (panel.classList.contains('show') && !panel.contains(e.target) && !button.contains(e.target)) {
                panel.classList.remove('show');
            }
        });

        // Update text size value display
        document.getElementById('textSize').addEventListener('input', function() {
            document.getElementById('textSizeValue').textContent = this.value;
            updateSelectedTextLayer();
        });

        // Update opacity value display
        document.getElementById('textOpacity').addEventListener('input', function() {
            document.getElementById('textOpacityValue').textContent = this.value;
            updateSelectedTextLayer();
        });

        // Update font
        document.getElementById('textFont').addEventListener('change', function() {
            updateSelectedTextLayer();
        });

        // Update color (both input and change for real-time updates)
        document.getElementById('textColor').addEventListener('input', function() {
            updateSelectedTextLayer();
        });
        document.getElementById('textColor').addEventListener('change', function() {
            updateSelectedTextLayer();
        });

        // Update text content
        document.getElementById('textInput').addEventListener('input', function() {
            if (selectedTextLayer) {
                const layer = textLayers.find(l => l.id === selectedTextLayer.id);
                if (layer) {
                    layer.text = this.value;
                    selectedTextLayer.text = this.value;
                    redrawCanvas();
                }
            }
        });

        // Add text button
        document.getElementById('addTextButton').addEventListener('click', function() {
            if (!currentImage) {
                alert('Please load an image first');
                return;
            }

            const text = document.getElementById('textInput').value;
            if (!text.trim()) {
                alert('Please enter some text');
                return;
            }

            // Add text at center of canvas
            const x = canvas.width / 2;
            const y = canvas.height / 2;
            createTextLayer(text, x, y);
            document.getElementById('textInput').value = '';
        });

        // Store pending watermark image for positioning
        let pendingWatermarkImage = null;

        // Watermark Image button functionality
        document.getElementById('watermarkImageButton').addEventListener('click', function() {
            if (!currentImage) {
                alert('Please load an image first');
                return;
            }

            // Trigger file input for watermark image
            document.getElementById('watermarkImageInput').click();
        });

        // Handle watermark image file selection
        document.getElementById('watermarkImageInput').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const file = e.target.files[0];

                // Validate file type
                if (!file.type.match('image.*')) {
                    alert('Please select an image file (JPG, PNG, etc.)');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = new Image();
                    img.onload = function() {
                        // Store as pending - will be positioned on canvas click
                        pendingWatermarkImage = {
                            image: img,
                            width: img.width / 2, // Scale down to 50% by default
                            height: img.height / 2,
                            opacity: 50 // Default opacity 50%
                        };

                        alert('Watermark image loaded! Click on the canvas to position it.');
                    };
                    img.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Canvas mouse down handler - handles selection, dragging, and resizing
        document.getElementById('imageCanvas').addEventListener('mousedown', function(e) {
            if (!currentImage) return;

            const rect = canvas.getBoundingClientRect();
            const x = (e.clientX - rect.left) * (canvas.width / rect.width);
            const y = (e.clientY - rect.top) * (canvas.height / rect.height);

            // Check if clicking on a resize handle
            if (selectedWatermarkLayer) {
                const handle = getResizeHandle(x, y, selectedWatermarkLayer);
                if (handle) {
                    isResizing = true;
                    resizeHandle = handle;
                    dragOffset = { x, y };
                    return;
                }
            }

            // Check if clicking on a text layer
            let clickedText = null;
            for (let i = textLayers.length - 1; i >= 0; i--) {
                const layer = textLayers[i];
                if (isPointInText(x, y, layer)) {
                    clickedText = layer;
                    break;
                }
            }

            if (clickedText) {
                // Select text and prepare for dragging
                selectedTextLayer = clickedText;
                selectedWatermarkLayer = null; // Deselect watermark
                isDragging = true;
                dragOffset = {
                    x: x - clickedText.x,
                    y: y - clickedText.y
                };
                // Sync controls with selected text properties
                syncControlsWithSelectedText();
                redrawCanvas();
                return;
            }

            // Check if clicking on a watermark image
            let clickedWatermark = null;
            for (let i = watermarkImageLayers.length - 1; i >= 0; i--) {
                const layer = watermarkImageLayers[i];
                if (isPointInWatermark(x, y, layer)) {
                    clickedWatermark = layer;
                    break;
                }
            }

            if (clickedWatermark) {
                // Select watermark and prepare for dragging
                selectedWatermarkLayer = clickedWatermark;
                selectedTextLayer = null; // Deselect text
                isDragging = true;
                dragOffset = {
                    x: x - clickedWatermark.x,
                    y: y - clickedWatermark.y
                };
                redrawCanvas();
                return;
            }

            // Deselect if clicking on empty space
            if (selectedWatermarkLayer || selectedTextLayer) {
                selectedWatermarkLayer = null;
                selectedTextLayer = null;
                redrawCanvas();
            }

            // If there's a pending watermark image, position it
            if (pendingWatermarkImage) {
                const canvasX = x - pendingWatermarkImage.width / 2;
                const canvasY = y - pendingWatermarkImage.height / 2;

                const watermarkLayer = {
                    id: Date.now(),
                    image: pendingWatermarkImage.image,
                    x: canvasX,
                    y: canvasY,
                    width: pendingWatermarkImage.width,
                    height: pendingWatermarkImage.height,
                    opacity: pendingWatermarkImage.opacity
                };

                watermarkImageLayers.push(watermarkLayer);
                selectedWatermarkLayer = watermarkLayer;
                pendingWatermarkImage = null;
                redrawCanvas();
                return;
            }

            // Handle text input (existing functionality)
            const text = document.getElementById('textInput').value;
            if (text.trim()) {
                createTextLayer(text, x, y);
                document.getElementById('textInput').value = '';
            }
        });

        // Canvas mouse move handler - handles dragging and resizing
        document.getElementById('imageCanvas').addEventListener('mousemove', function(e) {
            if (!currentImage) return;

            const rect = canvas.getBoundingClientRect();
            const x = (e.clientX - rect.left) * (canvas.width / rect.width);
            const y = (e.clientY - rect.top) * (canvas.height / rect.height);

            // Update cursor style
            if (selectedWatermarkLayer) {
                const handle = getResizeHandle(x, y, selectedWatermarkLayer);
                if (handle) {
                    canvas.style.cursor = getResizeCursor(handle);
                } else if (isPointInWatermark(x, y, selectedWatermarkLayer)) {
                    canvas.style.cursor = 'move';
                } else {
                    canvas.style.cursor = 'default';
                }
            } else if (selectedTextLayer) {
                if (isPointInText(x, y, selectedTextLayer)) {
                    canvas.style.cursor = 'move';
                } else {
                    canvas.style.cursor = 'default';
                }
            } else {
                // Check if hovering over any text or watermark
                let hovering = false;
                for (let i = textLayers.length - 1; i >= 0; i--) {
                    if (isPointInText(x, y, textLayers[i])) {
                        canvas.style.cursor = 'move';
                        hovering = true;
                        break;
                    }
                }
                if (!hovering) {
                    for (let i = watermarkImageLayers.length - 1; i >= 0; i--) {
                        if (isPointInWatermark(x, y, watermarkImageLayers[i])) {
                            canvas.style.cursor = 'move';
                            hovering = true;
                            break;
                        }
                    }
                }
                if (!hovering) {
                    canvas.style.cursor = 'default';
                }
            }

            // Handle resizing
            if (isResizing && selectedWatermarkLayer && resizeHandle) {
                const layer = selectedWatermarkLayer;
                const deltaX = x - dragOffset.x;
                const deltaY = y - dragOffset.y;

                switch (resizeHandle) {
                    case 'nw': // Top-left
                        layer.width = (layer.x + layer.width) - x;
                        layer.height = (layer.y + layer.height) - y;
                        layer.x = x;
                        layer.y = y;
                        break;
                    case 'ne': // Top-right
                        layer.width = x - layer.x;
                        layer.height = (layer.y + layer.height) - y;
                        layer.y = y;
                        break;
                    case 'sw': // Bottom-left
                        layer.width = (layer.x + layer.width) - x;
                        layer.height = y - layer.y;
                        layer.x = x;
                        break;
                    case 'se': // Bottom-right
                        layer.width = x - layer.x;
                        layer.height = y - layer.y;
                        break;
                }

                // Minimum size constraints
                if (layer.width < 20) layer.width = 20;
                if (layer.height < 20) layer.height = 20;

                dragOffset = { x, y };
                redrawCanvas();
                return;
            }

            // Handle dragging for text
            if (isDragging && selectedTextLayer) {
                selectedTextLayer.x = x - dragOffset.x;
                selectedTextLayer.y = y - dragOffset.y;

                // Keep text within reasonable bounds (allow some overflow for better UX)
                const fontSize = parseInt(selectedTextLayer.size) || 24;
                if (selectedTextLayer.x < -50) selectedTextLayer.x = -50;
                if (selectedTextLayer.y < fontSize) selectedTextLayer.y = fontSize;
                if (selectedTextLayer.x > canvas.width + 50) {
                    selectedTextLayer.x = canvas.width + 50;
                }
                if (selectedTextLayer.y > canvas.height + 50) {
                    selectedTextLayer.y = canvas.height + 50;
                }

                redrawCanvas();
                return;
            }

            // Handle dragging for watermark
            if (isDragging && selectedWatermarkLayer) {
                selectedWatermarkLayer.x = x - dragOffset.x;
                selectedWatermarkLayer.y = y - dragOffset.y;

                // Keep watermark within canvas bounds
                if (selectedWatermarkLayer.x < 0) selectedWatermarkLayer.x = 0;
                if (selectedWatermarkLayer.y < 0) selectedWatermarkLayer.y = 0;
                if (selectedWatermarkLayer.x + selectedWatermarkLayer.width > canvas.width) {
                    selectedWatermarkLayer.x = canvas.width - selectedWatermarkLayer.width;
                }
                if (selectedWatermarkLayer.y + selectedWatermarkLayer.height > canvas.height) {
                    selectedWatermarkLayer.y = canvas.height - selectedWatermarkLayer.height;
                }

                redrawCanvas();
            }
        });

        // Canvas mouse up handler - stops dragging and resizing
        document.getElementById('imageCanvas').addEventListener('mouseup', function(e) {
            isDragging = false;
            isResizing = false;
            resizeHandle = null;
            canvas.style.cursor = 'default';
        });

        // Get cursor style for resize handles
        function getResizeCursor(handle) {
            const cursors = {
                'nw': 'nw-resize',
                'ne': 'ne-resize',
                'sw': 'sw-resize',
                'se': 'se-resize'
            };
            return cursors[handle] || 'default';
        }

        // Delete selected text or watermark on Delete key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Delete' || e.key === 'Backspace') {
                if (selectedTextLayer) {
                    const index = textLayers.findIndex(l => l.id === selectedTextLayer.id);
                    if (index !== -1) {
                        textLayers.splice(index, 1);
                        selectedTextLayer = null;
                        redrawCanvas();
                    }
                } else if (selectedWatermarkLayer) {
                    const index = watermarkImageLayers.findIndex(l => l.id === selectedWatermarkLayer.id);
                    if (index !== -1) {
                        watermarkImageLayers.splice(index, 1);
                        selectedWatermarkLayer = null;
                        redrawCanvas();
                    }
                }
            }
        });

        // Seal image and redirect to download page
        document.getElementById('sealImageButton').addEventListener('click', function() {
            if (!currentImage) {
                alert('Please load an image first');
                return;
            }

            // Check if there are any watermarks (text or image)
            if (textLayers.length === 0 && watermarkImageLayers.length === 0) {
                alert('Please add at least one watermark (text or image) before sealing the image.');
                return;
            }

            // Ensure canvas is up to date with all text layers
            redrawCanvas();

            // Convert canvas to data URL
            const imageDataUrl = canvas.toDataURL('image/png');

            // Store in localStorage for the download page
            localStorage.setItem('sealedImage', imageDataUrl);

            // Redirect to download page
            window.location.href = '{{ route("download.image") }}';
        });
    </script>
</body>
</html>
