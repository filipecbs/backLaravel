<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->state = $request->state;
        $user->seller = $request->seller;
        $user->save();

        return response()->json([$user]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUser()
    {
        return User::All();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        $user = User::find($id);

        if($user){
            return response()->success($user);
        }else{
            $data = "Usuário não encontrado, verifique o id novamente";
            return response()->error($data, 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if($request->name)
            $user->name = $request->name;
        if($request->email)
            $user->email = $request->email;
        if($request->password)
            $user->password = $request->password;
        if($request->state)
            $user->state = $request->state;
        if($request->seller)
            $user->seller = $request->seller;
        $user->save();

        return response()->json([$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        return response()->json(['Usuário deletado']);
    }

    public function userProducts($id) {

        $user = User::with('products')->find($id);
        return $user;
    }
}
