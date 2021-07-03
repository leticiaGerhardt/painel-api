<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class StatesTableSeeder
 * @package Database\Seeders
 */
class StatesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $exists = (new State)->newQuery()->exists();
        if ($exists) {
            return;
        }
        $collection = [
            ['name' => 'Paraná', 'code' => 'PR'],
            ['name' => 'Santa Catarina', 'code' => 'SC'],
            ['name' => 'Rio Grande do Sul', 'code' => 'RS'],
        ];
        foreach ($collection as $item){
            $this->save($item);
        }
    }

    /**
     * @param array $options
     * @return State|Model
     */
    protected function save(array $options)
    {
        $model = (new State)
            ->newQuery()
            ->where('code', '=', $options['code'])
            ->first();
        if ($model) {
            return $model;
        }
        $model = new State($options);
        $model->save();
        return $model;
    }
}
