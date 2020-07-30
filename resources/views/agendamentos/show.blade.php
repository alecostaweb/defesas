@extends('laravel-usp-theme::master')

@section('content')

    <div class="row">
        <div class="col-sm">
            <a href="/agendamentos/create" class="btn btn-primary">Agendar Nova Defesa</a></br>
        </div>
        <div class="col-sm ">
            <div class="row float-right">
                <div class="col-auto">
                    <a href="/agendamentos/{{$agendamento->id}}/edit" class="btn btn-warning">Editar Defesa</a>
                </div>
                <div class="col-auto">
                    <form method="POST" action="/agendamentos/{{ $agendamento->id }}">
                        @csrf 
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja apagar?')">Apagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>

    @inject('pessoa','Uspdev\Replicado\Pessoa')

    <div class="card">
        <div class="card-header">Defesa</div>
        <div class="card-body">
            <b>Título da Tese:</b> {{$agendamento->titulo}}</br>
            <b>Candidato:</b> {{$pessoa::dump($agendamento->codpes)['nompes'] }} </br>
            <b>Nº USP:</b> {{ $agendamento->codpes }}</br>
            <b>Sexo:</b> {{$agendamento->sexo}}</br>
            <b>Regimento:</b> {{$agendamento->regimento}}</br>
            <b>Nível:</b> {{$agendamento->nivel}}</br>
            @foreach ($agendamento->programaOptions() as $option)
                @if ($option == $agendamento->area_programa)
                    <b>Programa:</b> {{$option}}</br>
                @endif
            @endforeach
            <b>Orientador Votante:</b> {{$agendamento->orientador_votante}}</br>
            <b>Orientador:</b> {{$pessoa::dump($agendamento->orientador)['nompes']}}</br>
            <b>Data:</b> {{$agendamento->data}}</br>
            <b>Horário:</b> {{$agendamento->horario}}</br>
            @foreach ($agendamento->salaOptions() as $option)
                @if ($option == $agendamento->sala)
                    <b>Local:</b> {{$option}}</br>
                @endif
            @endforeach
        </div>
    </div>
    <br>
    @include('agendamentos.partials.banca')
    <br>
    <div class="card">
        <div class="card-header">Documentos Gerais</div>
        <div class="card-body">

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            Documento Zero
                        </td>
                        <td>
                            <a href="/agendamentos/{{$agendamento->id}}/documento_zero" class="btn btn-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            Placa
                        </td>
                        <td>
                            <a href="/agendamentos/{{$agendamento->id}}/placa" class="btn btn-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Etiquetas
                        </td>
                        <td>
                            <a href="/agendamentos/{{$agendamento->id}}/etiqueta" class="btn btn-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ofício titulares
                        </td>
                        <td>
                            <a href="/agendamentos/{{$agendamento->id}}/titulares" class="btn btn-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ofício suplentes
                        </td>
                        <td>
                            <a href="/agendamentos/{{$agendamento->id}}/suplentes" class="btn btn-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Declaração de Participação
                        </td>
                        <td>
                            <a href="/agendamentos/{{$agendamento->id}}/declaracoes" class="btn btn-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Recibos de remessa de documentos para docentes USP                    
                        </td>
                        <td>
                            <a href="/agendamentos/{{$agendamento->id}}/recibos" class="btn btn-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection('content')
