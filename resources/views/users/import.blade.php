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

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Spreadsheet Diff</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a> -->
                <!-- <a class="nav-item nav-link" href="#">Features</a> -->
            </div>
        </div>
    </nav><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">IMPORT PLANILHA</div>

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
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>