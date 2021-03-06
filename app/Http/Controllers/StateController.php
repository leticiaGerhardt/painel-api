<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class StateController
 * @package App\Http\Controllers
 */
class StateController extends Controller
{
    /**
     * @return State[]|Collection
     */
    public function index()
    {
        return (new State)->newQuery()
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * @param Request $request
     * @return State
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        return $this->save($request, new State);
    }

    /**
     * @param string $id
     * @return State
     */
    public function show($id)
    {
        return $this->findById($id);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return State
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);
        return $this->save($request, $this->findById($id));
    }

    /**
     * @param string $id
     * @return State|Model|null
     */
    protected function findById($id)
    {
        return (new State)->newQuery()->findOrFail($id);
    }

    /**
     * @param Request $request
     * @param State $state
     * @return State
     */
    protected function save(Request $request, State $state)
    {
        $state->fill($request->all())->save();
        return $state;
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function validateRequest(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|string|required|min:3|max:30',
            'code' => 'bail|string|required|size:2',
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
            'message' => sprintf('Estado #%s exclu??do com sucesso.', $id)
        ];
    }
}
