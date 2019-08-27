<?php
    $srv = 'SEREE-PC17\TMSCSQLEXP1';
    $usr = 'sa';
    $pwd = 'password@1';

    $db = 'pc_webapp';
    $conn = new PDO("sqlsrv:server=$srv; Database=$db", $usr, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db2 = 'web_training';
    $conn2 = new PDO("sqlsrv:server=$srv; Database=$db2", $usr, $pwd);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>