<?php

declare(strict_types = 1);

namespace thinh1995\Patterns\Creational\Pool;

class EmployeePool
{
	private array $busyEmployees = [];
	private array $availableEmployees = [];
	private array $firstnames = ['John', 'Johana', 'Milan', 'Milana',];
	private array $lastnames = ['Doe', 'Latinovic', 'Nickelson',];

	public function getEmployee(): Employee
	{
		if (0 === count($this->availableEmployees)) {
			$id        = count($this->busyEmployees) + 1;
			$firstname = $this->firstnames[array_rand($this->firstnames)];
			$lastname  = $this->lastnames[array_rand($this->lastnames)];
			$employee  = new Employee($id, $firstname, $lastname);
		} else {
			$employee = array_pop($this->availableEmployees);
		}

		$this->busyEmployees[$employee->getId()] = $employee;

		return $employee;
	}

	public function release(Employee $employee): void
	{
		$id = $employee->getId();

		if (isset($this->busyEmployees[$id])) {
			unset($this->busyEmployees[$id]);
			$this->availableEmployees[$id] = $employee;
		}
	}

	public function getPoolStatus(): array
	{
		$numberOfAvailableEmployees = count($this->availableEmployees);
		$numberOfBusyEmployees      = count($this->busyEmployees);

		return ['free' => $numberOfAvailableEmployees, 'busy' => $numberOfBusyEmployees];
	}
}
