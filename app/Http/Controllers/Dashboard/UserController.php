<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\CreateOrUpdateUserRequest;
use App\Actions\Dashboard\SaveUserAction;
use App\Models\User;
use App\Models\Role;
use App\Http\Transformers\UserTransformer;
use Inertia\Inertia;


class UserController extends Controller
{
    public function index()
    {
       $users = User::paginate(30);
       $userData = fractal($users, new UserTransformer())->toArray();
       return Inertia::render('Dashboard/User/Index')->with([
            'users' => $userData
        ]);
       
    }

    public function edit(User $user)
    {      
        $userData = fractal($user, new UserTransformer())->toArray();
        $roles = Role::all()->toArray();
        return Inertia::render('Dashboard/User/Edit')->with([
            'user' => $userData,
            'roles' => $roles,
        ]);
    }

    public function update(CreateOrUpdateUserRequest $request, User $user, SaveUserAction $action)
    {
        $action->execute($user, $request->validated());  
        return redirect()->route('dashboard.users.index')->with('success', 'user updated.');     
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index')->with('success', 'user deleted');
    }
}
