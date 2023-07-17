<!DOCTYPE html>
<html>

<head>
    <title>BDR OSS</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: font-black;
            src: url(Brandon_blk.otf);
        }

        @font-face {
            font-family: font-med;
            src: url(Brandon_med.otf);
        }

        html,
        body {
            min-height: 100%;
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 20px;
        }

        form {
            width: 100%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 8px #9c76a0;
        }

        .banner {
            position: relative;
            height: 300px;
            background-image: url("banner.png");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .banner::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
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
            color: #9c76a0;
        }

        .item input:hover,
        .item select:hover,
        .item textarea:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 3px 0 #9c76a0;
            color: #9c76a0;
        }

        .item {
            position: relative;
            margin: 10px 0;
        }

        .item span {
            color: red;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        .item i,
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            font-size: 20px;
            color: #9c76a0;
        }

        .item i {
            right: 5%;
            top: 30px;
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
            color: #9c76a0;
        }

        .item i {
            right: 5%;
            top: 30px;
            z-index: 1;
        }

        [type="time"]::-webkit-calendar-picker-indicator {
            right: 5%;
            z-index: 2;
            opacity: 0;
            cursor: pointer;
        }

        input[type=radio],
        input[type=checkbox] {
            display: none;
        }

        label.radio {
            position: relative;
            display: inline-block;
            margin: 5px 20px 15px 0;
            cursor: pointer;
        }

        .question span {
            margin-left: 30px;
        }

        .question-answer label {
            display: block;
        }

        label.radio:before {
            content: "";
            position: absolute;
            left: 0;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        input[type=radio]:checked+label:before,
        label.radio:hover:before {
            border: 2px solid #9c76a0;
        }

        label.radio:after {
            content: "";
            position: absolute;
            top: 6px;
            left: 5px;
            width: 8px;
            height: 4px;
            border: 3px solid #9c76a0;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }

        input[type=radio]:checked+label:after {
            opacity: 1;
        }

        .btn-block {
            margin-top: 10px;
            text-align: center;
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

        a {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #9c76a0;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        a:hover {
            color: #fff;
            background: #6f5072;
        }

        @media (min-width: 568px) {

            .name-item,
            .city-item {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .name-item input,
            .name-item div {
                width: calc(50% - 20px);
            }

            .name-item div input {
                width: 97%;
            }

            .name-item div label {
                display: block;
                padding-bottom: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="col-sm-8">
            <div class="testbox">
                <form action="/post-form" method="post" enctype="multipart/form-data">
                    <div class="banner"></div>
                    @csrf
                    {{-- <div class="item">
                        <label for="inc_name">Nama Instansi<span>*</span></label>
                        <input id="inc_name" type="text" name="inc_name" required />
                    </div>
                    <div class="item">
                        <label for="inc_type">Jenis Instansi<span>*</span></label>
                        <input id="inc_type" type="text" name="inc_type" required />
                    </div>
                    <div class="item">
                        <label for="inc_type">Jenis Instansi<span>*</span></label>
                        <input id="inc_type" type="text" name="inc_type" required />
                    </div>
                    <div class="item">
                        <label for="pic">PIC<span>*</span></label>
                        <input id="pic" type="text" name="pic" required />
                    </div>
                    <div class="item">
                        <label for="no_pic">Phone<span>*</span></label>
                        <input id="no_pic" type="number" name="no_pic" required />
                    </div>
                    <div class="item">
                        <label for="email">Email<span>*</span></label>
                        <input id="email" type="email" name="email" required />
                    </div>
                    <div class="item">
                        <label for="people">Jumlah Orang<span>*</span></label>
                        <input id="people" type="number" name="people" required />
                    </div>
                    <div class="item">
                        <label for="plan_date">Rencana Kunjungan (Tanggal)<span>*</span></label>
                        <input id="plan_date" type="date" name="plan_date" required />
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="item">
                        <label for="plan_date">Rencana Kunjungan (Jam)<span>*</span></label>
                        <input id="plan_time" type="time" name="plan_time" required />
                        <i class="fas fa-clock"></i>
                    </div> --}}
                    <div class="item" id="item">
                        <label for="dokumen">File Pendukung<span>*</span></label>
                        <input type="file" name="asd" id="">
                    </div>
                    <a class="add mr-4" onclick="add()"><i class="fa fa-plus"></i></a>
                    <a class="remove" onclick="remove()"><i class="fa fa-minus"></i></a>
                    <div class="btn-block mt-4">
                        <button type="submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var formfield = document.getElementById('item');

        function add() {
            var input_tags = formfield.getElementsByTagName('input');
            var number = input_tags.length + 1;
            var newField = document.createElement('input');
            newField.setAttribute('type', 'file');
            newField.setAttribute('name', 'dokumen[]');
            newField.setAttribute('required', '');
            formfield.appendChild(newField);
        }

        function remove() {
            var input_tags = formfield.getElementsByTagName('input');
            console.log(input_tags.length);
            if (input_tags.length > 1) {
                formfield.removeChild(input_tags[(input_tags.length) - 1]);
            }
        }
    </script>
</body>

</html>
