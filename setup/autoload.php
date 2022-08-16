<?php

spl_autoload_register(function ($class_name) {
  include getcwd() . '/' . $class_name . '.php';
});