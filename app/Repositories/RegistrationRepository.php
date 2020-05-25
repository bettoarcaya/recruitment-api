<?php

namespace App\Repositories;

use App\Models\Person;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RegistrationRepository
{
	public function add( array $data ) : array
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

	public function getByWorkCatg( array $rules )
    {
        return Person::with(['backgrounds', 'work_experiences'])
            ->whereIn('work_exp_catg', $rules)
            ->whereExperience();

    }
}
