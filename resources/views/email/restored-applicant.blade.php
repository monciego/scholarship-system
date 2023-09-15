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
                            We hope this message finds you well. We would like to inform you of a recent development
                            regarding your scholarship application for the {{ $data["scholarshipName"] }}. After a
                            thorough review,
                            we are pleased to notify you that your application has been restored for further
                            consideration.
                        </p>
                        <p>
                            Your dedication to your academic pursuits and personal goals has not gone unnoticed, and we
                            are excited to give your application another opportunity to compete for the e {{
                            $data["scholarshipName"] }}.
                        </p>
                        <p>
                            We appreciate your patience and understanding during this process. Rest assured that your
                            application will be given the full consideration it deserves.
                        </p>
                        <p>
                            If you have any questions or need further information, please do not hesitate to reach out
                            to our scholarship committee at {{ $data["representativeEmail"] }}. We are here to assist
                            you and provide any support needed as your application progresses.
                        </p>
                        <p>
                            Thank you for your continued interest in the {{
                            $data["scholarshipName"] }}. We look
                            forward to
                            reviewing your application once again and wish you the very best in your academic pursuits.
                        </p>
                        <p>Best regards,</p>
                        <p class="regards">
                            Pangasinan State University - Alaminos City Campus
                        </p>

                        <div class="cta">
                            <a href="{{ route('homepage.index') }}" class="cta-button">
                                Explore scholarships
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