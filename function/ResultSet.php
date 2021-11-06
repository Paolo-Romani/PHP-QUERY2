<?php
    function stampaAll($rs){
        //leggo una tupla alla volta
        while ($row = $rs->fetch_row()) {
            //stampa i valori letti dalla tupla
            foreach($row as $k=>$v){
                echo "<p>attributo: $k</br>Valore: $v</p>";
            }
        }        
    }
?>