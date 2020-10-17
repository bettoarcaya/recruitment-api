<?php

namespace App\Repositories;

use App\Http\Resources\PersonCollection;
use App\Models\Person;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RegistrationRepository
{
	public function add( array $data ) : array
	{
		$person = Person::create($data['person']);
		$background = $person->backgrounds()->createMany($data['background']);
		$work_exp = $person->work_experiences()->createMany($data['work_experience']);
		$address = $person->address()->create($data['address']);

		return compact(
			'person', 
			'background', 
			'work_exp', 
			'address'
		);
	}

	public function getAll() : PersonCollection
	{
		$people = Person::with([
            'backgrounds',
			'work_experiences',
			'address'
        ])->paginate(10);

        return new PersonCollection($people);
	}

	public function getByWorkCatg( array $rules )
    {
        return Person::with([
			'backgrounds', 
			'work_experiences', 
			'address'
		])
        ->whereIn('work_exp_catg', $rules)
        ->whereExperience();

	}
	
	public function getCandidates(array $data)
	{
		$response = Person::with([
			'backgrounds', 
			'work_experiences', 
			'address'
		])
		->whereIn('work_exp_catg', $data['position'])
		//->where('work_type_available', $data['work_type_available'])
		->whereExperienceBy($data['experience_years']);


		return $response;
	}
}
