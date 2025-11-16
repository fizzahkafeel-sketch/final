<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ImageSeal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="image.1.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Space+Grotesk&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

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
                        <a href="{{ route('about') }}" class="nav-item nav-link">About Us</a>
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
    <div class="container-fluid pb-5 hero-header bg-light mb-5" style="margin-bottom: 0px">
     <div class="top-centered-div">
    <h2>About Us</h2>
    <p>Our website is designed to make adding watermarks to your images quick, easy, and accessible for everyone. Whether you're a photographer, designer, or content creator, we help you protect your work with customized, professional-looking watermarks—all with just a few clicks. Our goal is to provide a fast, user-friendly tool that keeps your images safe while maintaining their quality.</p>
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


    <!-- Back to Top -->
    <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/auth.js"></script>
    <script>
        // Protect this page - uncomment to require login
        // protectPage();
    </script>

    <!-- Image Upload Script -->
    <script>
        // Get CSRF token from meta tag or use Laravel's default
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const dropZoneText = dropZone.querySelector('.drop-zone-text');
        const proceedButton = document.getElementById('proceedButton');
        const changeImageButton = document.getElementById('changeImageButton');

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });//dragging files can open them in the browser — this prevents that.

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Highlight drop zone when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('drag-over');
        }

        function unhighlight(e) {
            dropZone.classList.remove('drag-over');
        }

        // Handle dropped files
        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        // Handle file input change
        fileInput.addEventListener('change', function(e) {
            handleFiles(e.target.files);
        });

        // Store selected image file
        let selectedImageFile = null;
        let selectedImageDataUrl = null;

        // Proceed button handler
        if (proceedButton) {
            proceedButton.addEventListener('click', () => {
                if (!selectedImageDataUrl) {
                    alert('Please select an image before proceeding.');
                    return;
                }

                // Save image to localStorage
                localStorage.setItem('selectedImage', selectedImageDataUrl);

                // Navigate to watermark editor
                window.location.href = '{{ route("watermark.editor") }}';
            });
        }

        // Change image handler
        if (changeImageButton) {
            changeImageButton.addEventListener('click', () => {
                dropZoneText.textContent = 'Drag & Drop your image here';
                dropZone.classList.remove('file-selected', 'upload-success', 'upload-error');
                fileInput.value = '';
                fileInput.click();
            });
        }

        function handleFiles(files) {
            if (files.length === 0) return;

            const file = files[0];

            // Validate file type
            if (!file.type.match('image.*')) {
                alert('Please select an image file (JPG, PNG, etc.)');
                return;
            }//Checks if it's an image:

            // Validate file size (10MB = 10 * 1024 * 1024 bytes)
            if (file.size > 10 * 1024 * 1024) {
                alert('File size exceeds 10MB limit');
                return;
            }//Checks size limit (10MB):

            // Store the file
            selectedImageFile = file;

            // Read file as data URL for localStorage
            const reader = new FileReader();
            reader.onload = function(e) {
                selectedImageDataUrl = e.target.result;
                // Also save to localStorage immediately
                localStorage.setItem('selectedImage', selectedImageDataUrl);
            };
            reader.readAsDataURL(file);

            // Update UI to show selected file
            dropZoneText.textContent = `Selected: ${file.name}`;
            dropZone.classList.add('file-selected');
//calls UploadFile(file) to send it to the backend.

// Upload the file (optional - for backend storage)
            // uploadFile(file);
        }

        function uploadFile(file) {
            const formData = new FormData();
            formData.append('image', file);
            formData.append('_token', csrfToken);//Uses FormData to send both the file and the CSRF token.

            // Show loading state
            dropZoneText.textContent = 'Uploading...';
            dropZone.classList.add('uploading');

            // Send to backend
            fetch('{{ route("upload-image") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }//Sends it to Laravel’s backend route upload-image
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    dropZoneText.textContent = 'Upload successful!';
                    dropZone.classList.remove('uploading');
                    dropZone.classList.add('upload-success');

                    // Reset after 5 seconds
                    setTimeout(() => {
                        dropZoneText.textContent = 'Drag & Drop your image here';
                        dropZone.classList.remove('upload-success', 'file-selected');
                        fileInput.value = '';
                    }, 5000);

                    // Show success message
                    if (data.message) {
                        alert(data.message);
                    }
                } else {
                    throw new Error(data.message || 'Upload failed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                dropZoneText.textContent = 'Upload failed. Please try again.';
                dropZone.classList.remove('uploading');
                dropZone.classList.add('upload-error');

                alert('Error: ' + error.message);

                // Reset after 3 seconds
                setTimeout(() => {
                    dropZoneText.textContent = 'Drag & Drop your image here';
                    dropZone.classList.remove('upload-error', 'file-selected');
                    fileInput.value = '';
                }, 3000);
            });
        }
    </script>
</body>

</html>

