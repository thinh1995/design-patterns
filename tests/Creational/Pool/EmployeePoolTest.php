<?php

declare(strict_types = 1);

namespace Tests\Creational\Pool;

use PHPUnit\Framework\TestCase;
use thinh1995\Patterns\Creational\Pool\Employee;
use thinh1995\Patterns\Creational\Pool\EmployeePool;

class EmployeePoolTest extends TestCase
{
	public function test_employee_pool()
	{
		$pool      = new EmployeePool();
		$employee1 = $pool->getEmployee();
		$result    = $pool->getPoolStatus();

		$this->assertInstanceOf(Employee::class, $employee1);
		$this->assertEquals(1, $result['busy']);
		$this->assertEquals(0, $result['free']);

		$employee2 = $pool->getEmployee();
		$result    = $pool->getPoolStatus();

		$this->assertNotSame($employee1, $employee2);
		$this->assertEquals(2, $result['busy']);
		$this->assertEquals(0, $result['free']);

		$pool->release($employee1);
		$result = $pool->getPoolStatus();

		$this->assertEquals(1, $result['busy']);
		$this->assertEquals(1, $result['free']);
	}
}
