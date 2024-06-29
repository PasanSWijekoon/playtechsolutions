<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayTechSolutions - Contact Us</title>
    <link rel="icon" href="assets/img/ico.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .product img {
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }

        #Mobile>div.row.mx-auto.container>div.row.mx-auto.container>div.row.mx-auto.container>div.row.mx-auto.container>div.row.mx-auto.container>nav>ul>li.page-item.active>a {

            background-color: coral;
            border-color: coral;

        }

        .pagination a {
            color: black;

        }
    </style>

</head>

<body>

    <?php include "includes/header.php"; ?>

    <section id="Mobile" class="my-5 py-3">
        <div class=" container mt-5">
            <h2>Contact Us</h3>
                <hr class="">

        </div>
    </section>





    <section id="contct" class=" container py-3">
        <div class="row">
            <div class=" cccnw col-lg-6 col-md-6 col-12 mb-4">
                <div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="text"></div>
                        <h3>Address</h3>
                        <p>147/2, Senanayake Mawatha ,<br> Nawala <br> 50000</p>
                    </div>

                    <div class="box">
                        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="text"></div>
                        <h3>Phone</h3>
                        <p> 94-11-2805179</p>
                    </div>


                    <div class="box">
                        <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="text"></div>
                        <h3>Email</h3>
                        <p>playtechsolutions@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class=" ccnw3 col-lg-6 col-md-6 col-12 mb-4">
                <div>

                    <div class="contactForm">
                        <form id="contactForm">
                            <h2>Send Message</h2>
                            <div class="inputBox">
                                <span>Full Name</span>
                                <input type="text" name="full_name" id="full_name" required>
                            </div>
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <div class="inputBox">
                                <span>Message</span>
                                <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="inputBox">
                                <input type="submit" id="submitBtn" value="Send">
                            </div>
                        </form>
                    </div>

                    <!-- Feedback message -->
                    <div id="feedback"></div>



                </div>
            </div>
    </section>







    <?php include "includes/footer.php"; ?>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true; // Disable the submit button

            // Create a new FormData object
            var formData = new FormData(this);

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure it: POST-request for the URL /process_form.php
            xhr.open('POST', 'process_form.php', true);

            // Set up a function to handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) { // 4: request is done
                    if (xhr.status === 200) { // 200: successful
                        document.getElementById('feedback').innerHTML = xhr.responseText;
                        if (xhr.responseText.includes("successfully")) {
                            document.getElementById('contactForm').reset(); // Reset the form fields
                        }
                    } else {
                        document.getElementById('feedback').innerHTML = 'An error occurred during the submission. Please try again.';
                    }
                    submitBtn.disabled = false; // Enable the submit button
                }
            };

            // Send the request
            xhr.send(formData);
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>