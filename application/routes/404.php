<?php

use Joelvardy\Template;

$routes->notFound(function () {

	echo Template::build('404');

});