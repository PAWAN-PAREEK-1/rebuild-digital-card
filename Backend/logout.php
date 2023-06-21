<?php
session_start();
session_destroy();
header('Location: ../FrontEnd/tamplate.php');
exit;


?>