<?php
    session_start();

    function redirect($location) {
        header('location: ' . URLROOT . '/' . $location);
    }