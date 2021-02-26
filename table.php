<?php
$directoryArray = scandir('/home/xrigo/public_html/cvicenia/cvicenie1/files', 1);
$directoryArray = array_diff($directoryArray, array('.', '..'));
echo '<h2>Uložené súbory</h2>
<table class="container" id="table" style="overflow: scroll">
                        <tr>
                            <th id="0" >Názov súboru </th>
                            <th id="1" >Veľkosť </th>
                            <th id="2" >Dátum nahrania </th>
                        </tr>';
                        foreach ($directoryArray as $file){
                            $date = date_create();
                                echo '<tr>
                                    <td>'.
                                    $file
                                    .'</td>
                                    <td>'
                                    . filesize("files/" . $file)  . " Bytes" .
                                    '</td>
                                    <td>'
                                    .
                                    date("F d Y H:i:s.", filemtime("files/". $file))
                                    .'
                                    </td>
                                    </tr>';
                        }
                    echo '</table>';