<html>

<head>
    <meta charset="UTF-8">
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
    <script>
    function mostra() {
        document.getElementById('ma').style.display = 'block';
    }
    </script>

</head>

<body>
    <div class="containe">
        <nav class="navbar navbar-expand-lg navbar-dark bgColor" style="color:white">
            <a class="navbar-brand" href="#"><b>Spreadsheet Diff</b></a>
        </nav><br>
        <div class="row boxTwo">
            <div class="col-6 ">
                <div>
                    @include('../alerts')
                </div>

                <div class="card">
                    <div class="card-header bgColorGray" style="color:white;"><b>IMPORT PLANILHA</b>

                    </div>

                    <div class="card-body">

                        <form action="/users/import" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <!-- <input type="file" name="file" /> -->
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customFileLang"
                                        required id='val' lang="es">
                                    <label class="custom-file-label" id="buttonFile" for="customFileLang">Selecionar
                                        Arquivo</label>
                                </div>

                            </div>
                            <div class="data">
                                <input id="text" type="text" placeholder=" ex: MM/AAAA " name="data" minlength="6"
                                    style="max-width:150px;" maxlength="7" class="form-control" required>
                            </div>
                            <button type="submit" class="btn bgColorGray botao" onClick="mostra()" style="color:white;">
                                Upload
                            </button>
                            <div id="ma" class="loader load hidden"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div>
                    @include('../deleteAlert')
                </div>
                <div class="card">
                    <div class="card-header bgColorGray" style="color:white;"><b>LISTAGEM DE PLANILHAS RECENTES</b>
                    </div>

                    <div class="card-body">
                        <div class="col-12 justify-content-center">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Planilha</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectListInfo as $selectListInfo)
                                    <tr>
                                        <td>Referente ao mês {{preg_replace("/(\d{2})(\d{4})/", "\$1/\$2",
                                            $selectListInfo->data) }}</td>
                                        <td align="center">
                                            <form method="POST" action="/users/remove/{{ $selectListInfo->data }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn bgColorGray btnB" style="color:white;"
                                                    onClick="confirm('Deseja deletar ?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" style="color:gray;"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                </button>

                                            </form>
                                        </td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="de" class="loader load hidden"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row boxTwo">
            <div class="col-6">
                <div>
                    @include('../alertPlan')
                </div>
                <div class="card">
                    <div class="card-header bgColorGray" style="color:white;"><b>COMPARAR PLANILHA</b></div>
                    <div class="card-body">
                        <form action="/users/compare" method="post" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-6">

                                    <p>Planilha Anterior</p>
                                    <select class="form-select form-select-lg selectColorGreen" name="codigo_anterior"
                                        required aria-label=".form-select-lg example">
                                        <option selected> --- Selecione --- </option>
                                        @foreach ($selectList as $selectList)
                                        <option value="{{ $selectList->data }}">{{
                                            preg_replace("/(\d{2})(\d{4})/", "\$1/\$2", $selectList->data) }}

                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-6">
                                    <p>Planilha Atual</p>
                                    <select class="form-select form-select-lg selectColorGreen" name="codigo_atual"
                                        required aria-label=".form-select-lg example">
                                        <option selected> --- Selecione --- </option>
                                        @foreach ($secondSelectList as $selectList)
                                        <option value="{{ $selectList->data }}">{{
                                            preg_replace("/(\d{2})(\d{4})/", "\$1/\$2", $selectList->data) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn bgColorGray botao" style="color:white;">Comparar</button>
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

<style>
.container {
    width: 100%;
    height: 15%;
    margin: 0;
}

#inputArquivo {
    display: none;
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

.loader {
    border: 5px solid #9c9b9b;
    border-radius: 50%;
    border-top: 5px solid #1b5a3d;
    width: 30px;
    height: 30px;
    -webkit-animation: spin 1s linear infinite;
    /* Safari */
    animation: spin 1s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.bgColor {
    background-color: #1b5a3d;
}

.bgColorGray {
    background-color: #7c7b7b;
}

.botao {
    margin-top: 50px;
    float: right;
}

.load {
    margin-top: 50px;
    float: left;
}

.hidden {
    display: none;
}

.btnB {
    background-color: transparent;
    color: gray;
    border: none;

}

body {
    font-family: "Roboto", sans-serif;
}
</style>