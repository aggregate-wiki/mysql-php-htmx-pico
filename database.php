<?php

function get_users()
{
    return array_column(database_table('select name from users order by id'), 'name');
}

function add_user($name)
{
    return database_query("insert into users (name) values ('$name')");
}
