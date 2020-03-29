<?php

namespace App\Repositories;
use App\Models\Person;

class RegistrationRepository
{
	public function add( Array $data )
	{
		$person = Person::create($data['Person'][0]);
		$background = $person->backgrounds()->create($data['Background']);
		$work_exp = $person->work_experiences()->create($data['Work-experience']);

		return $person;
	}
}