@extends('acount.layout.template')

@section('main')
    <section class="main">
        <div class="container">
            <div class="row my-3 pb-1" style="border-bottom: 2px solid #0078FF">
                <div class="col-12 col-sm-6">
                    <h4 style="font-weight: 300;"><i class="fas fa-glass-cheers"></i> Eventos</h4>

                </div>
                <div class="col-12 col-sm-6">
                    <a href="{{ route('events.new') }}" class="btn btn-sm rounded-0" style="float: right; background-color: #0078ff; color: #eee"><i class="fas fa-plus"></i> Novo evento</a>

                </div>

            </div>

            <div class="row py-3">
                <div class="col-12">

                    @if(!$events->all())
                        <div class="alert alert-warning" role="alert">
                            Nenhum evento cadastrado no momento

                        </div>
                    @else
                        <table class="table table-striped" style="overflow-x: auto">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data do evento</th>
                                <th>Cadastrado em</th>
                                <th>Ultima atualização</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($events->all() as $event)
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($event->created_at)) }}</td>
                                        <td>{{ ($event->updated_at == null ? 'Sem atualização no momento' : date('d-m-Y H:i:s', strtotime($event->updated_at))) }}</td>
                                        <td>
                                            <a class="btn btn-sm" title="Gerenciar evento" href="{{ route('events.details', ['id' => $event->id]) }}" style="background-color: orange; color: #f2f2f2"><i class="fas fa-cog"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    @endif
                </div>
            </div>

        </div>

    </section>
@endsection
