<!DOCTYPE>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <style>
    .container {
        width: 100%;
        height: 15%;
        margin: 0;
    }

    .box {
        padding: 4%;
    }

    .boxTwo {
        padding: 3%;
    }

    .bgColorGreen {
        background-color: #81b45b;
    }

    .selectColorGreen {
        background-color: #81b45b;
        padding: 5px;
        /* border-radius: 8%; */
        width: 350px;
        height: 38px;
        line-height: 38px;
        font-family: "Roboto", sans-serif !important;
        color: white;
        font-size: 12px;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: none;
        /* background: transparent; */
    }

    .bgColor {
        background-color: #1b5a3d;
    }

    .bgColorGray {
        background-color: #7c7b7b;
    }

    button {
        margin-top: 50px;
        float: right;
    }

    body {
        font-family: "Roboto", sans-serif;
    }
    </style>
</head>

<body>
    <div class="containe">
        <nav class="navbar navbar-expand-lg navbar-dark bgColor" style="color:white">
            <a class="navbar-brand" href="#"><b>Spreadsheet Diff</b></a>
        </nav><br>
        <div class="row boxTwo">
            <div class="col-6 ">
                <div class="card">
                    <div class="card-header bgColorGray" style="color:white;"><b>IMPORT PLANILHA</b></div>

                    <div class="card-body">

                        <form action="/users/import" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <!-- <input type="file" name="file" /> -->
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customFileLang"
                                        lang="es">
                                    <label class="custom-file-label" for="customFileLang">Selecionar Arquivo</label>
                                </div>

                            </div>
                            <div class="data">
                                <input id="text" type="text" placeholder=" Data (ex: xx/xxxx) " name="data"
                                    class="form-control form-icon-trailing">

                            </div>
                            <button type="submit" class="btn bgColorGray" style="color:white;">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header bgColorGray" style="color:white;"><b>INFORMAÇÕES</b></div>

                    <!-- <div class="card-body">
                        <div class="col-3">
                            <div class="card bgColorGreen" style="width: 22rem; color:white;border:none;">
                                <div class="card-body">
                                    <h5 class="card-title">Total de planilhas registradas</h5>
                                    <p class="card-text" style="float: right;margin-right:15px;">15</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="row boxTwo">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bgColorGray" style="color:white;"><b>COMPARAR PLANILHA</b></div>
                    <div class="card-body">
                        <form action="/users/compare" method="post" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-6">
                                    <p>Primeira planilha</p>
                                    <select class="form-select form-select-lg selectColorGreen"
                                        aria-label=".form-select-lg example">
                                        <option selected>Selecione uma planilha</option>
                                        <option value="1">Planilha 01/2021</option>
                                        <option value="2">Planilha 02/2021</option>
                                        <option value="3">Planilha 03/2021</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <p>Segunda planilha</p>
                                    <select class="form-select form-select-lg selectColorGreen"
                                        aria-label=".form-select-lg example">
                                        <option selected>Selecione uma planilha</option>
                                        <option value="1">Planilha 01/2021</option>
                                        <option value="2">Planilha 02/2021</option>
                                        <option value="3">Planilha 03/2021</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn bgColorGray" style="color:white;">Comparar</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-6">
            </div>
        </div>
    </div>

</body>

</html>