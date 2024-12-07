<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index(Request $request){

        $error = '';

        if($request->get('error') == 1){
            $error = 'Usuário ou senha inválidos!';
        }

        if($request->get('error') == 2){
            $error = 'Necessário realizar login para acessar a página!';
        }

        return view('website.login', ['error' => $error]);
    }

    public function authenticate(Request $request){
        $rules = [
            'user' => 'email',
            'password' => 'required'
        ];

        $feedback = [
            'user.email' => 'O campo usuário é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($rules, $feedback);

        $email = $request->get('user');
        $password = $request->get('password');

        $userRequest = new User();

        $user = $userRequest->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();

        if(isset($user->name)){
            session_start();
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;

            //dd($_SESSION);

            return redirect()->route('app.home');
            
        } else {
            return redirect()->route('website.login', ['error' => 1]);
        }
    }

    public function logout(){
        session_destroy();
        return redirect()->route('website.index');
    }
}
