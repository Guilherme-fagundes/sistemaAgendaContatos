<?php

namespace App\Http\Controllers\Acount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    // Exibe todos os contatos
    public function view()
    {
        if (!session()->get('userId')) {
            return redirect()->route('sys.login');
        }

        $readContacts = DB::table('contacts')->get();

        return view('acount/contacts/view', [
            'title' => "Minha conta | Todos os contatos",
            'dataContacts' => $readContacts
        ]);

    }

    // Exibe tela novo contato
    public function newContact()
    {
        if (!session()->get('userId')) {
            return redirect()->route('sys.login');
        }


        return view('acount/contacts/new', [
            'title' => "Minha conta | Novo contato"
        ]);
    }

    public function newContactPost(Request $request)
    {
        if ($request->all()){
            if (in_array('', $request->all())){
                return redirect()->back()->withErrors(['error', 'Para cadastrar um contato é necessário preencher todos os campos :(']);
            }elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                return redirect()->back()->withErrors(['error', 'E-mail inválido']);

            }else{

                $dataContacts = [
                    'first_name' => $request->name,
                    'last_name' => $request->last_name,
                    'cell' => $request->cell,
                    'email' => $request->email
                ];

                $createContact = DB::table('contacts')
                    ->insert($dataContacts);

                if ($createContact){
                    return redirect()->back()->withErrors(['success', "O contato {$request->name} foi cadastrado"]);
                }
            }

        }

    }
}
