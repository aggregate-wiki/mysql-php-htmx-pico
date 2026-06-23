<?php

function flash_data()
{
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

function csrf_token()
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = md5(rand(0, 1e9) * time());
    }
    return $_SESSION['csrf'];
}

function number_cast($number, $min = 0, $max = 0)
{
    $number = intval($number);
    if ($max > $min) {
        $number = min($number, $max);
    }
    return max($number, $min);
}

function text_encode($text, $length = 0)
{
    $text = htmlspecialchars(trim($text), ENT_QUOTES);
    if ($length > 0) {
        $text = substr($text, 0, $length);
    }
    return $text;
}

function database_handle()
{
    return pg_connect(getenv('DATABASE_URL'));
}

function database_query($query)
{
    return pg_query(database_handle(), $query);
}

function database_scalar($query)
{
    return pg_fetch_array(database_query($query))[0];
}

function database_row($query)
{
    return pg_fetch_assoc(database_query($query));
}

function database_table($query)
{
    return pg_fetch_all(database_query($query));
}

function html_template($view, $data = [], $template = 'base')
{
    extract($data);
    require_once 'templates' . DIRECTORY_SEPARATOR . $template . '.php';
}

function http_redirect($url, $flash = null)
{
    $_SESSION['flash'] = $flash;
    header('Location: ' . $url);
    exit;
}
