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
        @font-face {
            font-family: font-black;
            src: url(/Poppins/Poppins-Bold.ttf);
        }

        @font-face {
            font-family: font-med;
            src: url(/Poppins/Poppins-Regular.ttf);
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
        input,
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

        label {
            font-family: font-black;
            margin-bottom: 10px;
        }

        h1 {
            position: absolute;
            margin: 0;
            font-size: 40px;
            color: #fff;
            z-index: 2;
            line-height: 83px;
            font-family: font-black;
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

        input {
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
            color: #0093ad !important;
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
            color: #0093ad !important;
            background: none;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        .item i,
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            font-size: 20px;
            color: #0093ad !important;
        }

        .item i {
            right: 5%;
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
            color: #0093ad !important;
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
            background: #0093ad !important;
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
            background: #0093ad !important;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        a:hover {
            color: #fff;
            background: #6f5072;
        }

        .sub-input {
            font-style: italic;
            font-size: 12px;
        }

        a span {
            font-size: 12px;
        }

        /* css normal */

        @media(min-width: 320px) and (min-width: 641px) {
            input[type=checkbox] {
                position: relative;
                cursor: pointer;
            }

            input[type=checkbox]:before {
                border-radius: 3px;
                background-color: white;
            }

            input[type=checkbox]:checked:after {
                content: "";
                display: block;
                width: 5px;
                height: 10px;
                border: solid black;
                border-width: 0 2px 2px 0;
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
                position: absolute;
                top: 0;
                left: 12px;
            }

            a.tombol.add {
                margin-right: 100px;
            }

            img.img-fluid {
                width: 600px;
            }

            .container {
                max-width: 90%;
            }

            body,
            div,
            form,
            input,
            select,
            textarea,
            label {
                font-size: 40px;
                line-height: 60px;
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
                font-size: 40px;
                color: #0093ad !important;

            }

            .item i {
                top: 80px;
            }

            button {
                font-size: 30px;
            }

            a {
                height: 100%;
                margin-top: 20px;
                border-radius: 15px;
                font-size: 40px;
            }

            a i {
                font-size: 30px;
                color: #fff;
            }

            #item {
                margin-bottom: 40px;
            }

            .sub-input {
                font-size: 25px;
            }

            a span {
                font-size: 25px;
            }

            a.tombol {
                padding: 20px;
            }
        }

        @media(min-width: 642px) and (min-width: 1281px) {
            img.img-fluid {
                width: 300px;
            }

            a span {
                font-size: 12px;
            }


            a.navbar-brand {
                margin: 0;
            }

            a i {
                font-size: 12px;
            }

            /* css normal */

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
            input,
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

            label {
                font-family: font-black;
                margin-bottom: 10px;
            }

            h1 {
                position: absolute;
                margin: 0;
                font-size: 40px;
                color: #fff;
                z-index: 2;
                line-height: 83px;
                font-family: font-black;
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

            input {
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
                color: #0093ad !important;
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
                color: #0093ad !important;
                background: none;
            }

            input[type="date"]::-webkit-inner-spin-button {
                display: none;
            }

            .item i,
            input[type="date"]::-webkit-calendar-picker-indicator {
                position: absolute;
                font-size: 20px;
                color: #0093ad !important;
            }

            .item i {
                right: 5%;
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
                color: #0093ad !important;
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
                background: #0093ad !important;
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
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                background: #0093ad !important;
                font-size: 16px;
                color: #fff;
                cursor: pointer;
            }

            a:hover {
                color: #fff;
                background: #6f5072;
            }

            .sub-input {
                font-style: italic;
                font-size: 15px;
            }

            /* css normal */
        }
    </style>
</head>

<body style="background: rgb(190, 190, 190)">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #134a6e !important">
        <a style="background: none;" class="navbar-brand" href="#"><img src="/nama.png" class="img-fluid"
                alt="Responsive image"></a>
    </nav>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between" style="background: #134a6e !important">
                <div class="header-title">
                    <h4 style="font-family: font-black; color:#fff">Form Registrasi</h4>
                </div>
            </div>
            <div class="card-body" style="background: rgba(241, 241, 241, 0.603);">
                <p>*) = Elemen wajib di isi</p>
                <form action="/post-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="inc_name">Nama Instansi *)</label>
                                <input id="inc_name" type="text" name="inc_name" required />
                                <p class="sub-input">Nama instansi, contoh: PT xxx / CV xxx</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="inc_type">Jenis Instansi *)</label>
                                <input id="inc_type" type="text" name="inc_type" required />
                                <p class="sub-input">Jenis instansi, contoh: Negeri/Swasta</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="pic">PIC *)</label>
                                <input id="pic" type="text" name="pic" required />
                                <p class="sub-input">Nama penanggung jawab dari pihak instansi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="no_pic">Phone *)</label>
                                <input id="no_pic" type="number" name="no_pic" required />
                                <p class="sub-input">Kontak yang bisa dihubungi, contoh: 08xxxx.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="email_pic">Email *)</label>
                                <input id="email_pic" type="email" name="email_pic" required />
                                <p class="sub-input">Contoh: user@website.com.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="people">Jumlah Orang *)</label>
                                <input id="people" type="number" name="people" required />
                                <p class="sub-input">Jumlah orang dari instansi yang akan berkunjung.</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <label for="">Rencana Kunjungan</label>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group item">
                                <label for="plan_date">Tanggal *)</label>
                                <input id="plan_date" type="date" name="plan_date" required
                                    min="{{ $date }}" />
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group item">
                                <label for="plan_date">Jam *)</label>
                                <input id="plan_time" type="time" name="plan_time" required />
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                    </div>
                    <label for="dokumen">Dokumen Pendukung *)</label>
                    <div class="row" id="dokumen">
                        <div class="col-lg-11 col-10">
                            <div class="form-group item" id="item">
                                <input id="1" type="file" name="dokumen[]" required onchange="cek(1)">
                            </div>
                        </div>
                        <div class="col-lg-1 col-2 mt-3">
                            <a class="tombol add mr-2" onclick="add()"><i style="color: #fff"
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="add_dokumen"></div>
                    <div class="row">
                        <div class="col-lg-1 col-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault1" required style="width: 30px;margin-top:15px">
                            </div>
                        </div>
                        <div class="col-lg-11 col-11">
                            <label class="form-check-label sub-input" for="flexCheckDefault1"
                                style="font-family: font-black; font-style: normal;">
                                Saya mengerti dan menerima<a style="background: none" data-toggle="modal"
                                    data-target="#exampleModalLong"><span style="cursor: pointer">
                                        Syarat dan
                                        Ketentuan </span></a>penggunaan
                                sistem OSS
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <button id="submit" type="submit" disabled>SUBMIT DATA DIRI ANDA</button>
                        </div>
                    </div>
                </form>
                <p class="text-center mt-1" style="margin-bottom: 0;">© 2023 PT Taman Wisata Candi Borobudur,
                    Prambanan dan Ratu Boko</p>
            </div>
        </div>
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
            box_input += "<div class='col-lg-11 col-10'>"
            box_input += "<div class='form-group item' id='item'>"
            box_input += "<input id='" + number + "' type='file' name='dokumen[]' required onchange='cek(" + number +
                ")'></div></div>"
            box_input += "<div class='col-lg-1 col-2 mt-3'>"
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
                    confirmButtonColor: '#0093ad !important',
                })
                document.getElementById(id).style.borderColor = "red";
            }
            var fileSize = Math.round((file[0].size / 1024));

            if (fileSize >= 10 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran maksimal 10MB!',
                    confirmButtonColor: '#0093ad !important',
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
                        confirmButtonColor: '#0093ad !important',
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
        // alert('Your screen resolution is ' + screen.width + 'x' + screen.height);
    </script>
</body>

</html>
{{-- // // Image preview
                    // if (fileInput.files && fileInput.files[0]) {
                    //     var reader = new FileReader();
                    //     reader.onload = function(e) {
                    //         document.getElementById(
                    //                 'imagePreview').innerHTML =
                    //             '<img src="' + e.target.result +
                    //             '"/>';
                    //     };

                    //     reader.readAsDataURL(fileInput.files[0]);
                    // } --}}
