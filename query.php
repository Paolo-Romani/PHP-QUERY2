<?php
    include_once __DIR__ .'/config/confing.php';
    include_once __DIR__ .'/function/ConnDB.php';
    include_once __DIR__ .'/function/ResultSet.php';

    echo"
        <h3>Scrivi una query</h3>
        <form action='' method='post'>
            Query</br></br><input type='text' name='query' size='50'></br></br>
            <input type='submit' value='ESEGUI'></br>
        </forn>
    ";

    if(!empty($_POST['query'])){
        echo "<p style='color:blue; font-style:italic'>". $_POST['query']."<p>";
        $conn = connectDB($db["url"],$db["username"],$db["password"],$db["dbname"]);
        if ($conn->connect_error) {
            /* error_log('Connection error: ' . $conn->connect_error); */
            echo 'Connection error: ' . $conn->connect_error;
        }else{   
            $rs = $conn->query($_POST['query']);
            echo "rs tipo ".gettype($rs)."</br>";
            switch(gettype($rs)){
                case "boolean":
                    echo "operazione riuscita</br>"; 
                    break;
                case "object":
                    echo "Numero righe selezionate: " . $rs -> num_rows."</br>";
                    //stampo il risultato della query
                    stampaAll($rs);
                    // cancella il result set (rs)
                    $rs -> free_result();                        
                    break;
                case "String":
                    echo "rs</br>";
            }
            $conn->close();
        }     
    }   

?>