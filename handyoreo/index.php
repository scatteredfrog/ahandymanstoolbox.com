<?php
    setcookie("hmoreo","flirzelkwerp",time()+3600*24*30, '/');
    function Redirect($url, $permanent = false) {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }

    $url = 'ahandymanstoolbox.com';
    $relo = stristr($_SERVER['HTTP_HOST'], 'local.') ? 'http://local.' . $url : 'http://www.' . $url;
    Redirect($relo, false);