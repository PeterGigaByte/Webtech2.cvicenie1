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
                <div class="col table" >
                    <h2>Uložené súbory</h2>
                    <table class="container" id="table" style="overflow: scroll">
                        <tr>
                            <th id="0" onclick="sortTable(0,'text')" >Názov súboru </th>
                            <th id="1"  onclick="sortTable(1,'number')">Veľkosť </th>
                            <th id="2" onclick="sortTable(2,'text')">Dátum nahrania </th>
                        </tr>
                        <?php
                        $directoryArray = scandir('/home/xrigo/public_html/cvicenia/cvicenie1/files', 1);
                        $directoryArray = array_diff($directoryArray, array('.', '..'));
                        foreach ($directoryArray as $file){
                            $date = date_create();
                                echo "<tr>
                                    <td>
                                    {$file}
                                    </td>
                                    <td>"
                                    . filesize("files/" . $file)  . ' Bytes' .
                                    "</td>
                                    <td>"
                                    .
                                    date_format($date, 'U = Y-m-d H:i:s') . "\n"
                                    ."
                                    </td>
                                    </tr>";
                        }
                        ?>
                    </table>
                </div>
            <div class="col form">
                <h2>Nahraj súbor</h2>
                <form id="profileData"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="filename">Názov súboru</label>
                        <input name="filename" type="text" id="filename" class="form-control" placeholder="Názov súboru">
                    </div>
                    <span class="choose-action">Vyberte obrázok na nahranie na server:</span>
                    <input class="fileToUpload" type="file" name="upfile" id="upfile">
                    <div class="input-button">
                        <button type="button" id="submit" class="btn btn-outline-primary">Nahrať</button>
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
        </main>
    </div>
    <footer class="footer">
        ©PeterRigoDevelopment
    </footer>
    <script src="js/javascript.js"></script>
    <script src="js/sortTable.js"></script>
</body>
</html>