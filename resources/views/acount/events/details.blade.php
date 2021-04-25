@extends('acount.layout.template')

@section('main')

    <section class="main">
        <div class="container">
            <div class="row my-3 pb-1" style="border-bottom: 2px solid #0078FF">
                <div class="col-12 col-sm-6">
                    <h4 style="font-weight: 300;"><i class="fas fa-glass-cheers"></i> Gerenciando
                        evento {{ $dataEvent->name }} </h4>

                </div>
                <div class="col-12 col-sm-6">
                    <a href="{{ route('events.index') }}" class="btn btn-sm rounded-0"
                       style="float: right; background-color: mediumseagreen; color: #f2f2f2"><i
                            class="fas fa-arrow-left"></i> Voltar</a>

                </div>

            </div>

            <div class="row py-3">
                <div class="col-12 col-sm-6" style="border-right: 1px solid rgba(0,0,0,.5)">
                    <h5 style="font-weight: 300">Participantes do evento</h5>

                    <div class="row py-3">
                        <div class="col-12">
                            <div class="card">
                                @foreach($eventCont as $registerContacts)
                                    <ul class="list-group list-group-flush text-center">
                                        <li>{{ $registerContacts->first_name }} {{ $registerContacts->last_name }}</li>
                                        <li> {{ $registerContacts->cell }}</li>
                                        <li>{{ $registerContacts->email }}</li>
                                    </ul>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-12 col-sm-6">
                    <h5 style="font-weight: 300">Adicione um participante ao evento</h5>
                    <div class="row py-3">
                        <div class="col-12">

                            <form method="post" action="{{ route('events.addP') }}">
                                @csrf
                                @if($errors->all())
                                    @if($errors->all()[0] == 'error')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $errors->all()[1] }}
                                        </div>
                                    @else
                                        <div class="alert alert-success" role="alert">
                                            {{ $errors->all()[1] }}
                                        </div>
                                    @endif
                                @endif
                                <div class="form-group">
                                    <label for="partId">Selecione o contato do participante</label>
                                    <select class="form-control form-control-sm" name="part_contact" id="partId">
                                        @foreach($contacts->all() as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->email }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="eventId"></label>
                                    <input type="hidden" name="event_id" value="{{ $dataEvent->id }}"
                                           class="form-control form-control-sm" id="eventId" placeholder="">
                                </div>
                                <button type="submit" class="btn btn-sm mt-3"
                                        style="background-color: #0078ff; color: #eeeeee"><i class="far fa-save"></i>
                                    Adicionar participante
                                </button>
                            </form>

                        </div>

                    </div>
                </div>


            </div>

        </div>

    </section>
@endsection
