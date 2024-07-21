<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('checklists')->insert([
            [
                'texto' => '<p>INFORMA&Ccedil;&Atilde;O e/ou SOLICITA&Ccedil;&Atilde;O EXTRA DOCUMENTO (EMAIL / LIGA&Ccedil;&Atilde;O / W. ZAP / O. SERVI&Ccedil;O / PCP DI&Aacute;RIO)</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">PROJETO ou AMOSTRA</span> (fazer soma das cotas) / LEGENDA DOS TIPOS DE A&Ccedil;O / ARRANJO (DISTRIBUI&Ccedil;&Atilde;O) POSSUI 10mm ENTRE CAIXAS / <span style="background-color:#66ab16">VERIFICAR TRAVAS MACHO E F&Ecirc;MEA</span></p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">TIPO DE M&Aacute;QUINA</span> / TIPO DE F&Ocirc;RMA (CV ou PARCIAL)</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">ENTRADA DE M&Aacute;QUINA</span> e APLICA&Ccedil;&Atilde;O DO VINCO</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">DILATA&Ccedil;&Atilde;O</span> <span style="color:#e74c3c"><span style="background-color:#ffff00">ATENC&Atilde;O P/ ESPECIFICA&Ccedil;&Otilde;ES DE CADA M&Aacute;QUINA E UNIDADE DA KLABIN</span></span></p>

 <p>KLABIN-PE:</p>

 <ul>
 	<li>M&Aacute;QUINA DRO (0,962 <span style="color:#e74c3c">N&Atilde;O SE APLICA COMPENSA&Ccedil;&Atilde;O</span>)</li>
 	<li>M&Aacute;QUINAS D. 487,3 (0,961 <span style="color:#e74c3c">N&Atilde;O SE APLICA COMPENS&Atilde;O NOS CASOS ONDA DUPLA</span>) APLICAR REDU&Ccedil;&Otilde;ES DE <span style="color:#e74c3c">(-2mm)</span> EM CASOS COM GRAMATURA DE (9) e/ou SUPERIOR. J&Aacute; NOS CASOS DE GRAMATURA ABAIXO DE (9) COM PAPEIS (B <span style="color:#e74c3c">ou</span> C <span style="color:#e74c3c">ou</span> E) APLICAR REDU&Ccedil;&Atilde;O <span style="color:#e74c3c">(-3mm).</span></li>
 </ul>

 <p>KLABIN-BA:</p>

 <ul>
 	<li>M&Aacute;QUINAS D.487,3 (0,961 <span style="color:#e74c3c">N&Atilde;O SE APLICA COMPENSA&Ccedil;&Atilde; NOS CASOS ONDA DUPLA</span>) APLICAR REDU&Ccedil;&Otilde;ES DE <span style="color:#e74c3c">(-2mm)</span> EM CASOS COM GRAMATURA DE (9) e/ou SUPERIOR. J&Aacute; NOS CASOS DE GRAMATURA ABAIXO DE 9 COM PAPEIS (E, B ou C), APLICAR REDU&Ccedil;&Atilde;O <span style="color:#e74c3c">(-3mm).</span></li>
 </ul>

 <p>KLABIN-CE:</p>

 <ul>
 	<li>M&Aacute;QUINA DRO (0,962 <span style="color:#e74c3c">N&Atilde;O SE APLICA COMPENSA&Ccedil;&Atilde;O</span>)</li>
 	<li>M&Aacute;QUINAS D. 487 CONVENCIONAIS (0,964 <span style="color:#e74c3c">N&Atilde;O SE APLICA COMPENSA&Ccedil;&Atilde;O</span>)&nbsp;</li>
 </ul>

 <p>PARA TODAS KLABINS:</p>

 <ul>
 	<li><span style="color:#2980b9">APLICAR (-0,5mm) NA ENTRADA EM CASOS DE CANTONEIRAS DE FRUTAS DE ALTA VENTILA&Ccedil;&Atilde;O, NESTL&Eacute;, MARAT&Aacute; NOS ARRANJOS (2x2 / 2x3).&nbsp;</span></li>
 	<li><span style="color:#e74c3c">N&Atilde;O SE APLICA COMPENSA&Ccedil;&Atilde;O NOS CASOS TABULEIRO / ENGEPACK / PLASTIPACK OU MODELOS DE EMBALAGENS SEMELHANTES. DEVIDO HIST&Oacute;RICOS DE CAIXAS MENOR, FICA PERMITIDO UMA COMPENSA&Ccedil;&Atilde;O DE -APENAS- DE (+1mm).</span></li>
 </ul>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">ESPELHAMENTO</span> (OBS. M&Aacute;QUINA MARTIN D.177 DA KLABIN N&Atilde;O SE ESPELHA NOS CASOS DE F&Ocirc;RMAS PARCIAIS, VERIFICAR SE EXISTE MODELO DE MONTAGEM J&Aacute; DEFINIDO PELA CLICHERIA KLABIN FEIRA.)</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">REFILES em L</span> (30mm) / REFILES FECHADOS 50x50* (TAM. M&Aacute;X) / DIST. 65 &agrave; 75mm</p>

 <p><span style="background-color:#66ffff">NR NETA: JUN&Ccedil;&Otilde;ES DE ARRANJO COM CONFIGURA&Ccedil;&Atilde;O DE ANGULO 0 (SOLICITAR ALTERA&Ccedil;&Atilde;O P/ ENGENHARIA e CLICH.)</span></p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">PONTES</span> <span style="background-color:#ffff00">OBS GERAL: SEGUIR DISTANCIAMENTO COM NRT COM M&Iacute;NIMO DE 54mm, COM EXCESS&Otilde;ES DOS CASOS DE L&Acirc;MINAS DE CORTE DA ENTRADA ou SA&Iacute;DA ou EMENDA DE CALHA QUE POSSUEM DISTANCIAMENTO ABAIXO DE 70. NESTES CASOS AUMENTAR QUANTITATIVO P/ REFOR&Ccedil;O DA MADEIRA.</span></p>

 <ul>
 	<li><span style="background-color:#ffcc99">PONTES NAS EXTREMIDADES DOS VINCOS E PICOTES (+- 10mm) P/ REFOR&Ccedil;O DA MADEIRA</span></li>
 	<li><span style="background-color:#66ccff">PONTES NOS A&Ccedil;OS DA EMENDA DE CALHAS 7mm / VAZADORES PONTES com 7mm.</span></li>
 	<li><span style="background-color:#2ecc71">A&Ccedil;OS MENOR DO QUE 30mm VERIFICAR NECESSIDADE DE APLICA&Ccedil;&Atilde;O JUNTO COM O T&Eacute;CNICO DE MONTAGEM.</span></li>
 </ul>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">FURA&Ccedil;&Atilde;O</span>&nbsp;<span style="color:#cf5d4e"><span style="background-color:#ffff00">ACESS&Oacute;RIO PL</span></span></p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">SERRAPID</span>&nbsp;<span style="color:#cf5d4e"><span style="background-color:#ffff00">(SEGUIR PARAMETRO LINHA DE EMENDA)</span></span></p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>ARCOS/POSILOCK</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>RASGOS &lsquo;&lsquo;V&rsquo;&rsquo;</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>CENTRO/COTAS</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>CAL&Ccedil;OS FRANC&Ecirc;S / NETA / S</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>PCT BBREACK / NICK / 3x3 / PIC</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>NOMES / IDENTIFICA&Ccedil;&Otilde;ES T&Eacute;CNICAS (GRAVA&Ccedil;&Atilde;O NA MADEIRA ou IMPRESS&Atilde;O)?</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>&lsquo;&lsquo;BOLHA&rsquo;&rsquo; NAS EMENDA</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>AL&Ccedil;A OPERACIONAL</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>OP DE PRODU&Ccedil;&Atilde;O / PROJETO</p>',
                'tipo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>INFORMA&Ccedil;&Atilde;O e/ou SOLICITA&Ccedil;&Atilde;O EXTRA DOCUMENTO (EMAIL / LIGA&Ccedil;&Atilde;O / W. ZAP / O. SERVI&Ccedil;O / PCP DI&Aacute;RIO)</p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">PROJETO ou AMOSTRA</span> (fazer soma das cotas) / LEGENDA DOS TIPOS DE A&Ccedil;O / ARRANJO (DISTRIBUI&Ccedil;&Atilde;O) POSSUI 10mm ENTRE CAIXAS / <span style="background-color:#66ab16">VERIFICAR TRAVAS MACHO E F&Ecirc;MEA</span></p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">TIPO DE M&Aacute;QUINA</span> / TIPO DE F&Ocirc;RMA (CV ou PARCIAL)</p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>ENTRADA DE M&Aacute;QUINA</p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>APLICA&Ccedil;&Atilde;O DO VINCO em &lsquo;&lsquo;V&rsquo;&rsquo;&nbsp;<span style="color:#cf5d4e"><span style="background-color:#ffff00">ECOCAIXAS APLICAR NA ENTRADA e SA&Iacute;DA</span></span></p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">ESPELHAMENTO</span> <span style="color:#cf5d4e"><span style="background-color:#ffff00">SEGUIR VISTA EXTERNA DO PROJETO APROVADO OU AMOSTRA</span></span></p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">REFILES</span> BSC. (30mm <span style="color:#cf5d4e"><span style="background-color:#ffff00">PODENDO SER AT&Eacute; (20 ou 15) DE ACORDO COM O APROVEITAMENTO DA MADEIRA)</span></span></p>

 <p>REFILES FECHADOS<span style="color:#cf5d4e">*</span> (65x70 70x80 TAM. M&Aacute;X) / DIST. 65 &agrave; 75mm</p>

 <p><span style="background-color:#cceaee">NR NETA: JUN&Ccedil;&Otilde;ES DE ARRANJO COM CONFIGURA&Ccedil;&Atilde;O DE ANGULO 0 (SOLICITAR ALTERA&Ccedil;&Atilde;O P/ CLIENTE)</span></p>

 <p><span style="color:#cf5d4e"><span style="background-color:#ffff00">*REFILES FECHADOS 50x50mm (PENHA / SAPELBA e KLABIN)</span></span></p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">FURA&Ccedil;&Atilde;O&nbsp;</span></p>

 <p><span style="color:#cf5d4e"><span style="background-color:#ffff00">ATEN&Ccedil;&Atilde;O P/ FURA&Ccedil;&Atilde;O OSCILANTE DA M&Aacute;Q. (JIALONG D.360) DA FC OLIVEIRA </span></span></p>

 <p><span style="color:#cf5d4e"><span style="background-color:#ffff00">CONSULTAR SOBRE ACESS&Oacute;RIOS PL (APLICAR PARCIAL P/ ECOCAIXAS)</span></span></p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">CENTRO / COTAS&nbsp;</span><span style="color:#cf5d4e"><span style="background-color:#ffff00">F&Ocirc;RMAS PARCIAIS CONPEL SEGUIR LINHA DE CENTRO PELA CAIXA</span></span></p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="background-color:#ffff00"><span style="font-size:20px">CAL&Ccedil;OS S</span>: DEVE SE APLICAR EM TODO CASO QUE POSSUE DISTANCIAMENTO DA MADEIRA E L&Acirc;MINA DE CORTE MENOR ou IGUAL A (50mm - <span style="color:#cf5d4e">AL&Eacute;M DO AUMENTO DE PONTES</span>)</span></p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>&lsquo;&lsquo;BOLHA&rsquo;&rsquo; DE EMENDA</p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>AL&Ccedil;A OPERACIONAL <span style="color:#cf5d4e">(APLICAR PQN PONTE P/ PROCESSO DA CNC)</span></p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>CAL&Ccedil;OS FRANC&Ecirc;S</p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>CAL&Ccedil;OS S*</p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>ORD. DE PRODU&Ccedil;&Atilde;O / PROJETO</p>',
                'tipo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>INFORMA&Ccedil;&Atilde;O e/ou SOLICITA&Ccedil;&Atilde;O EXTRA DOCUMENTO (EMAIL / LIGA&Ccedil;&Atilde;O / W. ZAP / O. SERVI&Ccedil;O / PCP DI&Aacute;RIO)</p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">PROJETO ou AMOSTRA</span> (fazer soma das cotas) / LEGENDA DOS TIPOS DE A&Ccedil;O / ARRANJO (DISTRIBUI&Ccedil;&Atilde;O) POSSUI 10mm ENTRE CAIXAS / <span style="background-color:#66ab16">VERIFICAR TRAVAS MACHO E F&Ecirc;MEA</span></p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">TIPO DE M&Aacute;QUINA</span> / TIPO DE F&Ocirc;RMA (CV ou PARCIAL)</p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">ENTRADA DE M&Aacute;QUINA</span> e APLICA&Ccedil;&Atilde;O DO VINCO</p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">DILATA&Ccedil;&Atilde;O</span> <span style="color:#cf5d4e"><span style="background-color:#ffff00">ATENC&Atilde;O P/ COMPENSA&Ccedil;&Atilde;O DIFERENCIADA DE ALGUNS MODELOS</span></span></p>

 <ul>
 	<li>NISSIN / BUNGE / GP ITAPISSUMA - <span style="color:#e74c3c">(VER QUADRO DE COMPENSA&Ccedil;&Atilde;O)</span></li>
 	<li>PISOS MODELO CERAMUS <span style="color:#e74c3c">(NECESS&Aacute;RIO PRODUZIR A MATRIZ EM DUAS CALHAS, SENDO QUE A CALHA MENOR PRECISA APLICAR ARRUELAS OBLONGADA MENOR EM TODAS AS FURA&Ccedil;&Otilde;ES - MANTENDO QUANTIDADES PONTUAIS NA CALHA MAIOR )</span></li>
 	<li>PISO MODELO ALONGADO <span style="color:#e74c3c">Apenas nos casos com 10mm de refiles entre caixas aplicar (- 1mm) em cada aba.</span></li>
 </ul>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">ESPELHAMENTO</span></p>

 <ul>
 	<li>OBS. SEGUIR MODELO DE ESPELHAMENTO VISTA EXTERNA DO PROJETO PENHA</li>
 	<li><span style="color:#cf5d4e">A M&Aacute;QUINA M MINI LINE (MARTIN 618 - D.177) PRODUZIDA NA VISTA INTERNA!!!</span></li>
 </ul>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">REFILES</span> BSC. CURVO (40mm) / REFILES FECHADOS 50x50<span style="color:#cf5d4e">*</span> (TAM. M&Aacute;X) / DIST. 65 &agrave; 75mm</p>

 <p><span style="background-color:#cceaee">NR NETA: JUN&Ccedil;&Otilde;ES DE ARRANJO COM CONFIGURA&Ccedil;&Atilde;O DE ANGULO 0 (SOLICITAR ALTERA&Ccedil;&Atilde;O P/ ENGENHARIA e CLICH.)</span></p>

 <p><span style="color:#cf5d4e"><span style="background-color:#cceaee">*REFILES FECHADOS 50x50mm (PENHA / SAPELBA e KLABIN)</span></span></p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">PONTES</span>&nbsp;<span style="background-color:#ffff00">OBS GERAL: SEGUIR DISTANCIAMENTO COM NRT COM M&Iacute;NIMO DE 54mm, COM EXCESS&Otilde;ES DOS CASOS DE L&Acirc;MINAS DE CORTE DA ENTRADA ou SA&Iacute;DA ou EMENDA DE CALHA QUE POSSUEM DISTANCIAMENTO ABAIXO DE 70. NESTES CASOS AUMENTAR QUANTITATIVO P/ REFOR&Ccedil;O DA MADEIRA.</span></p>

 <p><span style="background-color:#ff9999">APLICA&Ccedil;&Atilde;O NOS A&Ccedil;OS DA EMENDA / VAZADORES COM PONTES DE 5mm. REDU&Ccedil;&Atilde;O DE VINCO -10</span></p>

 <p><span style="background-color:#3498db">A&Ccedil;OS MENOR DO QUE 30mm VERIFICAR NECESSIDADE DE APLICA&Ccedil;&Atilde;O JUNTO COM O T&Eacute;CNICO DE MONTAGEM.</span></p>

 <p><span style="background-color:#2ecc71">AUMENTAR QUANTIDADE DE PONTES NOS CASOS DE PISOS &lsquo;&lsquo;ALONGADOS&rsquo;&rsquo;</span></p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">FURA&Ccedil;&Atilde;O</span>&nbsp;<span style="color:#cf5d4e"><span style="background-color:#ffff00">ACESS&Oacute;RIO PL</span></span></p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">SERRAPID&nbsp;</span><span style="color:#cf5d4e"><span style="background-color:#ffff00">(SEGUIR PAR&Acirc;METRO DA POSI&Ccedil;&Atilde;O DA ENTRADA)</span></span></p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>CENTRO/COTAS</p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>CAL&Ccedil;OS S*</p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>CAL&Ccedil;OS FRANC&Ecirc;S</p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>OBS.PENHA UTILIZA CAL&Ccedil;OS FRANC&Ecirc;S, MAIS PODE UTILIZAR TBM AMERICANO</p>

 <p><span style="background-color:#ffff00"><span style="color:#cf5d4e">*</span>CAL&Ccedil;OS S: DEVE SE APLICAR EM TODO CASO QUE POSSUE DISTANCIAMENTO DA MADEIRA E L&Acirc;MINA DE CORTE MENOR DO QUE 75mm <span style="color:#cf5d4e">(AL&Eacute;M DO AUMENTO DE PONTES)</span></span></p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>&lsquo;&lsquo;BOLHA&rsquo;&rsquo; DE EMENDA</p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>AL&Ccedil;A OPERACIONAL <span style="color:#cf5d4e">(APLICAR PQN PONTE P/ PROCESSO DA CNC)</span></p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>ORD. DE PRODU&Ccedil;&Atilde;O / PROJETO</p>',
                'tipo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>INFORMA&Ccedil;&Atilde;O e/ou SOLICITA&Ccedil;&Atilde;O EXTRA DOCUMENTO (EMAIL / LIGA&Ccedil;&Atilde;O / W. ZAP / O. SERVI&Ccedil;O / PCP DI&Aacute;RIO)</p>',
                'tipo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">PROJETO ou AMOSTRA</span> (fazer soma das cotas) / LEGENDA DOS TIPOS DE A&Ccedil;O / ARRANJO (DISTRIBUI&Ccedil;&Atilde;O) POSSUI 10mm ENTRE CAIXAS / <span style="background-color:#66ab16">VERIFICAR TRAVAS MACHO E F&Ecirc;MEA</span></p>',
                'tipo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">ESPELHAMENTO</span></p>

 <p>DEVIDO AO PROCESSO DE CORTE A LASER, CASOS EM GERAL DEVER&Aacute; SER FEITA A LIBERA&Ccedil;&Atilde;O NA <span style="color:#cf5d4e">VISTA INTERNA</span> E MONTADA NA <span style="color:#cf5d4e">VISTA EXTERNA!!!</span> AS <span style="color:#cf5d4e">L&Acirc;MINAS</span> DEVER&Atilde;O SER TIRADAS NA <span style="color:#cf5d4e">VISTA EXTERNA!!</span></p>',
                'tipo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">ESPELHAMENTO</span>:<span style="color:#cf5d4e"> ATENC&Atilde;O P/ ESPECIFICA&Ccedil;&Otilde;ES DE CADA CLIENTE</span></p>

 <p>NOGGRAF: <span style="color:#0033ff">ESTAR ATENTO AO TIPO DE PAPEL ULTILIZADO INDICADO NO DESENHO T&Eacute;CNICO!</span></p>

 <ul>
 	<li>ONDA: <span style="color:#cf5d4e">DUPLEX</span> <span style="color:#66ab16">A FACA DEVER&Aacute; SER LIBERADA PARA A LASER NA VISTA EXTERNA PARA SER MONTADA NA</span> <span style="color:#cf5d4e">INTERNA!!</span> - INFORMA&Ccedil;&Atilde;O V&Aacute;LIDA PARA A LIBERA&Ccedil;&Atilde;O DE <span style="color:#cf5d4e">L&Acirc;MINAS</span> DEVER&Aacute; SER TIRADAS NA <span style="color:#cf5d4e">VISTA INTERNA!!</span></li>
 	<li>ONDA: DEMAIS TIPOS DE PAPEL COMO - <span style="color:#0033ff">MICRO ONDULADO, MICRO ONDULADO DUPLEX, ONDA &lsquo;&lsquo;B&rsquo;&rsquo; , ONDA &lsquo;&lsquo;BC&rsquo;&rsquo;</span> - <span style="color:#66ab16">A FACA DEVER&Aacute; SER LIBERADA PARA A LASER NA VISTA INTERNA PARA SER MONTADA NA</span> <span style="color:#cf5d4e">EXTERNA!!</span> - INFORMA&Ccedil;&Atilde;O V&Aacute;LIDA PARA A LIBERA&Ccedil;&Atilde;O DE <span style="color:#cf5d4e">L&Acirc;MINAS</span> DEVER&Aacute; SER TIRADAS NA VISTA <span style="color:#cf5d4e">EXTERNA!!</span></li>
 </ul>

 <p>ARTPEL: ESTAR ATENTO A <span style="color:#cf5d4e">VISTA DE CTP E DA FACA</span> QUE SER&Aacute; ENVIADA PELO CLIENTE!! PODER&Aacute; SER FEITA A COLOCA&Ccedil;&Atilde;O DE PONTES, CONTUDO <span style="color:#0033ff">EST&Aacute; PAUSADO O PROCESSO AT&Eacute; RECEBER</span> O <span style="color:#cf5d4e">DOCUMENTO CTP</span>!!! - INFORMA&Ccedil;&Atilde;O V&Aacute;LIDA PARA A LIBERA&Ccedil;&Atilde;O DE <span style="color:#cf5d4e">L&Acirc;MINAS</span> DEVER&Aacute; SER TIRADAS NA <span style="color:#cf5d4e">VISTA DA FACA!!</span></p>',
                'tipo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p><span style="font-size:20px">MARGEM DA MADEIRA</span></p>

 <ul>
 	<li><span style="color:#cf5d4e">45mm</span> COMPRIMENTO E LARGURA / PARTE DA AL&Ccedil;A <span style="color:#cf5d4e">60mm</span></li>
 	<li>CLIENTE PEDRO FERREIRA: <span style="color:#cf5d4e">100mm</span> NO COMPRIMENTO E <span style="color:#cf5d4e">45mm</span> LARGURA</li>
 </ul>',
                'tipo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>AL&Ccedil;A OPERACIONAL</p>',
                'tipo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'texto' => '<p>ORD. DE PRODU&Ccedil;&Atilde;O / PROJETO</p>',
                'tipo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
