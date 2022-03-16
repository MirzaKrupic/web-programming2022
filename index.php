<?php
require_once("rest/dao/TodoDao.class.php");
$dao = new ToDoDao();

$result = $dao->get_all();
print_r($result);
?>
