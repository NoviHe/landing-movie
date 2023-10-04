<?php

function navItem($link, $title)
{
    global $url;
    $class = ($link == $url) ? "active" : "";

    $render = '<li class="nav-item">';
    $render .= "<a class='nav-link $class' href='" . URL_WEBSITE . "/$link'>$title</a>";
    $render .= '</li>';
    return $render;
}
