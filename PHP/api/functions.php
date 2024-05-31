<?php
function shorten_url($url) {
    // Generează un cod scurt
    $code = substr(md5(uniqid(rand(), true)), 0, 6);

    // Salvare în baza de date simulată
    $data = json_decode(file_get_contents('database.json'), true);
    $data[$code] = $url;
    file_put_contents('database.json', json_encode($data));

    return $code;
}

function redirect_url($code) {
    // Obține URL-ul original
    $data = json_decode(file_get_contents('database.json'), true);
    $url = isset($data[$code]) ? $data[$code] : '';

    // Redirecționează către URL-ul original
    header("Location: $url");
    exit();
}

function login($username, $password) {
    // Verificare credențiale
    if ($username === 'admin' && $password === 'qweqwe') {
        return 'admin';
    } else {
        return 'invalid';
    }
}

function get_links($user) {
    // Obține toate linkurile pentru utilizator
    $data = json_decode(file_get_contents('database.json'), true);
    $user_links = [];

    foreach ($data as $code => $url) {
        // Filtrare linkuri în funcție de utilizator
        if ($user === 'admin' || strpos($url, "/$user/") !== false) {
            $user_links[$code] = $url;
        }
    }

    return json_encode($user_links);
}
?>
