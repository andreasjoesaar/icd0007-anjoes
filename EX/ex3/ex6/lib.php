<?php
declare(strict_types=1);

function isValidLogin(string $username, string $password): bool
{
    return $username === 'student' && $password === 'web123';
}

function getLoggedInUsername(array $session): string
{
    return (string)($session['username'] ?? '');
}