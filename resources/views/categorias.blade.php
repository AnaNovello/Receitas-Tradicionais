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
                    <a href="{{ route('receitas', ['categoria' => 'Norte']) }}">
                        <img src="/img/categorias/Norte.png" alt="Norte" />
                    </a>
                </div>

                <div class="maior_acesso">
                    <div class="sobre_container">
                        <header class="apresentacao">
                            <p class="p_1">
                                A Região Norte é a maior região do Brasil em extensão territorial e é o local de um dos biomas mais ricos do planeta, 
                                a Floresta Amazônica. Antes da chegada dos colonizadores, o Norte era habitado por uma grande diversidade de povos indígenas, 
                                cujas culturas, tradições e conhecimentos sobre a fauna e flora influenciaram profundamente a identidade regional. 
                            </p>  
                            <p class="p_1">
                                Durante o período colonial, portugueses e espanhóis exploraram a Amazônia em busca de recursos valiosos, como especiarias, 
                                borracha e pau-brasil. No entanto, diferentemente de outras partes do Brasil, a presença de africanos escravizados foi menos 
                                significativa, resultando em um processo de miscigenação predominante entre indígenas e europeus. Essa fusão cultural se reflete 
                                até hoje nos costumes, tradições e na gastronomia local.
                            </p>
                            <p class="p_1 p_last">
                                A culinária do Norte é marcada principalmente pela forte influência indígena, mas também com traços das culturas africana 
                                e portuguesa. Os ingredientes típicos da Amazônia dão origem a pratos únicos, como o pato no tucupi, a maniçoba e o tacacá, 
                                além de uma grande variedade de preparos à base de peixes nativos, como pirarucu, tambaqui, jaú e piramutaba. A diversidade 
                                de frutas regionais também é um destaque, incluindo o açaí, pupunha, tucumã, cupuaçu e outras mais. Além disso, alimentos 
                                derivados da mandioca são amplamente consumidos e fazem parte do cotidiano dos habitantes. 
                            </p>
                        </header>
                    </div> 
                </div>

                <div class="capa">
                    <a href="{{ route('receitas', ['categoria' => 'Nordeste']) }}">
                        <img src="/img/categorias/Nordeste.png" alt="Nordeste" />
                    </a>
                </div>

                <div class="maior_acesso">
                    <div class="sobre_container">
                        <header class="apresentacao">
                            <p class="p_1">
                                O Nordeste foi a primeira região do Brasil a ser efetivamente colonizada pelos portugueses no século XVI. Ao chegarem, 
                                encontraram povos indígenas já estabelecidos e, posteriormente, introduziram africanos escravizados, que tiveram um papel 
                                fundamental na formação cultural da região. Esse processo histórico resultou em uma identidade cultural singular, com forte 
                                base luso-brasileira e influências marcantes das tradições africanas, especialmente na faixa litorânea entre Pernambuco, Bahia 
                                e Maranhão, além de elementos indígenas mais presentes no sertão semiárido.
                            </p>  
                            <p class="p_1 p_last">
                                A diversidade geográfica do Nordeste também se reflete na sua culinária, que varia conforme as condições econômicas e os 
                                ingredientes disponíveis em cada sub-região. No litoral, os frutos do mar e os peixes são ingredientes fundamentais, enquanto no 
                                sertão, as receitas são baseadas na carne e nos derivados do gado bovino, caprino e ovino. Além disso, cada estado apresenta 
                                variações em seus pratos típicos. No Ceará, por exemplo, o mungunzá é consumido em sua versão salgada, enquanto em Pernambuco 
                                predomina a versão doce. A Bahia se destaca por pratos que levam azeite de dendê e camarão, como moqueca, vatapá, acarajé e 
                                bobó, mas também possui preparos à base de pirão, como mocotó e rabada. Os doces tradicionais, como cocada, rapadura e alfenim, 
                                são apreciados em toda a região. No Maranhão, o cuxá e o arroz de cuxá ganham destaque, assim como o bobó, o peixe pedra e a torta de camarão.  
                            </p>
                        </header>
                    </div> 
                </div>

                <div class="capa">
                    <a href="{{ route('receitas', ['categoria' => 'Centro Oeste']) }}">
                        <img src="/img/categorias/Centro_Oeste.png" alt="Centro Oeste" />
                    </a>
                </div>

                <div class="maior_acesso">
                    <div class="sobre_container">
                        <header class="apresentacao">
                            <p class="p_1">
                                A Região Centro-Oeste do Brasil é uma das menos populosas do país e teve como primeiros habitantes os povos indígenas, 
                                que deixaram uma influência marcante na cultura local. Com a chegada dos bandeirantes, no período colonial, a região 
                                passou a ser explorada em busca de ouro, levando à fundação de importantes vilas, como Vila Real do Bom Jesus de 
                                Cuiabá,atual Cuiabá, a capital do Mato Grosso e a cidade mais antiga do oeste brasileiro. Além de Vila Boa, que se 
                                tornou o estado de Goiás. 
                            </p>  
                            <p class="p_1">
                                Além dos exploradores em busca de riquezas minerais, fazendeiros vindos de Minas Gerais e São Paulo ocuparam a região, 
                                implementando grandes fazendas de criação de gado, atividade que se consolidou como uma das principais bases econômicas 
                                locais. Ao longo dos séculos, a população centro-oestina se formou a partir da miscigenação entre europeus, africanos e 
                                indígenas, mantendo uma composição étnica diversa. A migração interna também foi determinante para a configuração populacional 
                                do Centro-Oeste. O sul de Mato Grosso do Sul, por exemplo, recebeu grande número de imigrantes do Sul do país, especialmente 
                                gaúchos, catarinenses e paranaenses, que impulsionaram o setor agrícola e a infraestrutura da região ao abrirem estradas, 
                                serrarias e novas cidades.
                            </p>
                            <p class="p_1">
                                Outro aspecto marcante do Centro-Oeste é a expressiva presença indígena, com diversas tribos espalhadas por reservas e parques, 
                                como o Parque Indígena do Xingu, que abriga cerca de 20 etnias, o Parque Indígena do Araguaia, localizado na Ilha do Bananal, e 
                                as Reservas Indígenas Xavante e Parecis.
                            </p>
                            <p class="p_1">
                                A culinária centro-oestina é uma rica fusão de tradições indígenas, coloniais e influências de países vizinhos, como Bolívia 
                                e Paraguai. Os povos indígenas legaram o uso de raízes, como a mandioca e o palmito, além de peixes e frutas típicas. 
                                Os colonizadores portugueses, por sua vez, introduziram temperos, farinha e novas técnicas de preparo, que foram incorporadas ao 
                                repertório gastronômico local.
                            </p>
                            <p class="p_1 p_last">
                                O aproveitamento da extensa bacia hidrográfica da região se reflete na grande variedade de pratos à base de peixes de água 
                                doce. O pintado é um dos mais apreciados, mas outras espécies, como pacu, dourado e piranha, também são comuns na culinária 
                                local. No Pantanal, a fauna regional deu origem a pratos considerados exóticos, como os preparados com carne de jacaré, 
                                capivara, paca e filé de tatu. Já as frutas típicas, como o pequi, a gabiroba, o cajá e a graviola, trazem um toque especial 
                                a receitas tanto doces quanto salgadas. Para realçar os sabores, temperos como açafrão e pimenta são indispensáveis na 
                                gastronomia regional, tornando a experiência gastronômica do Centro-Oeste única e cheia de identidade.
                            </p>
                        </header>
                    </div> 
                </div>

                <div class="capa">
                    <a href="{{ route('receitas', ['categoria' => 'Sudeste']) }}">
                        <img src="/img/categorias/Sudeste.png" alt="Sudeste" />
                    </a>
                </div>

                <div class="maior_acesso">
                    <div class="sobre_container">
                        <header class="apresentacao">
                            <p class="p_1">
                                O Sudeste brasileiro, composto pelos estados de São Paulo, Rio de Janeiro, Minas Gerais e Espírito Santo, é a região mais 
                                populosa e economicamente desenvolvida do país. Sua história se inicia com os povos indígenas que habitavam suas terras antes 
                                da chegada dos portugueses no século XVI. Os colonizadores iniciaram a exploração do pau-brasil nas matas litorâneas e, 
                                posteriormente, expandiram-se para o interior em busca de ouro e terras para agricultura.
                            </p>  
                            <p class="p_1">
                                Durante os primeiros séculos de colonização, a miscigenação entre portugueses e indígenas foi intensa, sobretudo em São Paulo, 
                                onde os bandeirantes se afastaram dos padrões metropolitanos europeus e desenvolveram uma identidade própria, influenciada 
                                pelas culturas indígena e africana. Com a descoberta do ouro em Minas Gerais, no final do século XVII, a região tornou-se o 
                                principal centro econômico da colônia, atraindo um grande fluxo de migrantes.
                            </p>
                            <p class="p_1">
                                O Sudeste também foi palco de intensos processos migratórios nos séculos XIX e XX. A expansão da cafeicultura no interior 
                                paulista gerou uma demanda crescente por mão de obra, levando à chegada de imigrantes europeus, principalmente italianos, 
                                portugueses e espanhóis. Rapidamente, os imigrantes urbanos se integraram ao mercado de trabalho e, em 1900, já representavam 
                                a maioria da mão de obra fabril da capital paulista. já no Rio de Janeiro, a presença de portugueses, libaneses, sírios e 
                                japoneses, também contribuíram para a diversidade cultural da região.
                            </p>  
                            <p class="p_1">
                                Outro importante fluxo migratório ocorreu entre as décadas de 1950 e 1980, quando milhares de nordestinos migraram para o 
                                Sudeste em busca de melhores condições de vida, impulsionados pela industrialização acelerada de São Paulo e Rio de Janeiro. 
                                A seca e a exploração social no Nordeste foram fatores determinantes para essa migração em massa.
                            </p>  
                            <p class="p_1 p_last">
                                A riqueza cultural do Sudeste reflete-se também em sua gastronomia, que varia significativamente entre os estados. 
                                Em Minas Gerais, pratos como feijão tropeiro, tutu de feijão, frango com quiabo e o famoso pão de queijo são ícones da 
                                culinária local. No Espírito Santo, a cozinha é marcada por influências indígenas e portuguesas, com destaque para a torta 
                                capixaba, preparada com siri, camarão, ostra e sururu. São Paulo, devido à forte influência dos imigrantes, conta com uma 
                                culinária diversa que inclui o virado à paulista, a coxinha, o cuscuz paulista e o pastel, além das adaptações de pratos 
                                italianos, japoneses e portugueses. No Rio de Janeiro, a feijoada é o prato mais emblemático, acompanhada de farofa e couve 
                                refogada. 
                            </p>
                        </header>
                    </div> 
                </div>

                <div class="capa">
                    <a href="{{ route('receitas', ['categoria' => 'Sul']) }}">
                        <img src="/img/categorias/Sul.png" alt="Sul" />
                    </a>
                </div>

                <div class="maior_acesso">
                    <div class="sobre_container">
                        <header class="apresentacao">
                            <p class="p_1">
                                A Região Sul do Brasil destaca-se principalmente pelo modo específico de colonização e pelos tipos de colonizadores que 
                                recebeu ao longo da história. A colonização começou nos séculos XVII e XVIII, quando os povos indígenas, que habitavam 
                                originalmente a região, foram contatados pelos jesuítas espanhóis, que chegaram com o objetivo de catequizar as populações 
                                nativas. Esses jesuítas fundaram aldeias chamadas missões nas áreas de Guaíra e Sete Povos das Missões, onde os indígenas 
                                passaram a desempenhar atividades como a criação de gado, agricultura e ofícios artesanais.
                            </p>  
                            <p class="p_1">
                                Durante o período colonial, no início do século XVII, a região do Paraná foi colonizada por paulistas e seus descendentes, 
                                motivados pela descoberta de pequenas quantidades de ouro. Contudo, com a destruição das missões, a pecuária se dispersou, 
                                o que resultou na ocupação dos Pampas e no fortalecimento da formação do povo gaúcho, cuja identidade está profundamente 
                                ligada à cultura rural e à criação de gado.
                            </p>
                            <p class="p_1">
                                No século XIX e nas primeiras décadas do século XX, a Região Sul viu um grande fluxo de imigrantes europeus, principalmente 
                                de alemães e italianos, além de poloneses e ucranianos. Esse movimento populacional foi impulsionado por diversos fatores, 
                                como a natureza favorável ao cultivo e a adaptação das culturas europeias ao clima subtropical da região.
                            </p>
                            <p class="p_1 p_last">
                                A culinária do Sul é marcada pela mistura de influências indígenas, portuguesas, espanholas, italianas e alemãs. O Rio 
                                Grande do Sul, por exemplo, tem uma gastronomia que reflete essas múltiplas influências, com pratos típicos como o churrasco, 
                                o arroz de carreteiro e o galeto ao Primo Canto, que têm suas raízes tanto nas tradições gaúchas quanto nas receitas trazidas 
                                pelos imigrantes. Além disso, a cozinha da região missioneira, com seus aspectos mais urbanos, também contribui para a 
                                diversidade culinária da região. Entre as novidades mais contemporâneas, o bauru gaúcho se destaca como uma adaptação local de 
                                pratos populares, mantendo o toque único da região.
                            </p>
                        </header>
                    </div> 
                </div>

            </div>
        </main>
    </header>
    
@endsection