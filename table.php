<?php
$value = $_POST['val'];
$path = getcwd().'/files'.$value;
$directoryArray = scandir($path, 1);
$directoryArray = array_diff($directoryArray, array('.', '..'));
echo '<h2>Uložené súbory <img class="step-back" alt="step-back" src="icons/step_back.png"></h2> 
<div class="legend-title">Legenda:</div>
<div class="box green"></div>
<span class="legend">&nbsp;&nbsp;Priečinok</span> 
<br> 
 <div class="box red"></div>
<span class="legend">&nbsp;&nbsp;Súbor</span>
<div>Súčasná pozícia: '.$value.'</div>
<table class="container" id="table" style="overflow: scroll">
                        <tr>
                            <th id="0" onclick="sortTable(0,0)" >Názov súboru </th>
                            <th id="1" onclick="sortTable(1,1)">Veľkosť </th>
                            <th id="2" onclick="sortTable(2,0)">Dátum nahrania </th>
                        </tr>';
                        foreach ($directoryArray as $file){
                            $date = date_create();
                                echo '<tr>'.
                                        isDirectory($file,$path,$value)
                                    .'<td>'
                                    .  isDirectory2($file,$path,$value) .
                                    '</td>
                                    <td>'
                                    .
                                    isDirectory3($file,$path,$value)
                                    .'
                                    </td>
                                    </tr>';
                        }
                    echo '</table>';
                        function isDirectory($file,$path,$value){
                            if(is_dir($path.'/'.$file)) {
                                return'<td class="pointer"  ><span class="pointer-directory">' .$file.'</span></td>';
                            }
                            return'<td class="pointer_file">'. '<a class="link"  target="_blank" href="https://wt130.fei.stuba.sk/cvicenia/cvicenie1/files'.$value.'/'.$file.'">'.$file.'</a>'.'</td>';
                        }
                        function isDirectory2($file,$path,$value){
                            if(is_dir($path.'/'.$file)){
                                return "";
                            }
                            else{
                                return filesize(pathToFileForInfo($file,$value) ). " Bytes";
                            }
                        }
                        function isDirectory3($file,$path,$value){
                            if(is_dir($path.'/'.$file)){
                                return "";
                            }
                            else{
                                return date("F d Y H:i:s.", filemtime(pathToFileForInfo($file,$value)));
                            }
                        }

                        function pathToFileForInfo($file,$value){
                            if($value === ''){
                                 return ("files/" . $file);
                            }
                            return ("files" . $value . '/'. $file);
                        }

