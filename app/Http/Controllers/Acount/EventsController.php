<?php

namespace App\Http\Controllers\Acount;

use App\Http\Controllers\Controller;
use App\Mail\EventsEmail;
use App\Models\EventModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

    public function details($id)
    {
        if (!session()->get('userId')) {
            return redirect()->route('sys.login');
        }

        $dataEvent = DB::table('events')
            ->where('id', '=', $id)->first();

        $readContacts = DB::table('contacts')->orderBy('first_name', 'asc')->get();

        // Leitura dos participantes do evento
        $readP = DB::table('participants')->where('event_id', '=', $id)->get();

        $event = EventModel::find($id);

        return view('acount.events.details', [
            'title' => "Minha conta | Gerenciar evento",
            "dataEvent" => $dataEvent,
            'contacts' => $readContacts,
            'eventCont' => $event->contacts
        ]);

    }

    public function addP(Request $request)
    {
        if ($request->all()){
            $dataParticipant = $request->only(['part_contact', 'event_id']);

            //Dados de contato para evio do e-mail
            $dataContactIns = (array) DB::table('contacts')->where('id', '=', $dataParticipant['part_contact'])
                ->first();

            // Dados do evento para o e-mail
            $dataEventIns =(array) DB::table('events')
                ->where('id', '=', $dataParticipant['event_id'] )->first();

            $dataEmail = (object) array_merge($dataContactIns, $dataEventIns);

            // Cadastra articipante
            $addP = DB::table('participants')->insert($dataParticipant);
            if ($addP){

                Mail::send(new EventsEmail($dataEmail));
                return redirect()->back()->withErrors(['success', "Participante adicionado"]);
            }

        }

    }

}
