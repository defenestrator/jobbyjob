<?php

namespace Database\Factories;

use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResumeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resume::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $team = \App\Models\Team::factory()->create();
        $user = \App\Models\User::find($team->user_id);
        $schema = json_decode($this->jsonString);
        $schema->basics->name = $user->name;
        $schema->basics->picture = $user->profile_photo_path;


        return [
            'user_id' => $team->user_id,
            'active' => $this->faker->boolean,
            'stack_overflow' => $this->faker->word,
            'cv' => json_encode($schema),
            'phone' => $this->faker->phoneNumber,
            'github' => $this->faker->word,
            'linked_in' => $this->faker->word,
        ];
    }

    protected function generateCVJson()
    {

        return json_encode($schema);
    }

    protected $jsonString = '{
        "basics": {
          "name": "John Doe",
          "label": "Programmer",
          "picture": "",
          "email": "john@gmail.com",
          "phone": "(912) 555-4321",
          "website": "http://johndoe.com",
          "summary": "A summary of John Doe...",
          "location": {
            "address": "2712 Broadway St",
            "postalCode": "CA 94115",
            "city": "San Francisco",
            "countryCode": "US",
            "region": "California"
          },
          "profiles": [{
            "network": "Twitter",
            "username": "john",
            "url": "http://twitter.com/john"
          }]
        },
        "work": [{
          "company": "Company",
          "position": "President",
          "website": "http://company.com",
          "startDate": "2013-01-01",
          "endDate": "2014-01-01",
          "summary": "Description...",
          "highlights": [
            "Started the company"
          ]
        }],
        "volunteer": [{
          "organization": "Organization",
          "position": "Volunteer",
          "website": "http://organization.org/",
          "startDate": "2012-01-01",
          "endDate": "2013-01-01",
          "summary": "Description...",
          "highlights": [
            "Awarded \'Volunteer of the Month\'"
          ]
        }],
        "education": [{
          "institution": "University",
          "area": "Software Development",
          "studyType": "Bachelor",
          "startDate": "2011-01-01",
          "endDate": "2013-01-01",
          "gpa": "4.0",
          "courses": [
            "DB1101 - Basic SQL"
          ]
        }],
        "awards": [{
          "title": "Award",
          "date": "2014-11-01",
          "awarder": "Company",
          "summary": "There is no spoon."
        }],
        "publications": [{
          "name": "Publication",
          "publisher": "Company",
          "releaseDate": "2014-10-01",
          "website": "http://publication.com",
          "summary": "Description..."
        }],
        "skills": [{
          "name": "Web Development",
          "level": "Master",
          "keywords": [
            "HTML",
            "CSS",
            "Javascript"
          ]
        }],
        "languages": [{
          "language": "English",
          "fluency": "Native speaker"
        }],
        "interests": [{
          "name": "Wildlife",
          "keywords": [
            "Ferrets",
            "Unicorns"
          ]
        }],
        "references": [{
          "name": "Brer Rabbit",
          "reference": "Reference..."
        }]
      }';
}
