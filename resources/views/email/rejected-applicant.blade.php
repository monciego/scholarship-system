<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://fonts.bunny.net/css?family=inter:500,600|montserrat:700" rel="stylesheet" />
    <style>
        .wrapper {
            background-color: #edf2f7;

            font-family: "Inter", sans-serif;
        }

        .greetings {
            font-weight: 600;
        }

        .card {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            margin: 0 2rem;
        }

        header {
            padding: 1rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            height: 84px;
        }

        .body p {
            color: #575656;
        }

        footer p {
            padding: 0 1rem;
            font-size: 0.75rem;
            color: #898989;
        }

        a {
            color: rgb(105, 105, 223);
        }

        .regards {
            line-height: 0.125px;
        }

        .cta {
            margin-top: 2rem;
        }

        .cta .cta-button {
            border: 0;
            outline: 0;
            background-color: #1d4ed8;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="wrapper" style="padding: 1rem">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <img style="margin: 1rem auto; display: block" class="logo"
                    src="https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png"
                    alt="Pangasinan State University Logo" />
            </tr>
            <tr>
                <div class="card">
                    <p class="greetings">Hello {{ $data["name"] }},</p>
                    <div class="body">
                        <p>
                            I hope this message finds you well. We would like to express our sincere appreciation for
                            your interest in the {{ $data["scholarshipName"] }} and for taking the time to submit your
                            application. Your commitment to your academic pursuits and goals is commendable, and we
                            truly value your
                            dedication.
                        </p>
                        <p>
                            While your application was not successful this time, we encourage you to continue pursuing
                            your academic and personal aspirations. Receiving a scholarship is just one of the many ways
                            to achieve your goals, and we believe in your potential to succeed.
                        </p>
                        <p>
                            We understand that this news may be disappointing, but we want to assure you that your
                            application was reviewed with the utmost care and fairness. We encourage you to seek other
                            scholarship opportunities, as well as explore different avenues of financial aid to support
                            your educational journey.
                        </p>
                        <p>
                            If you have any questions or would like feedback on your application, please do not hesitate
                            to reach out to our scholarship coordinator at {{ $data["representativeEmail"] }}. We are
                            here to assist you and provide any guidance that may be helpful.
                        </p>
                        <p>
                            Thank you once again for your application, and we wish you the very best in your future
                            academic endeavors. Your determination and hard work are admirable, and we have no doubt
                            that you will achieve great things.
                        </p>
                        <p>Best regards,</p>
                        <p class="regards">
                            Pangasinan State University - Alaminos City Campus
                        </p>

                        <div class="cta">
                            <a href="{{ route('homepage.index') }}" class="cta-button">
                                Explore different scholarships
                            </a>
                        </div>
                    </div>
                </div>
                <footer>
                    <p>
                        Confidentiality Notice: This email and any attachments are
                        confidential and intended solely for the use of the
                        individual or entity to whom they are addressed. If you are
                        not the intended recipient, please notify us immediately and
                        delete this email from your system.
                    </p>
                    <p>
                        Copyright © 2023
                        <a href="https://alaminos.psu.edu.ph/">
                            Pangasinan State University - Alaminos City Campus</a>
                        . All rights reserved.
                    </p>
                </footer>
            </tr>
        </table>
    </div>
</body>

</html>