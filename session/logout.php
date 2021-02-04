<?php
    session_start();
    unset($_SESSION);
    session_destroy();
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
    header('Location: ../login.php?logout');

?>