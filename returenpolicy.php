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

            <h1>Return and Refund Policy</h1>
            <p>Last updated: June 28, 2024</p>
            <p>Thank you for shopping at playtechsolutions.</p>
            <p>If, for any reason, You are not completely satisfied with a purchase We invite You to review our policy on refunds and returns.</p>
            <p>The following terms are applicable for any products that You purchased with Us.</p>
            <h2>Interpretation and Definitions</h2>
            <h3>Interpretation</h3>
            <p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
            <h3>Definitions</h3>
            <p>For the purposes of this Return and Refund Policy:</p>
            <ul>
                <li>
                    <p><strong>Company</strong> (referred to as either &quot;the Company&quot;, &quot;We&quot;, &quot;Us&quot; or &quot;Our&quot; in this Agreement) refers to playtechsolutions, Maradana Road Colombo 10.</p>
                </li>
                <li>
                    <p><strong>Goods</strong> refer to the items offered for sale on the Service.</p>
                </li>
                <li>
                    <p><strong>Orders</strong> mean a request by You to purchase Goods from Us.</p>
                </li>
                <li>
                    <p><strong>Service</strong> refers to the Website.</p>
                </li>
                <li>
                    <p><strong>Website</strong> refers to playtechsolutions, accessible from <a href="playtechsolutions.com" rel="external nofollow noopener" target="_blank">playtechsolutions.com</a></p>
                </li>
                <li>
                    <p><strong>You</strong> means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p>
                </li>
            </ul>
            <h2>Your Order Cancellation Rights</h2>
            <p>You are entitled to cancel Your Order within 7 days without giving any reason for doing so.</p>
            <p>The deadline for cancelling an Order is 7 days from the date on which You received the Goods or on which a third party you have appointed, who is not the carrier, takes possession of the product delivered.</p>
            <p>In order to exercise Your right of cancellation, You must inform Us of your decision by means of a clear statement. You can inform us of your decision by:</p>
            <ul>
                <li>By email: admin@playtech.com</li>
            </ul>
            <p>We will reimburse You no later than 14 days from the day on which We receive the returned Goods. We will use the same means of payment as You used for the Order, and You will not incur any fees for such reimbursement.</p>
            <h2>Conditions for Returns</h2>
            <p>In order for the Goods to be eligible for a return, please make sure that:</p>
            <ul>
                <li>The Goods were purchased in the last 7 days</li>
                <li>The Goods are in the original packaging</li>
            </ul>
            <p>The following Goods cannot be returned:</p>
            <ul>
                <li>The supply of Goods made to Your specifications or clearly personalized.</li>
                <li>The supply of Goods which according to their nature are not suitable to be returned, deteriorate rapidly or where the date of expiry is over.</li>
                <li>The supply of Goods which are not suitable for return due to health protection or hygiene reasons and were unsealed after delivery.</li>
                <li>The supply of Goods which are, after delivery, according to their nature, inseparably mixed with other items.</li>
            </ul>
            <p>We reserve the right to refuse returns of any merchandise that does not meet the above return conditions in our sole discretion.</p>
            <p>Only regular priced Goods may be refunded. Unfortunately, Goods on sale cannot be refunded. This exclusion may not apply to You if it is not permitted by applicable law.</p>
            <h2>Returning Goods</h2>
            <p>You are responsible for the cost and risk of returning the Goods to Us. You should send the Goods at the following address:</p>
            <p>1 Maradana Road<br />
                Pannnipitiya, CA 95014<br />
                Colombo</p>
            <p>We cannot be held responsible for Goods damaged or lost in return shipment. Therefore, We recommend an insured and trackable mail service. We are unable to issue a refund without actual receipt of the Goods or proof of received return delivery.</p>
            <h2>Gifts</h2>
            <p>If the Goods were marked as a gift when purchased and then shipped directly to you, You'll receive a gift credit for the value of your return. Once the returned product is received, a gift certificate will be mailed to You.</p>
            <p>If the Goods weren't marked as a gift when purchased, or the gift giver had the Order shipped to themselves to give it to You later, We will send the refund to the gift giver.</p>
            <h3>Contact Us</h3>
            <p>If you have any questions about our Returns and Refunds Policy, please contact us:</p>
            <ul>
                <li>By email: admin@playtech.com</li>
            </ul>
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