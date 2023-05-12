<?php

declare(strict_types = 1);

namespace thinh1995\Patterns\Structural\Decorator;

abstract class FlightReservationDecorator implements FlightReservation
{
	protected FlightReservation $flightReservation;

	public function __construct(FlightReservation $flightReservation)
	{
		$this->flightReservation = $flightReservation;
	}
}
