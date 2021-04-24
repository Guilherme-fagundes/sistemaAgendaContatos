@extends('acount.layout.template')

@section('main')
    <section class="main">
        <div class="container">
            <div class="row my-3 pb-1" style="border-bottom: 2px solid #0078FF">
                <div class="col-12 col-sm-6">
                    <h4 style="font-weight: 300;"><i class="fas fa-users"></i> Novo Grupo</h4>

                </div>
                <div class="col-12 col-sm-6">
                    <a href="{{ route('groups.index') }}" class="btn btn-sm rounded-0" style="float: right; background-color: mediumseagreen; color: #eee"><i class="fas fa-arrow-left"></i> Voltar</a>

                </div>

            </div>
            <div class="row py-3">
                <div class="col-12">

                    <form method="post" action="{{ route('groups.new.post') }}">
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
                                <label for="name" class="form-label">Nome do grupo</label>
                                <input type="text" name="group_name" class="form-control form-control-sm" id="name">
                            </div>
                            <div class="col">
                                <label for="created_at" class="form-label">Data de cadastro</label>
                                <input type="text" name="created_at" value="{{ date('d-m-Y H:i:s') }}" class="form-control form-control-sm" id="created_at" readonly>
                            </div>
                            <div class="col">
                                <label for="created_at" class="form-label">Data de atualização</label>
                                <input type="text" name="updated_at" value="Sem atualização" class="form-control form-control-sm" id="created_at" readonly>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm rounded-0 mt-3" style="background-color: #0078ff; color: #f1f1f1"><i class="far fa-save"></i> salvar</button>
                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection
