@php
    $date = date('Y-m-d');
@endphp

<!DOCTYPE html>
<html>

<head>
    <title>BDR OSS</title>
    <link rel="shortcut icon" href="/OSS_LOGO.png" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        {{-- <a style="background: none; width:100%;height:50px" class="navbar-brand text-center" href="#"><img
                src="/IHM-putih.png" class="img-fluid mb-1" alt="Responsive image" style="width: 100px"></a> --}}
        <a style="background: none; width:100%" class="navbar-brand" href="#"><img src="/LOGO OSS1.png"
                class="img-fluid" alt="Responsive image"></a>
    </nav>
    <div class="container mt-1 mb-5">
        <div class="card">
            <div class="card-header" style="background: #0092ab !important">
                <div class="header-title">
                    <h6 style="font-family: font-black; color:#fff">FORMULIR PENDAFTARAN</h6>
                </div>
            </div>
            <div class="card-body" style="background: rgba(241, 241, 241, 0.603);">
                <form action="/post-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inc_name">Nama Instansi<span class="wajib"> (wajib diisi)</span></label>
                            <input id="inc_name" type="text" name="inc_name" required
                                onkeyup="validateText('inc_name')" onclick="validateText('inc_name')"
                                onchange="validateText('inc_name')" />
                            <p class="inc_name"></p>
                            <p class="sub-input">Nama instansi, contoh: PT xxx / CV xxx</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="#">Jenis Instansi<span class="wajib"> (wajib diisi)</span></label><br>
                            <label class="containeradio">Pemerintah
                                <input type="radio" name="inc_type" value="Pemerintah" onclick="hideother()" checked>
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
                            <label for="pic">PIC<span class="wajib"> (wajib diisi)</span></label>
                            <input id="pic" type="text" name="pic" required onkeyup="validateText('pic')"
                                onclick="validateText('pic')" onchange="validateText('pic')" />
                            <p class="pic" style="display: none"></p>
                            <p class="sub-input">Nama penanggung jawab dari pihak instansi.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="no_pic">Phone<span class="wajib"> (wajib diisi)</span></label>
                            <input id="no_pic" type="number" name="no_pic" required
                                onkeyup="validateText('no_pic')" onclick="validateText('no_pic')"
                                onchange="validateText('no_pic')" />
                            <p class="no_pic" style="display: none"></p>
                            <p class="sub-input">Kontak yang bisa dihubungi, contoh: 08xxxx.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="email_pic">Email<span class="wajib"> (wajib diisi)</span></label>
                            <input id="email_pic" type="email" name="email_pic" required
                                onkeyup="validateText('email_pic')" onclick="validateText('email_pic')"
                                onchange="validateText('email_pic')" />
                            <p class="email_pic" style="display: none"></p>
                            <p class="sub-input">Contoh: user@website.com.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="people">Jumlah Orang<span class="wajib"> (wajib diisi)</span></label>
                            <input id="people" type="number" name="people" required
                                onkeyup="validateText('people')" onclick="validateText('people')"
                                onchange="validateText('people')" />
                            <p class="people" style="display: none"></p>
                            <p class="sub-input">Jumlah orang dari instansi yang akan berkunjung.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 item">
                            <label for="">Rencana Kunjungan</label>
                            <label for="plan_date">Tanggal<span class="wajib"> (wajib diisi)</span></label>
                            <input id="plan_date" type="date" name="plan_date" required min="{{ $date }}"
                                onkeyup="validateText('plan_date')" onclick="validateText('plan_date')"
                                onchange="validateText('plan_date')" />
                            <p class="plan_date" style="display: none"></p>
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 item">
                            <label for="plan_date">Jam<span class="wajib"> (wajib diisi)</span></label>
                            <input id="plan_time" type="time" name="plan_time" required
                                onkeyup="validateText('plan_time')" onclick="validateText('plan_time')"
                                onchange="validateText('plan_time')" />
                            <p class="plan_time" style="display: none"></p>
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <label class="mt-2 dokumen" for="dokumen">Dokumen Pendukung<span class="wajib"> (wajib
                            diisi)</span></label>
                    <div class="row" id="dokumen">
                        <div class="form-group col-lg-11 col-10 item">
                            <input id="1" type="file" name="dokumen[]" required onchange="cek(1)">
                        </div>
                        <div id="add" class="col-lg-1 col-2">
                            <a class="tombol add" onclick="add()"><i style="color: #fff" class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="add_dokumen"></div>
                    <div class="row">
                        <label class="containeradio">Saya mengerti dan menerima<a style="background: none"
                                data-toggle="modal" data-target="#exampleModalLong"><span class="syarat"
                                    style="cursor: pointer">
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
            box_input += "<div class='col-lg-11 col-10'>"
            box_input += "<div class='form-group' id='item'>"
            box_input += "<input id='" + number + "' type='file' name='dokumen[]' required onchange='cek(" + number +
                ")'></div></div>"
            box_input += "<div id='add' class='col-lg-1 col-2'>"
            box_input += "<a class='tombol add' onclick='hapus(" + number +
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

        function validateText(id) {
            let field = document.getElementById(id);
            let flag = document.getElementsByClassName(id)[0];
            let opacity = 0;
            if (field.value == '') {
                field.style.borderColor = "red";
                flag.innerHTML = "field tidak boleh kosong";
                flag.style.color = "red";
                flag.style.fontStyle = "italic";
                flag.style.fontSize = "90%";
                flag.style.display = "block";
            } else {
                field.style.borderColor = "#ccc";
                flag.innerHTML = "";
                flag.style.display = "none";
                var validRegex = /^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/;
                if (id == 'email_pic') {
                    if (!field.value.match(validRegex)) {
                        field.style.borderColor = "red";
                        flag.innerHTML = "format email tidak valid";
                        flag.style.color = "red";
                        flag.style.fontStyle = "italic";
                        flag.style.fontSize = "90%";
                        flag.style.display = "block";
                    } else {
                        field.style.borderColor = "#ccc";
                        flag.innerHTML = "";
                        flag.style.display = "none";
                    }
                }
            }
        }
        // alert('Your screen resolution is ' + screen.width + 'x' + screen.height);
    </script>
</body>

</html>
