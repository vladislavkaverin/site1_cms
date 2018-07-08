<!doctype html>
<html lang="en">
<head>
    <?=$this->getMeta();?>
</head>
<body>

<h1>Шаблон DEFAULT default.php</h1>

<?=$content;?>

<?php
    $logs = \R::getDatabaseAdapter()->getDatabase()->getLogger();
    debug($logs->grep('SELECT'));
?>


</body>
</html>