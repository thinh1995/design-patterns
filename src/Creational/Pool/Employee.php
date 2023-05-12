<?php

declare(strict_types = 1);

namespace thinh1995\Patterns\Creational\Pool;

class Employee
{
	public function __construct(
		private int $id,
		private string $firstname,
		private string $lastname
	) {
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getFirstname(): string
	{
		return $this->firstname;
	}

	public function getLastname(): string
	{
		return $this->lastname;
	}
}
