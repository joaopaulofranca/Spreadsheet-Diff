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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>
    <div class="containe">
        <nav class="navbar navbar-expand-lg navbar-dark bgColor" style="color:white">
            <a href=""></a><img src="{{ url('/logo.png') }}" width="60px" style="margin-right: 15px;"><b>Spreadsheet
                Diff</b></a>

        </nav><br>

        <div class="row boxRelatorio">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bgColorGray" style="color:white;"><b>Relatório de produtos produzidos há
                            mais de dois anos.</b></div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Variação</th>
                                    <!-- <th scope="col">Qt.Produzido</th> -->
                                    <!-- <th scope="col">Estoque</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listProdutos as $produto)
                                <tr>
                                    <th scope="row">{{$produto->codigo}}</th>
                                    <td>{{$produto->descricao}}</td>
                                    <td>{{$produto->variacao}}</td>
                                    <!-- <td>{{number_format($produto->qt_produzido, 2, ',', '.')}}</td> -->
                                    <!-- <td>{{number_format($produto->estoque, 2, ',', '.')}}</td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <button id="btn" class="btn bgColorGreen" style="color:white;"
                            onClick="window.print()">Imprimir</button>
                        <button id="btn" class="btn inputBtn" style="color:white;"
                            onClick="history.go(-1)">Voltar</button>

                    </div>
                </div>
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

.box {
    padding: 4%;
}

.boxTwo {
    padding: 3%;
}

.boxRelatorio {
    align-items: center;
    justify-content: center;
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
    overflow-x: hidden;
}

.inputBtn {
    margin-right: 5px;
    background-color: #7c7b7b;
}
</style>