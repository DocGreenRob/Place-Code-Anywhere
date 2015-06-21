<?php

if (!$_SERVER['QUERY_STRING']) die();

require_once 'aca_table_load.php';

require_once 'aca_table_func.php';

require_once aca_table_func::wp_load();

if (!check_admin_referer('aca_table_get','wp_nonce')) wp_die('Security check failed');

require_once dirname(dirname(__FILE__)).'/any-code-anywhere.php';

any_code_anywhere::load_language();

$action = $_GET['action'];

$object = isset($_GET['object']) ? $_GET['object'] : '';

eval($action.'::action(any_code_anywhere::ID, $object);');

if ($_SERVER['HTTP_REFERER']) header('Location: '.$_SERVER['HTTP_REFERER']);

