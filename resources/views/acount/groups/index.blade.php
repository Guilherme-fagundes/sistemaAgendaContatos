@extends('acount.layout.template')

@section('main')
    <section class="main">
        <div class="container">
            <div class="row my-3 pb-1" style="border-bottom: 2px solid #0078FF">
                <div class="col-12 col-sm-6">
                    <h4 style="font-weight: 300;"><i class="fas fa-users"></i> Meus grupos</h4>

                </div>
                <div class="col-12 col-sm-6">
                    <a href="{{ route('groups.new') }}" class="btn btn-sm rounded-0" style="float: right; background-color: #0078ff; color: #eee"><i class="fas fa-plus"></i> Novo grupo</a>

                </div>

            </div>

            <div class="row py-3">

                <div class="row py-3">
                    <div class="col-12">

                        @if(!$groups->all())
                            <div class="alert alert-warning" role="alert">
                                Menhum Grupo cadastrado no momento

                            </div>
                        @else
                            <table class="table table-striped" style="overflow-x: auto">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Criado em</th>
                                    <th>Ultima atualização</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups->all() as $group)
                                        <tr>
                                            <td>{{ $group->group_name }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($group->created_at)) }}</td>
                                            <td>{{ ($group->updated_at == null ? 'Sem atualizações' : date('d-m-Y H:i:s', strtotime($group->created_at))) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        @endif
                    </div>
                </div>


            </div>

        </div>

    </section>

@endsection
