@php
    $date = date('Y-m-d');
@endphp

<!DOCTYPE html>
<html>

<head>
    <title>BDR OSS</title>
    <link rel="shortcut icon" href="/ico.png" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        /* css normal */
        /* @font-face {
            font-family: font-black;
            src: url(/Poppins/Poppins-Bold.ttf);
        }

        @font-face {
            font-family: font-med;
            src: url(/Poppins/Poppins-Regular.ttf);
        } */
        @font-face {
            font-family: font-black;
            src: url(/Roboto/Roboto-Bold.ttf);
        }

        @font-face {
            font-family: font-med;
            src: url(/Roboto/Roboto-Regular.ttf);
        }

        @font-face {
            font-family: font-itlc;
            src: url(/Roboto/Roboto-Italic.ttf);
        }

        .container {
            max-width: 70%;
        }

        h2#swal2-title.swal2-title {
            font-family: font-black;
        }

        div#swal2-html-container.swal2-html-container {
            font-family: font-med;
        }

        button.swal2-confirm.swal2-styled.swal2-default-outline {
            font-family: font-med;
        }

        body,
        div,
        form,
        select,
        textarea,
        label {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: font-med;
            font-size: 16px;
            color: #666;
            line-height: 22px;
        }

        .card-header {
            padding: 5px 10px;
        }

        h6 {
            margin-bottom: 0;
        }

        label {
            font-family: font-black;
            margin-bottom: 10px;
        }

        .testbox {
            padding: 20px;
            width: 80%;
        }

        form {
            width: 100%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 8px #1f2855 !important;
        }

        input,
        select,
        textarea {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="email"],
        input[type="file"],
        input[type="time"] {
            width: calc(100% - 10px);
            padding: 5px;
        }

        input[type="date"] {
            padding: 4px 5px;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .item:hover p,
        .item:hover i,
        .question:hover p,
        .question label:hover,
        input:hover::placeholder {
            color: #243460 !important;
        }

        .item input:hover,
        .item select:hover,
        .item textarea:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 3px 0 #1f2855 !important;
        }

        .item {
            position: relative;
            margin: 10px 0;
        }

        label span {
            color: #243460 !important;
            background: none;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        .item i,
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            font-size: 20px;
            color: #243460 !important;
        }

        .item i {
            right: 1%;
            top: 40px;
            z-index: 1;
        }

        [type="date"]::-webkit-calendar-picker-indicator {
            right: 5%;
            z-index: 2;
            opacity: 0;
            cursor: pointer;
        }

        input[type="time"]::-webkit-inner-spin-button {
            display: none;
        }

        .item i,
        input[type="time"]::-webkit-calendar-picker-indicator {
            position: absolute;
            font-size: 20px;
            color: #243460 !important;
        }

        [type="time"]::-webkit-calendar-picker-indicator {
            right: 5%;
            z-index: 2;
            opacity: 0;
            cursor: pointer;
        }

        .btn-block {
            margin-top: 10px;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #243460 !important;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            font-family: font-black;
        }

        button:hover {
            background: #6f5072;
        }

        a.tombol {
            /* width: 150px; */
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background: #243460 !important;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        a:hover {
            color: #fff;
            background: #6f5072;
        }

        .sub-input {
            font-family: font-itlc;
            font-size: 12px;
        }

        a span {
            font-size: 12px;
        }

        /* css normal */
    </style>
    <style>
        .containeradio {
            display: block;
            position: relative;
            padding-left: 50px;
            margin-bottom: 12px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .containeradio input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* RAdiobutton */

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 5px;
            left: 20px;
            height: 15px;
            width: 15px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .containeradio:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .containeradio input:checked~.checkmark {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .containeradio input:checked~.checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .containeradio .checkmark:after {
            top: 5px;
            left: 5px;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: white;
        }

        label.containeradio {
            font-size: 15px;
            font-family: font-med;
        }

        /* CHeckbox */

        /* Hide the browser's default radio button */
        .containeradio input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark2 {
            position: absolute;
            top: 12px;
            left: 13px;
            height: 15px;
            width: 15px;
            background-color: #eee;
            /* border-radius: 50%; */
        }

        /* On mouse-over, add a grey background color */
        .containeradio:hover input~.checkmark2 {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .containeradio input:checked~.checkmark2 {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark2:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .containeradio input:checked~.checkmark2:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .containeradio .checkmark2:after {
            top: 5px;
            left: 5px;
            width: 5px;
            height: 5px;
            /* border-radius: 50%; */
            background: white;
        }

        @media(min-width: 320px) and (min-width: 641px) {
            .containeradio {
                display: block;
                position: relative;
                padding-left: 100px;
                margin-bottom: 12px;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            /* Hide the browser's default radio button */
            .containeradio input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }

            /* RAdiobutton */

            /* Create a custom radio button */
            .checkmark {
                position: absolute;
                top: 5px;
                left: 20px;
                height: 35px;
                width: 35px;
                background-color: #eee;
                border-radius: 50%;
            }

            /* On mouse-over, add a grey background color */
            .containeradio:hover input~.checkmark {
                background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .containeradio input:checked~.checkmark {
                background-color: #2196F3;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }

            /* Show the indicator (dot/circle) when checked */
            .containeradio input:checked~.checkmark:after {
                display: block;
            }

            /* Style the indicator (dot/circle) */
            .containeradio .checkmark:after {
                top: 10px;
                left: 10px;
                width: 15px;
                height: 15px;
                border-radius: 50%;
                background: white;
            }

            label.containeradio {
                font-size: 35px;
            }

            /* CHeckbox */

            /* Create a custom radio button */
            .checkmark2 {
                position: absolute;
                top: 12px;
                left: 13px;
                height: 35px;
                width: 35px;
                background-color: #eee;
                /* border-radius: 50%; */
            }

            /* On mouse-over, add a grey background color */
            .containeradio:hover input~.checkmark2 {
                background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .containeradio input:checked~.checkmark2 {
                background-color: #2196F3;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark2:after {
                content: "";
                position: absolute;
                display: none;
            }

            /* Show the indicator (dot/circle) when checked */
            .containeradio input:checked~.checkmark2:after {
                display: block;
            }

            /* Style the indicator (dot/circle) */
            .containeradio .checkmark2:after {
                top: 10px;
                left: 10px;
                width: 15px;
                height: 15px;
                /* border-radius: 50%; */
                background: white;
            }
        }

        @media(min-width: 642px) and (min-width: 1281px) {
            .containeradio {
                display: block;
                position: relative;
                padding-left: 50px;
                margin-bottom: 12px;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            /* Hide the browser's default radio button */
            .containeradio input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }

            /* RAdiobutton */

            /* Create a custom radio button */
            .checkmark {
                position: absolute;
                top: 5px;
                left: 20px;
                height: 15px;
                width: 15px;
                background-color: #eee;
                border-radius: 50%;
            }

            /* On mouse-over, add a grey background color */
            .containeradio:hover input~.checkmark {
                background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .containeradio input:checked~.checkmark {
                background-color: #2196F3;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }

            /* Show the indicator (dot/circle) when checked */
            .containeradio input:checked~.checkmark:after {
                display: block;
            }

            /* Style the indicator (dot/circle) */
            .containeradio .checkmark:after {
                top: 5px;
                left: 5px;
                width: 5px;
                height: 5px;
                border-radius: 50%;
                background: white;
            }

            label.containeradio {
                font-size: 15px;
                font-family: font-med;
            }

            /* CHeckbox */

            /* Hide the browser's default radio button */
            .containeradio input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }

            /* Create a custom radio button */
            .checkmark2 {
                position: absolute;
                top: 12px;
                left: 13px;
                height: 15px;
                width: 15px;
                background-color: #eee;
                /* border-radius: 50%; */
            }

            /* On mouse-over, add a grey background color */
            .containeradio:hover input~.checkmark2 {
                background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .containeradio input:checked~.checkmark2 {
                background-color: #2196F3;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark2:after {
                content: "";
                position: absolute;
                display: none;
            }

            /* Show the indicator (dot/circle) when checked */
            .containeradio input:checked~.checkmark2:after {
                display: block;
            }

            /* Style the indicator (dot/circle) */
            .containeradio .checkmark2:after {
                top: 5px;
                left: 5px;
                width: 5px;
                height: 5px;
                /* border-radius: 50%; */
                background: white;
            }
        }
    </style>
</head>

<body
    style="background: rgba(241, 241, 241, 0.603);background: url(background.png) bottom no-repeat;background-size: 120%">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4" style="background: #243460 !important">
        <a style="background: none; width:100%;height:50px" class="navbar-brand text-center" href="#"><img
                src="/IHM-putih.png" class="img-fluid mb-1" alt="Responsive image" style="width: 100px"></a>
    </nav>
    <div class="container mt-1 mb-5">
        <a style="background: none; width:100%" class="navbar-brand d-flex justify-content-center mb-4"
            href="#"><img src="/LOGO OSS.png" class="img-fluid" alt="Responsive image" style="width:200px"></a>
        <div class="card">
            <div class="card-header" style="background: #0092ab !important">
                <div class="header-title">
                    <h6 style="font-family: font-black; color:#fff">FORMULIR PENDAFTARAN</h6>
                </div>
            </div>
            <div class="card-body" style="background: rgba(241, 241, 241, 0.603);">
                <p class="sub-input" style="font-family: font-itlc">*) = Elemen wajib di isi</p>
                <form action="/post-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inc_name">Nama Instansi *)</label>
                            <input id="inc_name" type="text" name="inc_name" required />
                            <p class="sub-input">Nama instansi, contoh: PT xxx / CV xxx</p>
                        </div>
                    </div>
                    <label for="">Jenis Instansi *)</label><br>
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{-- <input id="inc_type" type="text" name="inc_type" required /> --}}
                            <label class="containeradio">Negeri
                                <input type="radio" name="inc_type" value="Negeri" onclick="hideother()">
                                <span class="checkmark"></span>
                            </label>
                            <label class="containeradio">Swasta
                                <input type="radio" name="inc_type" value="Swasta" onclick="hideother()">
                                <span class="checkmark"></span>
                            </label>
                            <label class="containeradio">Lainya:
                                <input type="radio" name="inc_type" onclick="showother()">
                                <span class="checkmark"></span>
                            </label>
                            <input style="display:none" id="inc_type" type="text" name="inc_type" />
                            <p class="sub-input">Jenis instansi, contoh: Negeri/Swasta/Lainnya</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="pic">PIC *)</label>
                            <input id="pic" type="text" name="pic" required />
                            <p class="sub-input">Nama penanggung jawab dari pihak instansi.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="no_pic">Phone *)</label>
                            <input id="no_pic" type="number" name="no_pic" required />
                            <p class="sub-input">Kontak yang bisa dihubungi, contoh: 08xxxx.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="email_pic">Email *)</label>
                            <input id="email_pic" type="email" name="email_pic" required />
                            <p class="sub-input">Contoh: user@website.com.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="people">Jumlah Orang *)</label>
                            <input id="people" type="number" name="people" required />
                            <p class="sub-input">Jumlah orang dari instansi yang akan berkunjung.</p>
                        </div>
                    </div>
                    <label for="">Rencana Kunjungan</label>
                    <div class="row">
                        <div class="form-group col-md-12 item">
                            <label for="plan_date">Tanggal *)</label>
                            <input id="plan_date" type="date" name="plan_date" required
                                min="{{ $date }}" />
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 item">
                            <label for="plan_date">Jam *)</label>
                            <input id="plan_time" type="time" name="plan_time" required />
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <label for="dokumen">Dokumen Pendukung *)</label>
                    <div class="row" id="dokumen">
                        <div class="col-lg-10 col-10">
                            <div class="form-group" id="item">
                                <input id="1" type="file" name="dokumen[]" required onchange="cek(1)">
                            </div>
                        </div>
                        <div class="col-lg-2 col-2 mt-3 d-flex align-items-start justify-content-start">
                            <a class="tombol add" onclick="add()"><i style="color: #fff" class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="add_dokumen"></div>
                    <div class="row">
                        <label class="containeradio">Saya mengerti dan menerima<a style="background: none"
                                data-toggle="modal" data-target="#exampleModalLong"><span style="cursor: pointer">
                                    Syarat dan
                                    Ketentuan </span></a>penggunaan
                            sistem OSS
                            <input type="checkbox">
                            <span class="checkmark2"></span>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <button id="submit" type="submit" disabled>SUBMIT DATA DIRI ANDA</button>
                        </div>
                    </div>
                </form>
                <p class="text-center mt-4" style="margin-bottom: 0;">© 2023 PT Taman Wisata Candi Borobudur,
                    Prambanan dan Ratu Boko</p>
            </div>
        </div>
        {{-- <img src="/background.png" style="z-index:-99;background: no-repeat" alt=""> --}}
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Syarat dan Ketentuan</h5>
                    <button style="background: none;width: auto;" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span style="background: none;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

                    Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.

                    Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
                    consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

                    Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

                    Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.

                    Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
                    consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

                    Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

                    Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.

                    Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
                    consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

                    Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

                    Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.

                    Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
                    consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

                    Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

                    Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.

                    Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
                    consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

                    Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

                    Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.

                    Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
                    consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        var number = 2;

        function add() {
            var box_input = "<div class='row' id='field" + number + "'>"
            box_input += "<div class='col-lg-10 col-10'>"
            box_input += "<div class='form-group item' id='item'>"
            box_input += "<input id='" + number + "' type='file' name='dokumen[]' required onchange='cek(" + number +
                ")'></div></div>"
            box_input += "<div class='col-lg-2 col-2 mt-3'>"
            box_input += "<a class='tombol add mr-2' onclick='hapus(" + number +
                ")'><i style='color: #fff'class='fa fa-minus'></i></a></div>"
            $('.add_dokumen').append(box_input);
            number++;
        }

        function hapus(id) {
            console.log(id);
            var field = $("#field" + id);
            field.remove();
            number--;
        }
        // for (let i = 1; i <= number; i++) {}

        function cek(id) {
            const fileInput = document.getElementById(id);
            console.log(fileInput);

            // var input = document.getElementById(id);
            var file = fileInput.files;
            if (file.length == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'File belum dipilih!',
                    confirmButtonColor: '#243460 !important',
                })
                document.getElementById(id).style.borderColor = "red";
            }
            var fileSize = Math.round((file[0].size / 1024));

            if (fileSize >= 10 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran maksimal 10MB!',
                    confirmButtonColor: '#243460 !important',
                })
                document.getElementById(id).style.borderColor = "red";
                fileInput.value = '';
            } else {
                var filePath = fileInput.value;
                // Allowing file type
                var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.pdf|\.xls|\.xlsx|\.doc|\.docx)$/i;
                if (!allowedExtensions.exec(filePath)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'File yang didukung *jpg,*jpeg,*png,*pdf,*xls,*xlsx,*doc,*docx',
                        confirmButtonColor: '#243460 !important',
                    })
                    document.getElementById(id).style.borderColor = "red";
                    fileInput.value = '';
                    return false;
                } else {
                    document.getElementById(id).style.borderColor = "#ccc";
                    document.getElementById('submit').disabled = false;
                }
            }
        }

        function showother() {
            console.log($("#inc_type"));
            var input = $("#inc_type");
            input.prop('required', true);
            input.show();
        }

        function hideother() {
            console.log($("#inc_type"));
            var input = $("#inc_type");
            input.prop('required', false);
            input.hide();
        }
        // alert('Your screen resolution is ' + screen.width + 'x' + screen.height);
    </script>
</body>

</html>
