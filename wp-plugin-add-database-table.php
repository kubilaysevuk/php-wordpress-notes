<?php
/* Plugin Name: Ürün Ekleme Eklentisi
Theme URI: urün-ekleme-plugin
Author: 
Author URI: 
Description: 
Version: 1.0 */  


global $mydb;
$mydb = new wpdb('root','','barbaroswp','localhost');
$rows = $mydb->get_results("SELECT * FROM odemeler");

foreach ($rows as $row) :
$odedimi= $row->Durum;
    if ($odedimi == 1) {
    $Durum="odendi";
    }
    if ($odedimi == 0){
    $Durum="odenmedi";
    }
    echo "<div>". " id: " . $row->id. " - Name: " . $row->Ad.  " TC: " . $row->Soyad. " Durum: " .$Durum.  "<br></div>";
endforeach;  
