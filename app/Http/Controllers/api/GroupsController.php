<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    private $json = [];

    public function __construct()
    {
    }

    public function index()
    {
        $groups = DB::table('contact_groups')->orderBy('group_name', 'asc')->get();
        if ($groups) {
            $this->json['status'] = true;
            $this->json['result'] = $groups;
        } else {
            $this->json['status'] = true;
            $this->json['result'] = "Sem resultados";
        }

        echo json_encode($this->json);
    }

    public function show($id)
    {
        $groupId = DB::table('contact_groups')
            ->where('id', '=', $id)
            ->first();

        if ($groupId) {
            $this->json['status'] = true;
            $this->json['result'] = $groupId;
        } else {
            $this->json['status'] = true;
            $this->json['result'] = "Sem resultados";
        }

        echo json_encode($this->json);
    }

    public function update($id, Request $request)
    {
        if ($request->all()) {
            if (in_array("", $request->all())) {
                $this->json['status'] = false;
                $this->json['error'] = "Campos em branco";

            } else {

                $update = DB::table('contact_groups')
                    ->where(['id' => $id])
                    ->update($request->all());

                if ($update) {
                    $this->json['status'] = true;
                    $this->json['success'] = "Evento atualizado";
                    $this->json['data'] = $request->all();

                } else {
                    $this->json['status'] = false;
                    $this->json['error'] = "Erro ao atualizar";
                }
            }
        }

        echo json_encode($this->json);
    }

    public function delete($id)
    {
        $delete = DB::table('contact_groups')->delete($id);
        if ($delete){
            $this->json['status'] = true;
            $this->json['success'] = "Grupo deletado";

        }

        echo json_encode($this->json);
    }
}
