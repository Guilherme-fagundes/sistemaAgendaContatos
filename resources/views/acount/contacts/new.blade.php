@extends('acount.layout.template')

@section('main')
    <section class="main">
        <div class="container">
            <div class="row my-3 pb-1" style="border-bottom: 2px solid #0078FF">
                <div class="col-12 col-sm-6">
                    <h4 style="font-weight: 300;"><i class="far fa-address-book"></i> Novo contato</h4>

                </div>
                <div class="col-12 col-sm-6">
                    <a href="{{ route('contact.view') }}" class="btn btn-sm rounded-0" style="float: right; background-color: mediumseagreen; color: #eee"><i class="fas fa-arrow-left"></i> Voltar</a>

                </div>
            </div>
            <div class="row py-3">
                <div class="col-12">

                    <form method="post" action="{{ route('contact.new.post') }}" style="overflow-x: hidden">
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
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control form-control-sm" id="name">
                            </div>
                            <div class="col">
                                <label for="lname" class="form-label">Sobrenome</label>
                                <input type="text" name="last_name" class="form-control form-control-sm" id="lname">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="cell" class="form-label">Celular</label>
                                <input type="text" name="cell" class="form-control form-control-sm" id="cell">
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" name="email" class="form-control form-control-sm" id="email">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm rounded-0 mt-3" style="background-color: #0078ff; color: #f1f1f1"><i class="far fa-save"></i> salvar</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

