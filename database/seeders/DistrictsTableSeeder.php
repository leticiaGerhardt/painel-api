<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DistrictsTableSeeder
 * @package Database\Seeders
 */
class DistrictsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $exists = (new District)->newQuery()->exists();
        if ($exists) {
            return;
        }
        $collection = [
            ['name' => 'Centro', 'city' => 'Foz do Iguaçu'],
            ['name' => 'Centro', 'city' => 'Cascavel'],
            ['name' => 'Centro', 'city' => 'Curitiba'],
            ['name' => 'Centro', 'city' => 'Itapema'],
            ['name' => 'Meia Praia', 'city' => 'Itapema'],
            ['name' => 'Centro', 'city' => 'Balneário Camboriú'],
            ['name' => 'Centro', 'city' => 'Florianópolis'],
            ['name' => 'Centro', 'city' => 'Porto Alegre'],
            ['name' => 'Centro', 'city' => 'Caxias'],
            ['name' => 'Centro', 'city' => 'Gramado'],
        ];
        foreach ($collection as $item){
            $this->save($item);
        }
    }

    /**
     * @param array $options
     * @return District|Model
     */
    protected function save(array $options)
    {
        $city = (new City)
            ->newQuery()
            ->where('name', '=', $options['city'])
            ->firstOrFail();

        $options['city_id'] = $city->getKey();

        $model = (new District)
            ->newQuery()
            ->where('city_id', '=', $options['city_id'])
            ->where('name', '=', $options['name'])
            ->first();
        if ($model) {
            return $model;
        }
        $model = new District($options);
        $model->save();
        return $model;
    }
}
