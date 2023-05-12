<?php

declare(strict_types = 1);

namespace thinh1995\Patterns\Structural\Decorator;

class HoldLuggare extends FlightReservationDecorator implements FlightReservation
{
	private const PRICE = 60;

	public function calculatePrice(): int
	{
		return $this->flightReservation->calculatePrice() + self::PRICE;
	}
}
