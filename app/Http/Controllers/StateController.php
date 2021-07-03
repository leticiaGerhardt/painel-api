<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Database\Eloquent\Collection;
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
        return (new State)->newQuery()->get();
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
     * @param State $state
     * @return State
     */
    public function show(State $state)
    {
        return $state;
    }

    /**
     * @param Request $request
     * @param State $state
     * @return State
     * @throws ValidationException
     */
    public function update(Request $request, State $state)
    {
        $this->validateRequest($request);
        return $this->save($request, $state);
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
            'code' => 'bail|string|required|lenght:2',
        ]);
    }

    /**
     * @param State $state
     * @return array
     */
    public function delete(State $state)
    {
        $id = $state->getKey();
        $state->delete();
        return [
            'message' => sprintf('Estado #%s excluído com sucesso.', $id)
        ];
    }
}
