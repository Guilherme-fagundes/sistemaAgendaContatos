<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /*
     * Exibe tela de login de usúario do sistema
     * */
    public function index()
    {
        if (session()->get('userId')) {
            return redirect()->route('acount.home');
        }
        return view('login', [
            'title' => env('app_name') . " | Entrar no sistema"
        ]);
    }

    /*
     * Tratamento e validação do login
     * */
    public function indexPost(Request $request)
    {

        if ($request->all()) {
            if (in_array('', $request->all())) {
                return redirect()->back()->withErrors(['error', "Preencha todos os campos"]);
            } elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return redirect()->back()->withErrors(['error', "E-mail inválido"]);
            } else {

                //Verifica se a conta existe
                $email = DB::table('users')->where('email', '=', $request->email)->first();
                $pass = Hash::check($request->pass, $email->pass);

                if (!$email || !$pass) {
                    return redirect()->back()->withErrors(['error', "Nenhuma conta com estes dados"]);
                } else {
                    session()->put('userId', $email->id);
                    return redirect()->route('acount.home');
                }
            }
        }
    }

    /*
   * Logout do sistema
   * */
    public function logout()
    {
        session()->forget('userId');
        return redirect()->route('sys.login');
    }

    /*
     * Exibe tela de novo cadastro de usuário do sistema
     * */
    public function newAcount()
    {
        return view('createAcount', [
            'title' => env('app_name') . " | Criar nova conta"
        ]);
    }

    public function newAcountPost(Request $request)
    {
        if (in_array('', $request->all())) {
            return redirect()->back()->withErrors(['error', 'Preencha todos os campos']);
        } elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withErrors(['error', 'Este e-mail é inválido']);
        } elseif ($request->email != $request->Cemail) {
            return redirect()->back()->withErrors(['error', 'Os e-mails não combinam']);
        } else {

//            verifica se o e-mail já foi castrado
            $emailCheck = DB::table('users')->where('email', '=', $request->email)->first();
            if ($emailCheck) {
                return redirect()->back()->withErrors(['error', 'Já existe uma conta com este e-mail castrado']);
            } else {
                $userData = [
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'pass' => Hash::make($request->pass),
                    'level' => 1,
                    'ip' => $request->ip()
                ];

                $createUser = DB::table('users')->insert($userData);
                if ($createUser) {
                    return redirect()->back()->withErrors(['success', 'Conta criada com sucesso']);

                }
            }

        }

    }
}
