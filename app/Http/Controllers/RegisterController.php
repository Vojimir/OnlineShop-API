<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Manager;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(RegisterRequest $request)
    {

        $manager = Manager::create([
            
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            
        ]);
        //drugi nacin u slucaju da se menager_id ne pojavljuje u users tabeli
        // $user = User::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'manager_id' => $manager->id
        // ]);
        // return $user;

        $user = User::create(array_merge($request->
        except('photo', 'password','password_confirmation','checked'),
        ['manager_id' => $manager->id, 'password' =>
         bcrypt($request->password)]));
        return $user;

    }
    

}
