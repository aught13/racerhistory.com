<?php

class Model_User extends \Orm\Model
{

    protected static $_properties = [
        "id"             => [
            "label"     => "Id",
            "data_type" => "int",
        ],
        "username"       => [
            "label"     => "Username",
            "data_type" => "varchar",
        ],
        "password"       => [
            "label"     => "Password",
            "data_type" => "varchar",
        ],
        "group_id"       => [
            "label"     => "Group id",
            "data_type" => "int",
        ],
        "email"          => [
            "label"     => "Email",
            "data_type" => "varchar",
        ],
        "last_login"     => [
            "label"     => "Last login",
            "data_type" => "varchar",
        ],
        "previous_login" => [
            "label"     => "Previous login",
            "data_type" => "varchar",
            "default"   => "0",
        ],
        "login_hash"     => [
            "label"     => "Login hash",
            "data_type" => "varchar",
        ],
        "user_id"        => [
            "label"     => "User id",
            "data_type" => "int",
            "default"   => "0",
        ],
    ];
    protected static $_observers = [];
    protected static $_table_name = 'users';
    protected static $_primary_key = ['id'];
    protected static $_has_many = [];
    protected static $_many_many = [];
    protected static $_has_one = [];
    protected static $_belongs_to = [];
}
