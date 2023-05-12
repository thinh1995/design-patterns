<?php

declare(strict_types = 1);

namespace thinh1995\Patterns\Structural\Decorator;

class StandardFlightReservation implements FlightReservation
{
	public function calculatePrice(): int
	{
		return 300;
	}
}
