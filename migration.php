<?php 
require_once('./DB/DBMS.php');
class DeleteOnExit
{
    function __destruct()
    { 
        unlink(__FILE__);
    }
}
$db = new dbms();
$db->create_db();
$db->connect();
$db->create_table();
$db->close();
$g_delete_on_exit = new DeleteOnExit();
?>