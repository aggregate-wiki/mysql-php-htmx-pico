<?php

require_once 'utils.php';

$page = build_page();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    add_user(text_encode($_POST['name']));
}
$page['users'] = get_users();

html_template('register', $page);
