<?php

declare(strict_types = 1);

namespace tests\Structural\Structural\Decorator;

use PHPUnit\Framework\TestCase;
use thinh1995\Patterns\Structural\Decorator\ExtraLegroom;
use thinh1995\Patterns\Structural\Decorator\HoldLuggare;
use thinh1995\Patterns\Structural\Decorator\StandardFlightReservation;

class FlightReservationTest extends TestCase
{
	public function test_a_flight_reservation_can_be_decorated()
	{
		$reservation = new StandardFlightReservation();
		$reservation = new ExtraLegroom($reservation);
		$reservation = new HoldLuggare($reservation);

		$this->assertEquals(400, $reservation->calculatePrice());
	}
}
