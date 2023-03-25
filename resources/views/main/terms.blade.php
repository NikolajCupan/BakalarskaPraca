@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/categoryProducts.css')}}">

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <div class="container">
        <div class="offset-xl-2 col-xl-8">
            <h3 class="title text-center mt-5 mb-5">Vseobecne obchodne podmienky</h3>

            <h5 class="title">Obsah</h5>
            <ul class="mb-5">
                <li>I. Zakladne ustanovenia</li>
                <li>II. Informacie o tovare a cenach</li>
                <li>III. Objednavka a uzavretie kupnej zmluvy</li>
                <li>IV. Zakaznicky ucet</li>
                <li>V. Platobne podmienky a dodanie tovaru</li>
                <li>VI. Odstupenie od zmluvy</li>
                <li>VII. Prava z vadneho plnenia</li>
                <li>VIII. Dorucovanie</li>
                <li>IX. Mimosudne riesenie sporov</li>
                <li>X. Zaverecne ostanovenia</li>
            </ul>

            <h5 class="title mt-5">I. Zakladne ustanovenia</h5>
            <p>1. Tieto vseobecne obchodne podmienky (dalej len "obchodne podmienky") su vydane:<br>
               <strong>Firma:</strong> {{\App\Helpers\Constants::COMPANY_NAME}}<br>
               <strong>ICO:</strong> {{\App\Helpers\Constants::COMPANY_ICO}}<br>
               <strong>DIC:</strong> {{\App\Helpers\Constants::COMPANY_DIC}}<br>
               <strong>IC DPH:</strong> {{\App\Helpers\Constants::COMPANY_IC_DPH}}<br>
               <strong>Sidlo:</strong> {{\App\Helpers\Constants::COMPANY_STREET . ' ' . \App\Helpers\Constants::COMPANY_HOUSE_NUMBER . ', ' . \App\Helpers\Constants::COMPANY_POSTAL_CODE . ' ' . \App\Helpers\Constants::COMPANY_CITY}}<br>
               <strong>Telefonne cislo:</strong> {{\App\Helpers\Constants::COMPANY_PHONE_NUMBER}}<br>
               <strong>E-mail:</strong> {{\App\Helpers\Constants::COMPANY_EMAIL}}<br>
               <strong>Webova stranka:</strong> {{\App\Helpers\Constants::COMPANY_WEBSITE}}<br>
               (dalej len "predavajuci").<br><br>
               2. Tieto obchodne podmienky upravuju vzajomne prava a povinnosti predavajuceho a fyzickej osoby, ktora uzatvara kupnu zmluvu mimo svoju podnikatelsku cinnost ako spotrebitel, alebo v ramci svojej podnikatelskej cinnosti (dalej len: "kupujuci") prostrednictvom weboveho rozhrania umiestneneho na webovej stranke dostupneho na internetovej adrese <strong>{{\App\Helpers\Constants::COMPANY_WEBSITE}}</strong> (dalej je "internetovy obchod").<br><br>
               3. Ustanovenia obchodnych podmienok su neoddelitelnou sucastou kupnej zmluvy. Odchylne dojednanie v kupnej zmluve ma prednost pred ustanoveniami tychto obchodnych podmienok.<br><br>
               4. Tieto obchodne podmienky a kupna zmluva sa uzatvaraju v slovenskom jazyku.</p>

            <h5 class="title mt-5">II. Informacie o tovare a cenach</h5>
            <p>1. Informacie o tovare, vratane uvedenia ceny jednotliveho tovaru a jeho hlavnych vlastnosti su uvedene u jednotliveho tovaru v katalogu internetoveho obchodu. Ceny tovaru su uvedene vratane vsetkych suvisiacich poplatkov a nakladov za vratenie tovaru, ak tento tovar zo svojej podstaty nemoze byt vrateny obvyklou postovnou cestou. Ceny tovaru zostavaju v platnosti po dobu, po ktoru su zobrazovane v internetovom obchode. Toto ustanovenie nevylucuje dojednanie kupnej zmluvy za individualne dohodnutych podmienok.<br><br>
               2. Vsetka prezentacia tovaru umiestnena v katalogu internetoveho obchodu je informativneho charakteru a predavajuci nie je povinny uzavriet kupnu zmluvu ohladom tohoto tovaru.<br><br>
               3. V internetovom obchode su zverejnene informacie o nakladoch spojenych s balenim a dodanim tovaru. Informacia o nakladoch spojenych s balenim a dodanim tovaru uvedena v internetovom obchode plati len v pripadoch, ked je tovar dorucovany v ramci uzemia Slovenskej republiky.</p>

            <h5 class="title mt-5">III. Objednavka a uzavretie kupnej zmluvy</h5>
            <p>1. Naklady vzniknute kupujucemu pri pouziti komunikacnych prostriedkov na dialku v suvislosti s uzavretim kupnej zmluvy (naklady na internetove pripojenie, naklady na telefonne hovory), hradi kupujuci sam. Tieto naklady sa nelisia od zakladnej sadzby.<br><br>
               2. Kupujuci vykonava objednavku tovaru prostrednictvom svojho zakaznickeho uctu.<br><br>
               3. Pri zadavani objednavky si kupujuci vyberie tovar a pocet kusov tovaru.<br><br>
               4. Pred odoslanim objednavky je kupujucemu umoznene kontrolovat a menit udaje, ktore do objednavky vlozil. Objednavku odosle kupujuci predavajucemu kliknutim na tlacidlo "Objednat". Udaje uvedene v objednavke su predavajucim povazovane za spravne. Podmienkou platnosti objednavky je vyplnenie vsetkych povinnych udajov v objednavkovom formulari a potvrdenie kupujuceho o tom, ze sa zoznamil s tymito obchodnymi podmienkami.<br><br>
               5. Kupna zmluva je uzavreta az po prijati objednavky predavajucim.<br><br>
               6. V pripade, ze niektoru z poziadaviek uvedenych v objednavke nemoze predavajuci splnit, oznami to kupujucemu prostrednictvom telefonneho cisla zadaneho v objednavke. Pozmenena ponuka sa povazuje za novy navrh kupnej zmluvy a kupna zmluva je v takom pripade uzavreta potvrdenim kupujuceho o prijati tejto ponuky.<br><br>
               7. Vsetky objednavky prijate predavajucim su zavazne. Kupujuci moze zrusit objednavku, pokym nie je objednavka potvrdena predavajucim. Kupujuci moze zrusit objednavku telefonicky na telefonnom cisle predavajuceho uvedenom v tychto obchodnych podmienkach.<br><br>
               8. V pripade, ze doslo ku zjavnej technickej chybe na strane predavajuceho pri uvedeni ceny tovaru v internetovom obchode, alebo v priebehu objednavania, nie je predavajuci povinny dodat kupujucemu tovar za tuto celkom zjavne chybnu cenu ani v pripade, ze objednavka bola potvrdena. Predavajuci informuje kupujuceho o chybe bez zbytocneho odkladu a oznami kupujucemu pozmenenu ponuku. Pozmenena ponuka sa povazuje za novy navrh kupnej zmluvy a kupna zmluva je v takom pripade uzavreta potvrdenim o prijati kupujucim.</p>

            <h5 class="title mt-5">IV. Zakaznicky ucet</h5>
            <p>1. Na zaklade registracie kupujuceho vykonanej v internetovom obchode moze kupujuci pristupovat do svojho zakaznickeho uctu. Zo svojho zakaznickeho uctu moze kupujuci vykonavat objednavanie tovaru.<br><br>
               2. Pri registracii do zakaznickeho uctu a pri objednavani tovaru je kupujuci povinny uvadzat spravne a pravdivo vsetky udaje. Udaje uvedene v uzivatelskom ucte je kupujuci pri akejkolvek ich zmene povinny aktualizovat. Udaje uvedene kupujucim v zakaznickom ucte a pri objednavani tovaru su predavajucim povazovane za spravne.<br><br>
               3. Pristup k zakaznickemu uctu je zabezpeceny uzivatelskym menom a heslom. Kupujuci je povinny zachovavat mlcanlivost ohladom informacii nevyhnutnych k pristupu do jeho zakaznickeho uctu. Predavajuci nenesie zodpovednost za pripadne zneuzitie zakaznickeho uctu tretimi osobami.<br><br>
               4. Kupujuci nie je opravneny umoznit vyuzivanie zakaznickeho uctu tretim osobam.<br><br>
               5. Predavajuci moze zrusit uzivatelsky ucet, a to najma v pripade, ked kupujuci svoj uzivatelsky ucet dlhsie nevyuziva, ci v pripade, kedy kupujuci porusi svoje povinnosti z kupnej zmluvy a tychto obchodnych podmienok.<br><br>
               6. Kupujuci berie na vedomie, ze uzivatelsky ucet nemusi byt dostupny nepretrzite, a to najma s ohladom na nutnu udrzbu hardwaroveho a softwaroveho vybavenia predavajuceho, popr. nutnu udrzbu hardwaroveho a softwaroveho vybavenia tretich osob.</p>

            <h5 class="title mt-5">V. Platobne podmienky a dodanie tovaru</h5>
            <p>1. Cenu tovaru a pripadne naklady spojene s dodanim tovaru podla kupnej zmluvy musi kupujuci zaplatit bezhotovostne prevodom na bankovy ucet predavajuceho uvedeny v tychto obchodnych podmienkach.<br><br>
               2. Spolocne s kupnou cenou je kupujuci povinny zaplatit predavajucemu naklady spojene s balenim a dodanim tovaru v zmluvnej vyske. Ak nie je dalej uvedene vyslovne inak, rozumie sa dalej kupnou cenou aj naklad spojeny s dodanim tovaru.<br><br>
               3. Kupna cena je splatna do 48 hodin od uzavretia kupnej zmluvy.<br><br>
               4. Zavazok kupujuceho je zaplatit kupnu cenu prislusnej sumy na bankovy ucet predavajuceho.<br><br>
               5. Predavajuci nepozaduje od kupujuceho vopred ziadnu zalohu ci inu obdobnu platbu. Uhrada kupnej ceny pred odoslanim tovaru nie je zalohou.<br><br>
               6. Podla zakona o evidencii trzieb je predavajuci povinny vystavit kupujucemu pokladnicny doklad. Zaroven je povinny zaevidovat prijatu trzbu u spravcu dane online, v pripade technickeho vypadku potom najneskor do 48 hodin.<br><br>
               7. Tovar je kupujucemu dodany na adresu urcenu kupujucim v objednavke.<br><br>
               8. Volba dorucovacej adresy sa vykonava v priebehu objednavania tovaru.<br><br>
               9. Naklady na dodanie tovaru su uvedene v objednavke kupujuceho. V pripade, ze je sposob dopravy dohodnuty na zaklade zvlastneho poziadavku kupujuceho, znasa kupujuci riziko a pripadne dodatocne naklady spojene s tymto sposobom dopravy.<br><br>
               10. Ak je predavajuci podla kupnej zmluvy povinny dodat tovar na miesto urcene kupujucim v objednavke, je kupujuci povinny prevziat tovar pri dodani. V pripade, ze je z dovodov na strane kupujuceho nutne tovar dorucovat opakovane alebo inym sposobom, nez bolo uvedene v objednavke, je kupujuci povinny zaplatit naklady spojene s opakovanym dorucovanim tovaru, resp. naklady spojene s inym sposobom dorucenia.<br><br>
               11. Pri prevzati tovaru od prepravcu je kupujuci povinny skontrolovat neporusenost obalov tovaru a v pripade akychkolvek vad toto bezodkladne oznamit prepravcovi. V pripade zistenia porusenia obalu nasvedcujuceho neopravnenemu vniknutiu do zasielky nemusi kupujuci zasielku od prepravcu prevziat.<br><br>
               12. Predavajuci vystavi kupujucemu danovy doklad - fakturu. Danovy doklad je prilozeny k dodavanemu tovaru.<br><br>
               13. Kupujuci nadobuda vlastnicke pravo ku tovaru zaplatenim celej kupnej ceny za tovar, vratane nakladov na dodanie. Zodpovednost za nahodnu stratu, poskodenie ci znicenie tovaru prechadza na kupujuceho okamihom prevzatia tovaru alebo okamihom, kedy mal kupujuci povinnost tovar prevziat, ale v rozpore s kupnou zmluvou tak neurobil.</p>

            <h5 class="title mt-5">VI. Odstupenie od zmluvy</h5>
            <p>1. Kupujuci, ktory uzavrel kupnu zmluvu mimo svoju podnikatelsku cinnost ako spotrebitel, ma pravo od kupnej zmluvy odstupit aj bez uvedenia dovodu.<br><br>
               2. Lehota pre odstupenie od zmluvy predstavuje 14 dni:<br>
               - odo dna prevzatia tovaru,<br>
               - odo dna prevzatia poslednej dodavky tovaru, ak je predmetom zmluvy niekolko druhov tovaru alebo dodanie niekolkych casti,<br>
               - odo dna prevzatia prvej dodavky tovaru, ak je predmetom zmluvy pravidelna opakovana dodavka tovaru.<br><br>
               3. Kupujuci nemoze okrem ineho odstupit od kupnej zmluvy:<br>
               - o poskytovani sluzieb, ak boli splnene s jeho predchadzajucim vyslovnym suhlasom pred uplynutim lehoty pre odstupenie od zmluvy a predavajuci pred uzavretim zmluvy oznamil kupujucemu, ze v takom pripade nema pravo na odstupenie od zmluvy a ak doslo k uplnemu poskytnutiu sluzby,<br>
               - o dodavke tovaru alebo sluzby, ktorych cena zavisi na vykyvoch financneho trhu nezavisle na voli predavajuceho a ku ktoremu moze dojst v priebehu lehoty pre odstupenie od zmluvy,<br>
               - o dodani alkoholickych napojov, ktorych cena bola dohodnuta v case uzavretia zmluvy, ktore mozu byt dodane az po uplynuti tridsiatich dni a ktorych cena zavisi na vykyvoch trhu nezavislych na voli predavajuceho,<br>
               - o dodavke tovaru, ktory bol upraveny podla priania kupujuceho, tovaru vyrobeneho na mieru alebo tovaru urceneho osobitne pre jedneho kupujuceho,<br>
               - o dodavke tovaru, ktory podlieha rychlej skaze, ako aj tovaru, ktory bol po dodani vzhladom na svoju povahu nenavratne zmiesany s inym tovarom,<br>
               - o dodavke tovaru v uzavretom obale, ktory nie je vhodne vratit z dovodov ochrany zdravia alebo z hygienickych dovodov a ktoreho ochranny obal bol po dodani poruseny,<br>
               - o dodavke zvukovych zaznamov, obrazovych zaznamov, zvukovoobrazovych zaznamov, knih alebo pocitacoveho softveru, ak su predavane v ochrannom obale a kupujuci tento obal rozbalil,<br>
               - o dodavke novin, periodik alebo casopisov s vynimkou predaja na zaklade dohody o predplatnom a predaji knih nedodavanych v ochrannom obale,<br>
               - o dodavke elektronickeho obsahu inak ako na hmotnom nosici, ak sa jeho poskytovanie zacalo s vyslovnym suhlasom kupujuceho a kupujuci vyhlasil, ze bol riadne pouceny o tom, ze vyjadrenim tohoto suhlasu straca pravo na odstupenie od zmluvy,<br>
               - v dalsich pripadoch uvedenych v SS 7 ods. 6 zakona c. 102/2014 Z. z. o ochrane spotrebitela pri predaji tovaru alebo poskytovani sluzieb na zaklade zmluvy uzavretej na dialku alebo zmluvy uzavretej mimo prevadzkovych priestorov predavajuceho v zneni neskorsich predpisov.<br><br>
               4. Pre dodrzanie lehoty pre odstupenie od zmluvy musi kupujuci odoslat prehlasenie o odstupeni v lehote pre odstupenie od zmluvy.<br><br>
               5. Odstupenie od kupnej zmluvy zasle kupujuci na emailovu alebo dorucovaciu adresu predavajuceho uvedenu v tychto obchodnych podmienkach. Predavajuci potvrdi kupujucemu bezodkladne prijatie formulara.<br><br>
               6. Kupujuci, ktory odstupil od zmluvy, je povinny vratit predavajucemu tovar do 14 dni od odstupenia od zmluvy. Kupujuci znasa naklady spojene s vratenim tovaru predavajucemu, a to i v tom pripade, ak tovar nemoze byt vrateny pre svoju povahu obvyklou postovnou cestou.<br><br>
               7. Ak odstupi kupujuci od zmluvy, vrati mu predavajuci bezodkladne, najneskor vsak do 14 dni od odstupenia od zmluvy, vsetky penazne prostriedky vratane nakladov na dodanie, ktore od neho prijal, a to rovnakym sposobom. Predavajuci vrati kupujucemu prijate penazne prostriedky inym sposobom len vtedy, ak s tym kupujuci suhlasi a ak mu tym nevzniknu dalsie naklady.<br><br>
               8. Ak kupujuci zvolil iny nez najlacnejsi sposob dodania tovaru, ktory predavajuci ponuka, vrati predavajuci kupujucemu naklady na dodanie tovaru vo vyske zodpovedajucej najlacnejsiemu ponukanemu sposobu dodania tovaru.<br><br>
               9. Ak odstupi kupujuci od kupnej zmluvy, nie je predavajuci povinny vratit prijate penazne prostriedky kupujucemu skor, nez mu kupujuci tovar odovzda alebo preukaze, ze tovar predavajucemu odoslal.<br><br>
               10. Tovar musi vratit kupujuci predavajucemu neposkodeny, neopotrebovany a neznecisteny a ak je to mozne, v povodnom obale. Narok na nahradu skody vzniknutej na tovare je predavajuci opravneny jednostranne zapocitat proti naroku kupujuceho na vratenie kupnej ceny.<br><br>
               11. Predavajuci je opravneny odstupit od kupnej zmluvy z dovodu vypredania zasob, nedostupnosti tovaru, alebo ked vyrobca, dovozca alebo dodavatel tovaru prerusil vyrobu alebo dovoz tovaru. Predavajuci bezodkladne informuje kupujuceho prostrednictvom telefonneho cisla uvedeneho v objednavke a vrati v lehote 14 dni od oznamenia o odstupenie od kupnej zmluvy vsetky penazne prostriedky vratane nakladov na dodanie, ktore od neho na zaklade zmluvy prijal, a to rovnakym sposobom, popripade sposobom urcenym kupujucim.</p>

            <h5 class="title mt-5">VII. Prava z vadneho plnenia</h5>
            <p>1. Predavajuci zodpoveda kupujucemu, ze tovar pri prevzati nema vady. Najma predavajuci zodpoveda kupujucemu, ze v dobe, kedy kupujuci tovar prevzal:<br>
               - ma tovar vlastnosti, ktore si strany dojedali, a ak chyba dojednanie, ma take vlastnosti, ktore predavajuci alebo vyrobca popisal alebo ktore kupujuci ocakaval s ohladom na povahu tovaru a na zaklade reklamy predavajucim vykonanej,<br>
               - sa tovar hodi k ucelu, ktory pre jeho pouzitie predavajuci uvadza alebo ku ktoremu sa tovar tohoto druhu obvykle pouziva,<br>
               - tovar zodpoveda akosti alebo prevedeniu dohodnutej vzorky alebo predlohy, ak bola akost alebo prevedenie urcene podla dohodnutej vzorky alebo predlohy,<br>
               - je tovar v zodpovedajucom mnozstve alebo hmotnosti<br>
               - a tovar vyhovuje poziadavkam pravnych predpisov.<br><br>
               2. Ak sa vada prejavi v priebehu siestich mesiacov od prevzatia tovaru kupujucim, ma sa za to, ze tovar bol vadny uz pri prevzati. Kupujuci je opravneny uplatnit prava z vady, ktora sa vyskytne u spotrebneho tovaru v dobe 24 mesiacov od prevzatia. Toto ustanovenie sa nepouzije u tovaru predavaneho za nizsiu cenu pre vadu, pre ktoru bola nizsia cena dohodnuta, na opotrebenie tovaru sposobene jeho obvyklym uzivanim, u pouziteho tovaru pre vadu zodpovedajucu miere pouzivania alebo opotrebenia, ktoru tovar mal pri prevzati kupujucim, alebo ak to vyplyva z povahy tovaru.<br><br>
               3. V pripade vyskytu vady moze kupujuci predavajucemu predlozit reklamaciu a pozadovat, ak ide o vadu, ktoru je mozne odstranit:<br>
               - bezplatne odstranenie vady tovaru,<br>
               - vymenu tovaru za novy tovar.<br><br>
               4. V pripade vyskytu vady moze kupujuci predavajucemu predlozit reklamaciu a pozadovat, ak ide o vadu, ktoru nemozno odstranit:<br>
               - primeranu zlavu z kupnej ceny,<br>
               - odstupit od zmluvy.<br><br>
               5. Kupujuci ma pravo odstupit od zmluvy:<br>
               - ak ma tovar vadu, ktoru nemozno odstranit a ktora brani tomu, aby sa vec mohla riadne uzivat ako vec bez vady,<br>
               - ak nemoze tovar riadne uzivat pre opakovany vyskyt vady alebo vad po oprave,<br>
               - ak nemoze riadne tovar uzivat pre vacsi pocet vad tovaru.<br><br>
               6. Predavajuci je povinny prijat reklamaciu v ktorejkolvek prevadzkarni, v ktorej je prijatie reklamacie mozne, pripadne i v sidle alebo mieste podnikania. Spotrebitel moze reklamaciu uplatnit aj u osoby urcenej predavajucim. Ak reklamaciu spotrebitela vybavuje osoba urcena predavajucim, tato moze reklamaciu vybavit iba odovzdanim opraveneho tovaru, inak reklamaciu postupi na vybavenie predavajucemu. Predavajuci je povinny kupujucemu vydat pisomne potvrdenie o tom, kedy kupujuci pravo uplatnil, co je obsahom reklamacie a aky sposob vybavenia reklamacie kupujuci pozaduje, ako aj potvrdenie o datume a sposobe vybavenia reklamacie, vratane potvrdenia o vykonani opravy a dobe jej trvania, pripadne pisomne odovodnenie zamietnutia reklamacie.<br><br>
               7. Ak spotrebitel uplatni reklamaciu, predavajuci alebo nim povereny zamestnanec alebo urcena osoba je povinny poucit spotrebitela o jeho pravach vyplyvajucich z vadneho plnenia. Na zaklade rozhodnutia spotrebitela, ktore z prav vyplyvajucich mu z vadneho plnenia si uplatnuje, je predavajuci alebo nim povereny pracovnik alebo urcena osoba povinny urcit sposob vybavenia reklamacie ihned, v zlozitych pripadoch najneskor do 3 pracovnych dni odo dna uplatnenia reklamacie v odovodnenych pripadoch, najma ak sa vyzaduje zlozite technicke zhodnotenie stavu tovaru, najneskor do 30 dni odo dna uplatnenia reklamacie. Po urceni sposobu vybavenia reklamacie sa reklamacia vratane odstranenia vady musi vybavit ihned, pricom v odovodnenych pripadoch mozno reklamaciu vybavit aj neskor. Vybavenie reklamacie vratane odstranenia vady vsak nesmie trvat dlhsie ako 30 dni odo dna uplatnenia reklamacie. Marne uplynutie tejto lehoty sa povazuje za podstatne porusenie zmluvy a kupujuci ma pravo od kupnej zmluvy odstupit alebo ma pravo na vymenu tovaru za novy tovar. Za okamih uplatnenia reklamacie sa povazuje moment, kedy dojde prejav vole kupujuceho (uplatnenie prava z vadneho plnenia) predavajucemu.<br><br>
               8. Predavajuci pisomne informuje kupujuceho o vysledku reklamacie, a to najneskor do 30 dni odo dna uplatnenia reklamacie.<br><br>
               9. Pravo z vadneho plnenia kupujucemu nepatri, ak kupujuci pred prevzatim veci vedel, ze vec ma vadu, alebo ak kupujuci vadu sam sposobil.<br><br>
               10. V pripade opravnenej reklamacie ma kupujuci pravo na nahradu ucelne vynalozenych nakladov vzniknutych v suvislosti s uplatnenim reklamacie. Toto pravo moze kupujuci u predavajuceho uplatnit v lehote do jedneho mesiaca po uplynuti zarucnej doby.<br><br>
               11. Volbu sposobu reklamacie a jej vybavenia, ak je viacero moznosti, ma kupujuci.<br><br>
                12. Prava a povinnosti zmluvnych stran ohladom prav z vadneho plnenia sa riadia SS 499 az 510, SS 596 az 600 a SS 619 az 627 zakona c. 40/1964 Zb. Obcianskeho zakonnika v zneni neskorsich predpisov a zakonom c. 250/2007 Z. z., o ochrane spotrebitela v zneni neskorsich predpisov.</p>

            <h5 class="title mt-5">VIII. Dorucovanie</h5>
            <p>1. Zmluvne strany si mozu vsetku pisomnu korespondenciu vzajomne dorucovat prostrednictvom elektronickej posty.<br><br>
               2. Kupujuci dorucuje predavajucemu korespondenciu na emailovu adresu uvedenu v tychto obchodnych podmienkach. Predavajuci dorucuje kupujucemu korespondenciu na emailovu adresu uvedenu v jeho zakaznickom ucte.</p>

            <h5 class="title mt-5">IX. Mimosudne riesenie sporov</h5>
            <p>1. Spotrebitel ma pravo obratit sa na predavajuceho so ziadostou o napravu, ak nie je spokojny so sposobom, ktorym predavajuci vybavil jeho reklamaciu alebo ak sa domnieva, ze predavajuci porusil jeho prava. Spotrebitel ma pravo podat navrh na zacatie alternativneho (mimosudneho) riesenia sporu u subjektu alternativneho riesenia sporov, ak predavajuci na ziadost podla predchadzajucej vety odpovedal zamietavo alebo na nu neodpovedal do 30 dni odo dna jej odoslania. Tymto nie je dotknuta moznost spotrebitela obratit sa na sud.<br><br>
               2. K mimosudnemu rieseniu spotrebitelskych sporou z kupnej zmluvy je prislusna Slovenska obchodna inspekcia, so sidlom Prievozska 32, 827 99 Bratislava, ICO 17 331 927, ktoru je mozne za uvedenym ucelom kontaktovat na adrese Slovenska obchodna inspekcia, Ustredny inspektorat, Odbor medzinarodnych vztahov a alternativneho riesenia sporov, Prievozska 32, 827 99 Bratislava 27, alebo elektronicky na ars@soi.sk alebo adr@soi.sk. Internetova adresa https://www.soi.sk/. Platformu pre riesenie sporov on-line nachadzajucu sa na internetovej adrese http://ec.europa.eu/consumers/odr je mozne vyuzit pri rieseni sporov medzi predavajucim a kupujucim z kupnej zmluvy.<br><br>
               3. Europske spotrebitelske centrum Slovenska republika, so sidlom Mlynske nivy 44/a, 827 15 Bratislava, internetova adresa http://esc-sr.sk/ je kontaktnym miestom podla Nariadenia Europskeho parlamentu a Rady (EU) c. 524/2013 z 21. maja 2013 o rieseni spotrebitelskych sporov on-line a o zmene nariadenia (ES) c. 2006/2004 a smernice 2009/22/ES (nariadenie o rieseni spotrebitelskych sporov on-line).</p>

            <h5 class="title mt-5">X. Zaverecne ostanovenia</h5>
            <p>1. Vsetky dojednania medzi predavajucim a kupujucim sa spravuju pravnym poriadkom Slovenskej republiky. Ak vztah zalozeny kupnou zmluvou obsahuje medzinarodny prvok, strany sa dohodli, ze vztah sa riadi pravom Slovenskej republiky. Tymto nie su dotknute prava spotrebitela vyplyvajuce zo vseobecne zavaznych pravnych predpisov.<br><br>
               2. Predavajuci nie je vo vztahu ku kupujucemu viazany ziadnymi kodexmi spravania v zmysle ustanoveni zakona c. 250/2007 Z. z. o ochrane spotrebitela v zneni neskorsich predpisov.<br><br>
               3. Vsetky prava k webovym strankam predavajuceho, najma autorske prava k obsahu, vratane rozvrhnutia stranky, fotiek, filmov, grafiky, ochrannych znamok, loga a dalsieho obsahu a prvkov, prinalezi predavajucemu. Je zakazane kopirovat, upravovat alebo inak pouzivat webove stranky alebo ich cast bez suhlasu predavajuceho.<br><br>
               4. Predavajuci nenesie zodpovednost za chyby vzniknute v dosledku zasahu tretich osob do internetoveho obchodu alebo v dosledku jeho pouzitia v rozpore s jeho urcenim. Kupujuci nesmie pri vyuzivani internetoveho obchodu pouzivat postupy, ktore by mohli mat negativny vplyv na jeho prevadzku a nesmie vykonavat ziadnu cinnost, ktora by mohla jemu alebo tretim osobam umoznit neopravnene zasahovat ci neopravnene uzivat programove vybavenie alebo dalsie sucasti tvoriace internetovy obchod a uzivat internetovy obchod alebo jeho casti ci softwarove vybavenie takym sposobom, ktory by bol v rozpore s jeho urcenim ci ucelom.<br><br>
               5. Kupna zmluva vratane obchodnych podmienok je archivovana predavajucim v elektronickej podobe a nie je verejne pristupna.<br><br>
               6. Znenie obchodnych podmienok moze predavajuci menit ci doplnat. Tymto ustanovenim nie su dotknute prava a povinnosti vzniknute po dobu ucinnosti predchadzajuceho znenia obchodnych podmienok.<br><br>
               7. Prilohou obchodnych podmienok je vzorovy formular pre odstupenie od zmluvy.</p>

            <p class="mt-5"><strong>Tieto obchodne podmienky nadobudaju ucinnost dnom 31. 01. 2023.</strong></p>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
