<?php

$routes->notFound(function () {

	require(VIEWS_PATH.'/404.php');

});