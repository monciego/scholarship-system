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
                            Congratulations! We are pleased to inform you that your
                            application for the {{ $data["scholarshipName"] }} has been
                            approved.
                        </p>
                        <p>
                            Your dedication, achievements, and commitment to your
                            academic and personal goals truly stood out among the
                            many impressive applicants we received. We are confident
                            that this scholarship will further support your journey
                            towards academic excellence and personal growth.
                        </p>
                        <p>
                            If you have any questions or require further assistance,
                            please do not hesitate to contact our scholarship
                            coordinator, {{ $data["representativeName"] }}, at {{ $data["representativeEmail"] }}. We
                            are
                            here to support you throughout your scholarship journey.
                        </p>
                        <p>
                            Once again, congratulations on your remarkable
                            achievement! We look forward to seeing you thrive and
                            excel in your academic pursuits.
                        </p>
                        <p>Best regards,</p>
                        <p class="regards">
                            Pangasinan State University - Alaminos City Campus
                        </p>

                        <div class="cta">
                            <a href="{{ route('homepage.index') }}" class="cta-button">
                                Explore more scholarships
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
                        Copyright © <span id="copyright">
                            <script>
                                document
                            .getElementById("copyright")
                            .appendChild(
                                document.createTextNode(
                                    new Date().getFullYear()
                                )
                            );
                            </script>
                        </span>
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