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

    body {
        font-family: "Roboto", sans-serif;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="color:white">
        <a class="navbar-brand" href="#">Spreadsheet Diff</a>
    </nav><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark" style="color:white;">IMPORT PLANILHA</div>

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
                                <label for="date">Data: </label>
                                <input id="text" type="text" placeholder=" exemplo:( 02/2021 )" name="data">
                            </div><br>
                            <button type="submit" class="btn btn-dark">Upload</button>
                        </form>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark" style="color:white;">IMPORT PLANILHA</div>

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
                                <label for="date">Data: </label>
                                <input id="text" type="text" placeholder=" exemplo:( 02/2021 )" name="data">
                            </div><br>
                            <button type="submit" class="btn btn-dark">Upload</button>
                        </form>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>