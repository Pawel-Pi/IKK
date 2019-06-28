<?php
//test
    function redirect($location) {
        header('location: ' . URLROOT . '/' . $location);
    }