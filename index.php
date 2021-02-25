<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Cvičenie 1</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
<pre>

</pre>

    <header>
        <span class="welcome-header">Vitajte na tejto stránke</span>
    </header>
    <div class="border">
        <main>
                <table>
                    <tr>
                        <th>Názov súboru</th>
                        <th>Veľkosť</th>
                        <th>Dátum nahrania</th>
                    </tr>
                    <?php
                    $directoryArray = scandir('/home/xrigo/public_html/cvicenia/cvicenie1/files', 1);
                    $directoryArray = array_diff($directoryArray, array('.', '..'));
                    foreach ($directoryArray as $file){
                            echo "<tr>
                                <td>
                                {$file}
                                </td>
                                <td>"
                                . filesize("files/" . $file) .
                                "</td>
                                <td>
                                
                                </td>
                                </tr>";
                    }
                    ?>
                </table>
            <div class="form-action">
                <form id="profileData"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="filename">Filename</label>
                        <input name="filename" type="text" id="filename" class="form-control" placeholder="File name">
                    </div>
                    <span class="choose-action">Vyberte obrázok na nahranie na server:</span>
                    <input class="fileToUpload" type="file" name="upfile" id="upfile">
                    <div class="input-button">
                        <button type="button" id="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="about">
                <h1>
                    Popis:
                </h1>
                <p class="about-text">
                    Táto stránka slúži na uploadnutie vašich súborov pre cvičenie 1 z predmetu Webtech2.
                    Autor: <strong>Peter Rigo</strong>
                </p>
            </div>
        </main>
    </div>
    <script src="js/javascript.js"></script>
</body>
</html>