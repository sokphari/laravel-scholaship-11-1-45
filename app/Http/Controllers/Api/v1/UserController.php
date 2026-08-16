<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        //cache() tempolary
        $users = User::query()->where('status','active')->paginate(6);
        return response()->json([
            'message' => 'Fetch users successfully',
            'status'  => true,
            'data'    => $users
        ],200);
    }
    public function store(Request $request){
        try{
            $validated = $request->validate([
                'name' => ['required','string','max:255'],
                'email'=> ['required','email','unique:users,email'],
                'password' => ['required','string','min:6'],
                'role'  => ['string',Rule::in(['admin','hr','employee'])],
                'status' => ['string',Rule::in(['active','inactive'])]
            ]);

            $validated['password'] = Hash::make($request['password']);

            $user = User::create($validated);
            
            return response()->json([
                'message' => 'Created user successfully',
                'status'  => true,
                'data'    => $user
            ],201); // create success

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Created user not found',
                'status'  => false,
                'data'    => null
            ],500);
        }
    }
    public function show($user){
        try{
            $userId = User::find($user);

            // if(!$userId){
                return response()->json([
                    'message' => 'user found',
                    'status' => true,
                    'data'  => $userId
                ],200);
            // }
        }catch(\Exception $e){
            return response()->json([
                'message' => 'show not found',
                'status'  => false,
                'date'    => null
            ],500);
        }
    }
    public function destroy($user){
        try{
            $userId = User::find($user);
            if(!$userId){
                return response()->json([
                    'message'=>'messing agurment required',
                    'status' => false,
                    'date'   => null
                ],400);
            }
            $userId->delete();
            return response()->json([
                'message' => "Delete User Successfully",
                'stauts'  => true,
                'data' => $userId
            ],200);

            
        }catch(\Exception $e){
            return response()->json([
                'message' => 'delete not find',
                'status'  => false,
                'date'    => null
            ],500);
        }
    }
    public function update(Request $request,$user){
        try{
            $userid = User::find($user);
            if(!$userid){
                return response()->json([
                    'message' => 'bad request missing id',
                    'data' => null
                ],400);
            }

            $validated = $request->validate([
                'name' => ['required','string','max:255'],
                'email'=> ['required','email','unique:users,email'],
                'password' => ['required','string','min:6'],
                'role'  => ['string',Rule::in(['admin','hr','employee'])],
                'status' => ['string',Rule::in(['active','inactive'])]
            ]);
            if(isset($validated['password'])){
                $validated['password'] = Hash::make($validated['password']);
            }else{
                unset($validated['password']); // old password
            }
            $user =  $userid->update($validated);

            return response()->json([
                'message' => 'Update user successfully',
                'status'  => true,
                'data'    => $user
            ],201);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'update not found',
                'status'  => false,
                'data'    => null
            ],500);
        }
    }
}
