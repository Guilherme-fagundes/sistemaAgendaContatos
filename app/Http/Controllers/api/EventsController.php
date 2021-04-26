<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    private $json = [];


    public function index()
    {
        $events = DB::table('events')->get();
        if ($events) {
            $this->json['status'] = true;
            $this->json['results'] = $events;
        }

        echo json_encode($this->json);
    }

    public function show($id)
    {
        $eventId = DB::table('events')->where(['id' => $id])->first();
        if ($eventId){
            $this->json['status'] = true;
            $this->json['results'] = $eventId;
        }

        echo json_encode($this->json);
    }

    public function delete($id)
    {
        $delete = DB::table('events')->delete($id);
        if ($delete){
            $this->json['status'] = true;
            $this->json['success'] = "Evento deletado";

        }

        echo json_encode($this->json);
    }

    public function update($id, Request $request)
    {
        if ($request->all()){
            if (in_array('', $request->all())){
                $this->json['status'] = false;
                $this->json['error'] = "Parace que tem campos em branco";


            }else{
                $update = DB::table('events')
                    ->where(['id' => $id])
                    ->update($request->all());

                if ($update){
                    $this->json['status'] = true;
                    $this->json['success'] = "Dados atualizados";
                }
            }
        }


        echo json_encode($this->json);
    }
}
