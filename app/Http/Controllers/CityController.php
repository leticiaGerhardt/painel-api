<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class CityController
 * @package App\Http\Controllers
 */
class CityController extends Controller
{
    /**
     * @param Request $request
     * @return City[]|Collection
     */
    public function index(Request $request)
    {
        $query = (new City)->newQuery()
            ->with(['state']);
        $stateId = (int)$request->get('state_id');
        if ($stateId) {
            $query->where('state_id', '=', $stateId);
        }
        return $query->orderBy('name', 'asc')
            ->get();
    }

    /**
     * @param Request $request
     * @return City
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        return $this->save($request, new City);
    }

    /**
     * @param string $id
     * @return City
     */
    public function show($id)
    {
        return $this->findById($id);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return City
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);
        return $this->save($request, $this->findById($id));
    }

    /**
     * @param string $id
     * @return City|Model|null
     */
    protected function findById($id)
    {
        return (new City)->newQuery()->findOrFail($id);
    }

    /**
     * @param Request $request
     * @param City $state
     * @return City
     */
    protected function save(Request $request, City $city)
    {
        $city->fill($request->all())->save();
        return $city;
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function validateRequest(Request $request)
    {
        $this->validate($request, [
            'name'      => 'bail|string|required|min:3|max:100',
            'state_id'  => 'bail|integer|required',
        ]);
    }

    /**
     * @param string $id
     * @return array
     */
    public function delete($id)
    {
        $model = $this->findById($id);
        $model->delete();
        return [
            'message' => sprintf('Cidade #%s excluída com sucesso.', $id)
        ];
    }
}
