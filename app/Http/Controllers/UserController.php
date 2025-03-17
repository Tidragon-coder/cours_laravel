<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'username'=> 'required|string|max:255|unique:users',
            'email'=>'required|email|unique:users',
            'password'=> 'required|string|min:4',
        ]);

        $user = User::create([
            'username'=> $request -> username,
            'email'=> $request -> email,
            'password'=> bcrypt($request -> password),
            'bio'=> $request -> bio,
            'profile_picture'=> $request -> profile_picture,

        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'=> 'User created successfully',
            'user'=> $user,
            'token'=> $token
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json($request->user(), 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
 
            $validatedData = $request->validate([
                'username' => 'string|max:255|unique:users,username,' . $user->id,
                'email' => 'email|unique:users,email,' . $user->id,
                'password' => 'string|min:4',
            ]);
 
            if($request->filled('password')) {
                $validatedData['password'] = bcrypt($request->password);
            }
            if (!empty($validatedData)) {
                $user->update($validatedData);
            }
            $user->refresh();
            return response()->json(['message' => 'User updated', 'user' => $user], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating user : '. $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['message'=> 'User deleted', 200]);
    }

    public function login(Request $request)
    {
        try {
            
 
            $validatedData = $request->validate([
                'email' => 'string|max:255' ,
                'password' => 'string|min:4',
            ]);
 
            $user = User::where('email', $validatedData['email'])
            ->first();

            if ($user && password_verify($validatedData['password'], $user->password)) {
                // Générer un token ou une session pour l'utilisateur (optionnel)
                // Par exemple, utiliser Laravel Sanctum ou Passport pour les tokens JWT
                
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'message'=> 'Login successfully',
                    'user'=> $user,
                    'token'=> $token
                ],201);;
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } 
        catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        } 

        catch (\Exception $e) {
            return response()->json(['message' => 'Error creating user : '. $e->getMessage()], 500);
        }
    }



        public function logout(Request $request) {
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logout successfully'], 200);
        }

}