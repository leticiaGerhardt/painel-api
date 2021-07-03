<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class DistrictController
 * @package App\Http\Controllers
 */
class DistrictController extends Controller
{
    /**
     * @param Request $request
     * @return District[]|Collection
     */
    public function index(Request $request)
    {
        $query = (new District)->newQuery()
            ->with(['city']);
        $districtId = (int)$request->get('city_id');
        if ($districtId) {
            $query->where('city_id', '=', $districtId);
        }
        return $query->orderBy('name', 'asc')
            ->get();
    }

    /**
     * @param Request $request
     * @return District
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        return $this->save($request, new District);
    }

    /**
     * @param string $id
     * @return District
     */
    public function show($id)
    {
        return $this->findById($id);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return District
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);
        return $this->save($request, $this->findById($id));
    }

    /**
     * @param string $id
     * @return District|Model|null
     */
    protected function findById($id)
    {
        return (new District)->newQuery()->findOrFail($id);
    }

    /**
     * @param Request $request
     * @param District $state
     * @return District
     */
    protected function save(Request $request, District $district)
    {
        $district->fill($request->all())->save();
        return $district;
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function validateRequest(Request $request)
    {
        $this->validate($request, [
            'name'      => 'bail|string|required|min:3|max:100',
            'city_id'   => 'bail|integer|required',
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
            'message' => sprintf('Bairro #%s excluído com sucesso.', $id)
        ];
    }
}
