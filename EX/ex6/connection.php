<?php

const DB_USERNAME = 'username';
const DB_PASSWORD = 'secret';
const DB_NAME     = 'dbname';
const DB_HOST     = 'localhost';
const DB_PORT     = 'port';

const DB_DSN = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';

function getConnection(): PDO
{
    return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}