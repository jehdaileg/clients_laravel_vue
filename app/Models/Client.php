<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'nationalite', 'email', 'entreprise'];

    public function getNationaliteOptions()
    {

    	return [

    		'congolaise' => 'Congolaise',

    		'burundaise' => 'Burundaise',

    		'francaise' => 'Française',

    		'americaine' => 'Américaine',

    		'angolaise' => 'Angolaise',

    		'rwandaise' => 'Rwandaise',

    		'ougandaise' => 'Ougandaise',

    		'kenyanne' => 'Kenyanne'

    	];
    }

 	public function getNationaliteAttributes($attributes)

 	{

 		return [

    		'congolaise' => 'Congolaise',

    		'burundaise' => 'Burundaise',

    		'francaise' => 'Française',

    		'americaine' => 'Américaine',

    		'angolaise' => 'Angolaise',

    		'rwandaise' => 'Rwandaise',

    		'ougandaise' => 'Ougandaise',

    		'kenyanne' => 'Kenyanne'

    	][$attributes];


 	}


}
