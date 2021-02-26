<?php
$value = $_POST['val'];
$path = getcwd().'/files'.$value;
$directoryArray = scandir($path, 1);
$directoryArray = array_diff($directoryArray, array('.', '..'));
echo '<h2>Uložené súbory <img class="step-back" src="icons/step_back.png"></h2> 
<div class="legend-title">Legenda:</div>
<div class="box green"></div>
<span class="legend">&nbsp;&nbsp;Priečinok</span> 
 <br> 
 <div class="box red"></div>
<span class="legend">&nbsp;&nbsp;Súbor</span>
<table class="container" id="table" style="overflow: scroll">
                        <tr>
                            <th id="0" onclick="sortTable(0,0)" >Názov súboru </th>
                            <th id="1" onclick="sortTable(1,1)">Veľkosť </th>
                            <th id="2" onclick="sortTable(2,0)">Dátum nahrania </th>
                        </tr>';
                        foreach ($directoryArray as $file){
                            $date = date_create();
                                echo '<tr>'.
                                        isDirectory($file,$path)
                                    .'<td>'
                                    .  filesize(pathToFileForInfo($file,$value) ). " Bytes" .
                                    '</td>
                                    <td>'
                                    .
                                    date("F d Y H:i:s.", filemtime(pathToFileForInfo($file,$value)))
                                    .'
                                    </td>
                                    </tr>';
                        }
                    echo '</table>';
                        function isDirectory($file,$path){
                            if(is_dir($path.'/'.$file)) {
                                return'<td class="pointer"  >'. $file .'</td>';
                            }
                            return'<td>'. $file .'</td>';
                        }
                        function pathToFileForInfo($file,$value){
                            if($value === ''){
                                 return ("files/" . $file);
                            }
                            return ("files" . $value . '/'. $file);
                        }
