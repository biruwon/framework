<?php

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
  public function indexAction($year)
  {
    if (is_leap_year($year)) {
        return new Response('Yep, this is a leap year!');
    }
    return new Response('Nope, this is not a leap year.');
  }
}

function is_leap_year($year = null) {
	if (null === $year) {
		$year = date('Y');
	}

	return 0 == $year % 400 || (0 == $year % 4 && 0 != $year %100);
}

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
	'year' => null,
	'_controller' => array(new LeapYearController(), 'indexAction'),
)));

return $routes;