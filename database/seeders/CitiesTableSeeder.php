<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class CitiesTableSeeder
 * @package Database\Seeders
 */
class CitiesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $exists = (new City)->newQuery()->exists();
        if ($exists) {
            return;
        }
        $collection = [
            ['name' => 'Foz do Iguaçu', 'state' => 'PR'],
            ['name' => 'Cascavel', 'state' => 'PR'],
            ['name' => 'Curitiba', 'state' => 'PR'],
            ['name' => 'Itapema', 'state' => 'SC'],
            ['name' => 'Balneário Camboriú', 'state' => 'SC'],
            ['name' => 'Florianópolis', 'state' => 'SC'],
            ['name' => 'Porto Alegre', 'state' => 'RS'],
            ['name' => 'Caxias', 'state' => 'RS'],
            ['name' => 'Gramado', 'state' => 'RS'],
        ];
        foreach ($collection as $item){
            $this->save($item);
        }
    }

    /**
     * @param array $options
     * @return City|Model
     */
    protected function save(array $options)
    {
        $state = (new State)
            ->newQuery()
            ->where('code', '=', $options['state'])
            ->firstOrFail();

        $options['state_id'] = $state->getKey();

        $model = (new City)
            ->newQuery()
            ->where('state_id', '=', $options['state_id'])
            ->where('name', '=', $options['name'])
            ->first();
        if ($model) {
            return $model;
        }
        $model = new City($options);
        $model->save();
        return $model;
    }
}
