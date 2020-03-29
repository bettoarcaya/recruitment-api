<?php

namespace App\Repositories;
use App\Models\Person;

class RegistrationRepository
{
	public function add( Array $data )
	{
		$person = Person::create($data['Person'][0]);
		$background = $person->backgrounds()->create($data['Background'][0]);
		$work_exp = $person->work_experiences()->create($data['Work-experience'][0]);

		return $person;
	}
}