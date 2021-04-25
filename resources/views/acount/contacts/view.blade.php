@extends('acount.layout.template')

@section('main')
    <section class="main">
        <div class="container">
            <div class="row my-3 pb-1" style="border-bottom: 2px solid #0078FF">
                <div class="col-12 col-sm-6">
                    <h4 style="font-weight: 300;"><i class="far fa-address-book"></i> Meus contato</h4>

                </div>
                <div class="col-12 col-sm-6">
                    <a href="{{ route('contact.new') }}" class="btn btn-sm rounded-0" style="float: right; background-color: #0078ff; color: #eee"><i class="fas fa-plus"></i> Novo contato</a>

                </div>

            </div>
            <div class="row py-3">
                <div class="col-12">

                    @if(!$dataContacts->all())
                        <div class="alert alert-warning" role="alert">
                            Nenhum contato cadastrado no momento

                        </div>
                    @else
                        <table class="table table-striped" style="overflow-x: auto">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Celular</th>
                                    <th>E-mail</th>
                                    <th>Cadastrado em</th>
                                    <th>Ultima atualização</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataContacts->all() as $contact)
                                    <tr>
                                        <td>{{ $contact->first_name }}</td>
                                        <td>{{ $contact->last_name }}</td>
                                        <td>{{ $contact->cell }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($contact->created_at)) }}</td>
                                        <td>{{ ($contact->updated_at == null ? 'Sem atualização' : date('d-m-Y H:i:s', strtotime($contact->updated_at))) }}</td>
                                        <td>

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
