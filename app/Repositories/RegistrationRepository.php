<?php

namespace App\Repositories;

use App\Models\Person;
use Illuminate\Support\Collection;

class RegistrationRepository
{
	public function add( Array $data ) : Array
	{
		$person = Person::create($data['Person'][0]);
		$background = $person->backgrounds()->createMany($data['Background']);
		$work_exp = $person->work_experiences()->createMany($data['Work-experience']);

		return compact('person', 'background', 'work_exp');
	}

	public function getAll() : Collection
	{
		return Person::with(['backgrounds', 'work_experiences'])->get();
	}
}