<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Cvičenie 1</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <header>
        <span class="welcome-header">MachShare</span> <img src="images/image.jpg" class="rounded" alt="...">
    </header>

    <div class="container border">
        <main>
            <div class="row">
                <div id="table-div" class="col table" >
                    <?php
                    include "table.php";
                    ?>
                </div>
                <div class="col form">
                    <h2>Nahraj súbor</h2>
                    <form id="profileData"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="filename">Názov súboru <span class="required">*</span></label>
                            <input required name="filename" type="text" id="filename" class="form-control" placeholder="Názov súboru">
                        </div>
                        <span class="choose-action">Vyberte obrázok na nahranie na server:</span>
                        <input class="fileToUpload" type="file" name="upfile" id="upfile">
                        <div class="input-button">
                            <button type="button" id="submit" class="btn btn-outline-primary">Nahrať</button>
                        </div>
                        <div id="response">

                        </div>
                    </form>
                    <div class="about">
                        <h1>
                            Popis:
                        </h1>
                        <p class="about-text">
                            Táto stránka slúži na uploadnutie vašich súborov pre cvičenie 1 z predmetu Webtech2.
                            Autor: <strong>Peter Rigo</strong>
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <footer class="footer">
        ©PeterRigoDevelopment
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/javascript.js"></script>
    <script src="js/sortTable.js"></script>
</body>
</html>