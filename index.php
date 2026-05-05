<?php
require_once "core/init.php";

echo Config::getValue('mysql/host');

 DB::getInstance()->query("SELECT username from user WHERE username = ?", array('abadat'));