<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function insertRecord()
    {
        $phone = new Phone();
        $phone->phone = '081267890';
        $user = new User();
        $user->name = 'Jenifer';
        $user->email = 'jenifer@gmail.com';
        $user->password = encrypt('secret');
        $user->save();
        $user->phone()->save($phone);
        return 'record has been created';
    }

    function fetchPhoneUser($id)
    {
        $phone = User::find($id)->phone;
        return $phone;
    }
}
