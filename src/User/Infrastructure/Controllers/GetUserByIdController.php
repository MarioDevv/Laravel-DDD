<?php

namespace Src\User\Infrastructure\Controllers;

use App\Models\SimpleUser;
use Illuminate\Http\Request;
use Src\User\Application\GetUserByIdUseCase;
use Src\User\Infrastructure\Repository\UserRepository;

class GetUserByIdController extends \App\Http\Controllers\Controller
{

    private GetUserByIdUseCase $getUserByIdUseCase;

    public function __construct()
    {
        $this->getUserByIdUseCase = new GetUserByIdUseCase(new UserRepository(new SimpleUser()));
    }


    public function __invoke(Request $request)
    {

        try {

            $id = $request->id;
    
            $user = $this->getUserByIdUseCase->__invoke($id);
    
            return response()->json($user->toArray());

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }


    }


}
