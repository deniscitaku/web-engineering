<?php

function root_redirect($page) {
    header("Location: ".$page);
    exit();
}

function redirect($page) {
    header("Location: /web-engineering/final-project-zoo/src/views/pages/".$page);
    exit();
}

function get_url($page) {
    return '/web-engineering/final-project-zoo/src/views/pages/'.$page;
}