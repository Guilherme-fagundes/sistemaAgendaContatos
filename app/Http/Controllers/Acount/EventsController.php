<?php

namespace App\Http\Controllers\Acount;

use App\Http\Controllers\Controller;
use App\Models\EventModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Cassandra\Type;

class EventsController extends Controller
{
    // Exibe lista de eventos
    public function index()
    {
        if (!session()->get('userId')) {
            return redirect()->route('sys.login');
        }

        $readEvents = DB::table('events')->get();

        return view('acount/events/index', [
            'title' => "Minha conta | Todos eventos",
            'events' => $readEvents
        ]);
    }

    // Exibe tela de cadastro de eventos
    public function create()
    {
        if (!session()->get('userId')) {
            return redirect()->route('sys.login');
        }

        return view('acount/events/new', [
            'title' => "Minha conta | Novo evento"
        ]);
    }

    // Tratamento e validação cadastro de eventos
    public function createPost(Request $request)
    {
        if ($request->all()) {
            if (in_array("", $request->all())) {
                return redirect()->back()->withErrors(['error', 'Preencha todos os campos']);
            } else {

                $eventCreate = new EventModel();

                $eventCreate->name = $request->name;
                $eventCreate->date = $request->date;
                $eventCreate->save();

                return redirect()->back()->withErrors(['success', 'Evento criado com sucesso']);


            }
        }

    }

}
