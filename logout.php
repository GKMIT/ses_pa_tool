<?php
session_start();
require_once('config.php');
session_destroy();
header("location:$_config[base_url]");
?>