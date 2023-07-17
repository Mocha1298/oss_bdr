<!DOCTYPE html>
<html>

<head>
    <title>Thanks Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/ico.png" />
    <style>
        @font-face {
            font-family: font-black;
            src: url(Brandon_blk.otf);
        }

        @font-face {
            font-family: font-med;
            src: url(Brandon_med.otf);
        }

        h1,
        p {
            font-family: font-med;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #9c76a0;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background: #6f5072;
        }

        .card {
            filter: drop-shadow(10px 10px 4px grey);
        }

        @media(min-height: 1000px) {
            h1 {
                font-size: 60px;
            }

            p {
                font-size: 40px;
            }

            button {
                width: 300px;
                padding: 10px;
                border: none;
                border-radius: 10px;
                background: #9c76a0;
                font-size: 30px;
                color: #fff;
                cursor: pointer;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="card-title">Terimakasih</h1>
                        <p class="card-text">Pesan Anda telah kami terima.</p>
                        <button onclick="back()">Back to Home</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        function back() {
            window.location.href = "/";
        }
    </script>
</body>

</html>
