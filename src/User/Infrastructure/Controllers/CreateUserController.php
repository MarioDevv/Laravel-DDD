<?php

namespace Src\User\Infrastructure\Controllers;

use Src\User\Domain\User;
use App\Models\SimpleUser;
use Illuminate\Http\Request;
use Src\User\Application\CreateUserUseCase;
use Src\User\Infrastructure\Repository\UserRepository;
use Src\User\Domain\ValueObjects\Email;
use Src\User\Domain\ValueObjects\Name;

class CreateUserController extends \App\Http\Controllers\Controller
{


    public function __construct(private CreateUserUseCase $createUserUseCase)
    {
        $this->createUserUseCase = new CreateUserUseCase(new UserRepository(new SimpleUser()));
    }


    public function __invoke(Request $request)
    {

        try {
            
            $name = $request->name;
            $email = $request->email;
            
            $user = new User(new Name($name), new Email($email));
    
            $this->createUserUseCase->__invoke($user);
    
            return response()->json('User created successfully');
        
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

    }


}
