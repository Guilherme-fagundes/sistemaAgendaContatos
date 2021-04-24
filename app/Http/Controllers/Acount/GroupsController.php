<?php

namespace App\Http\Controllers\Acount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    //Exibe tela de listagem de todos os grupos de contatos
    public function index()
    {
        if (!session()->get('userId')) {
            return redirect()->route('sys.login');
        }

        $readGroups = DB::table('contact_groups')->get();

        return view('acount/groups/index', [
            'title' => "Minha conta | Todos os grupos",
            'groups' => $readGroups
        ]);

    }

    //Exibe tela de cadastro de novo grupo de contatos
    public function newGroup()
    {
        if (!session()->get('userId')) {
            return redirect()->route('sys.login');
        }

        return view('acount/groups/new', [
            'title' => "Minha conta | Novo grupo"
        ]);


    }

    public function newGroupPost(Request $request)
    {
        if ($request->all()){
            $request->request->remove('created_at');
            $request->request->remove('updated_at');
            $request->request->remove('_token');

            if (in_array('', $request->all())){
                return redirect()->back()->withErrors(['error', 'Nenhum grupo pode ser cadastrado sem um nome']);
            }else{
                $createGroup = DB::table('contact_groups')
                    ->insert($request->all());

                if ($createGroup){
                    return redirect()->back()->withErrors(['success', "Grupo {$request->group_name} criado com sucesso"]);
                }
            }
        }

    }
}
