<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    private $json = [];

    public function __construct()
    {
    }

    public function index()
    {
        return DB::table('contacts')->get()->toJson();
    }

    public function show($id)
    {
        return DB::table('contacts')
            ->where(['id' => $id])->get()->toJson();
    }

    public function create(Request $request)
    {
        if ($request->all()) {
            if (in_array('', $request->all())) {
                $this->json['error'] = "Parace que tem campos em branco";
                $this->json['status'] = false;
            } elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $this->json['error'] = "E-mail inválido";
                $this->json['status'] = false;
            } else {
                $checkMail = DB::table('contacts')->where(['email' => $request->email])->exists();
                if ($checkMail) {
                    $this->json['error'] = "Um contato já está utilizando este e-mail";
                    $this->json['status'] = false;
                } else {

                    $create = new ContactsModel();
                    $create->first_name = $request->first_name;
                    $create->last_name = $request->last_name;
                    $create->cell = $request->cell;
                    $create->email = $request->email;

                    $create->save();

                    $readLastId = DB::table('contacts')
                        ->where(['id' => $create->id])->first();
                    $this->json['success'] = true;
                    $this->json['data'] = $readLastId;
                }
            }
        }

        echo json_encode($this->json);

    }

    public function destroy($id)
    {
        DB::table('contacts')->delete($id);
        $this->json['status'] = true;
        $this->json['success'] = "contato deletado";


        echo json_encode($this->json);
    }

    public function update($id, Request $request)
    {
        if ($request->all()){
            if (in_array('', $request->all())){
                $this->json['error'] = "Parace que tem campos em branco";
                $this->json['status'] = false;

            }elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                $this->json['error'] = "E-mail inválido";
                $this->json['status'] = false;
            }
        }

        $update = DB::table('contacts')
            ->where(['id' => $id])
            ->update($request->all());

        if ($update){
            $this->json['status'] = true;
            $this->json['success'] = "Dados atualizados";
        }
        echo json_encode($this->json);
    }
}
