@extends('pdfs.fflch')

@section('styles_head')
<style type="text/css">
    body{
        margin-top: 0px; margin-left:3em; font-family: DejaVu Sans, sans-serif; font-size: 12px;
    }
    #headerFFLCH {
        font-size: 14px; width: 17cm; text-align:center; font-weight:bold; font-style:italic;
    }
    .data_hoje{
        margin-left: 10cm; margin-bottom:0.8cm; 
    }
    .conteudo{ 
        margin: 1cm; 
    }
    .boxSuplente {
        border: 1px solid; padding: 4px;
    }
    .boxPassagem {
        border: 1px solid; padding: 4px; text-align: justify; width:15cm;
    }
    .oficioSuplente{
        text-align: justify; 
    }
    p.recuo {
        text-indent: 0.5cm;
    }
    .moremargin {
        margin-bottom: 0.15cm;
    }
    .importante {
        border:1px solid; margin-top:0.3cm; margin-bottom:0.3cm; width: 15cm; font-size:12px; margin-left:0.5cm;
    }
    .negrito {
        font-weight: bolder;
    }
    .justificar{
        text-align: justify; width: 15cm; margin-left:0.5cm;
    }
    table{
        border-collapse: collapse;
        border: 0px solid #000;
    }
    table th, table td {
        border: 0px solid #000;
    }
    tr, td {
        border: 1px #000 solid; padding: 1
    }
</style>
@endsection('styles_head')

@section('content')
@inject('pessoa','Uspdev\Replicado\Pessoa')
  <br>
  <div id="headerFFLCH" style="text-align:center;">
    <table>
      <tr>
        <br>
        <td width="2cm"> <img src="images/fflch.gif" width="95%"/> </td> 
        <td width="14cm"> 
          <p style="text-align:center; font-style:normal; font-size:17px"> 
            Universidade de São Paulo<br> 
            Faculdade de Filosofia, Letras e Ciências Humanas<br>
          </p>
        </td>
      </tr>
    </table>
  </div>
  <div class="data_hoje">
    @php(setlocale(LC_TIME, 'pt_BR','pt_BR.utf-8','portuguese'))
    São Paulo, {{ strftime('%d de %B de %Y', strtotime('today')) }}
  </div>
	<left> {!! $configs->agencia_viagem !!} </left> 
	<br> 
    <ul> 
		<li>Requisição passagem aérea nº <b>{{$dados->requisicao}} </b> </li>  
		<li>Programa: <b>{{$agendamento->nome_area}} </b> </li>  
    <li><b>{{$agendamento->nivel}} </b> </li>  
		<li>Defesa do Sr.(a): <b> {{$agendamento->nome}} </b> </li>  
		<li>Orientador(a): Prof(a) Dr(a)<b> {{$agendamento->orientador}} </b> </li>
    </ul>
	<div class="justificar" style="text-indent:1cm;" >{!! $configs->agencia_texto !!} </div>
	<div class="importante">  
		Interessado(a): Prof(a). Dr(a). <b> {{$banca->nome}}</b> <br>
		E-mail: <b>{{$pessoa::email($banca->codpes)}}</b> <br>
		Telefone:<b> {{$pessoa::telefones($banca->codpes)['0']}}</b> <br>
		Data da defesa:<b> {{$agendamento->data}}</b> <br>
		Trajeto da passagem aérea <b> {{$dados->trajeto}}</b> <br>
	</div> <br>
	<table style="width:15.5cm; text-align:center;"> 
		<tr> 
			<td style="width:7.25cm;"> <p style="text-align:center;"> <b>IDA </b></p></td>
			<td> <p style="text-align:center;"><b>VOLTA </b> </p> </td>
		</tr>
		<tr>
			<td> {{$dados->ida}} </td>
			<td> {{$dados->volta}} </td>
		</tr>
	</table> <br>

	<p class="justificar"><b> Solicitamos a gentileza no sentido de comunicar aos professores interessados, com antecedência, n° do PTA e nome da companhia aérea.  </b></p> <br> <br> 
	<p style="text-align:center;"><b> Favor faturar para: {!! $configs->faturar_para !!} </b></p> <br>
  <div style="margin-top:0.5em; text-align:center;"> 
      Atenciosamente, 
  </div>
 	<p style="text-align:center;"> 
    <b> 
		  {{Auth::user()->name}}
      <br> 
      Serviço de Pós-Graduação - FFLCH/USP  
		</b>
  </p>
@endsection('content')
