@extends('layouts.main')

@section('title', 'Categorias')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles_categorias.css') }}">
    <header class="header_categorias">
        <main class="categorias">
            <div class="header_3">
                <div class="maior_acesso">
                    <ul>
                        <li>
                            <b class="texto_rank" href="">Regiões do Brasil</b>
                        </li>
                    </ul>
                </div>
                
                <div class="capa">
                    <img src="/img/categorias/Norte.png" alt="img" />
                </div>

                <div class="maior_acesso">
                    <div class="sobre_container">
                        <header class="apresentacao">
                            <p class="p_1">
                                Tendo sido a primeira região efetivamente colonizada por portugueses, ainda no 
                                século XVI, que aí encontraram as populações nativas e foram acompanhados por 
                                africanos trazidos como escravos, a cultura nordestina é bastante particular e típica, 
                                apesar de extremamente variada. Sua base é luso-brasileira, com grandes influências africanas, 
                                em especial na costa de Pernambuco à Bahia e no Maranhão, e ameríndias, em especial no sertão semiárido. 
                            </p>  
                            <p class="p_1">
                                A culinária nordestina é variada, refletindo as condições econômicas e produtivas das diversas 
                                paisagens geoeconômicas dessa região. Frutos do mar e peixes são bastante utilizados na culinária 
                                do litoral, enquanto, no sertão, predominam receitas que utilizam a carne e derivados do gado 
                                bovino, caprino e ovino. Ainda assim, há várias diferenças regionais, tanto na variedade de 
                                pratos quanto em sua forma de preparo. Por exemplo, no Ceará, predomina o mugunzá - também 
                                chamado macunzá ou mucunzá - salgado, enquanto em Pernambuco predomina o doce. 
                                Na Bahia, os principais destaques são as comidas feitas com azeite de dendê e com camarão, 
                                como as moquecas, o vatapá, o acarajé e os bobós; porém não são menos apreciadas comidas 
                                acompanhadas de pirão como mocotó e rabada, além de doces como a cocada, a rapadura e o alfenim, 
                                que estão presentes em todo o nordeste. No Maranhão, destacam-se o cuxá, o arroz de cuxá, o bobó, 
                                o peixe pedra e a torta de camarão. Também no Maranhão se destaca o Guaraná Jesus, patrimônio maranhense 
                                de fama nacional. Já o bolo de rolo é patrimônio imaterial de Pernambuco.
                            </p>
                            <p class="p_1">
                                Algumas comidas típicas da região são: o baião de dois, a carne de sol, o queijo de coalho, o vatapá, 
                                o acarajé, a panelada, a buchada, a canjica, o feijão e arroz de coco, o feijão verde e o sururu, assim 
                                como vários doces feitos de mamão, jaca, abóbora, laranja, etc. Algumas frutas regionais - não necessariamente 
                                nativas da região - são a ciriguela, o cajá, o buriti, a cajarana, o umbu, a macaúba, juçara, bacuri, cupuaçu, 
                                buriti, murici e a pitomba, além de outras. 
                            </p>
                        </header>
                    </div> 
                </div>

                <div class="capa">
                    <img src="/img/categorias/Nordeste.png" alt="img" />
                </div>
                <div class="capa">
                    <img src="/img/categorias/Centro_Oeste.png" alt="img" />
                </div>
                <div class="capa">
                    <img src="/img/categorias/Sudeste.png" alt="img" />
                </div>
                <div class="capa">
                    <img src="/img/categorias/Sul.png" alt="img" />
                </div>

            </div>
            <script src=" {{ asset('js/slider_index.js') }}" ></script>
        </main>
    </header>
    
@endsection