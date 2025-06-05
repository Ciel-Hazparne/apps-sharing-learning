<?php

function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }

    return 'Développeur inconnu';
}

function isValidApp(array $app): bool
{
    if (array_key_exists('is_enabled', $app)) {
        $isEnabled = $app['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

function getApps(array $apps): array
{
    $valid_apps = [];

    foreach ($apps as $app) {
        if (isValidApp($app)) {
            $valid_apps[] = $app;
        }
    }

    return $valid_apps;
}

function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}