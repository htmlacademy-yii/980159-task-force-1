<?php
require_once "vendor/autoload.php";

use TaskLoader\GetTaskStatus;

$strategy = new GetTaskStatus();

assert($strategy->checkStatusNew('active') === 'canceled', 'cancel action');
