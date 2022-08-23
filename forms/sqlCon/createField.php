<?php
    if ($_SESSION['menu'] == '1')
    {
        echo "
        <script type='text/javascript'>
            var motivo = document.getElementById(\"campoS\");
            motivo.selectedIndex = 1;

            motivo.disabled = \"true\";
            document.getElementById(\"liberar\").disabled = false;
            document.getElementById(\"motivo\").value = 1;

            var d = document.getElementById('revisao');
            $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu1' aligin-itens='inline'><span class='input-group-text X1 position-static' id='inputGroup-sizing-sm'>Área no carnê de IPTU</span><input type='text' id='areaCarne' name='areaCarne' value='' size='8' maxlength='8' class='form-control X2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe a área do carnê' onkeypress='return onlynumber();'><span class='input-group-text X3 position-static' id='inputGroup-sizing-sm'>Desde</span><input type='text' id='anoCarne' name='anoCarne' value='' size='4' maxlength='4' class='form-control X4 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o ano' onkeypress='return onlynumber();'></nav>\");
            document.getElementById(\"temp\").style.display = \"\";

            document.getElementById(\"anoCarne\").value = document.getElementById(\"ocultAno\").value; 
            document.getElementById(\"areaCarne\").value = document.getElementById(\"ocultArea\").value;
        </script>
        ";
    }elseif ($_SESSION['menu'] == '2')
    {
        echo "
        <script language=\"javascript\" type=\"text/javascript\">
            alert(document.getElementById(\"ocultAno\").value);
            var motivo = document.getElementById(\"campoS\");
            motivo.selectedIndex = 2;

            motivo.disabled = \"true\";
            document.getElementById(\"liberar\").disabled = false;
            document.getElementById(\"motivo\").value = 2;

            var d = document.getElementById('revisao');
            $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu2' aligin-itens='inline'><span class='input-group-text X1 position-static' id='inputGroup-sizing-sm'>Emitida em</span><input type='text' id='emitida' name='emitida' value='' size='4' maxlength='4' class='form-control X2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o ano de emissão' onkeypress='return onlynumber();'><span class='input-group-text X3 position-static' id='inputGroup-sizing-sm'>Área de</span><input type='text' id='areade' name='areade' value='' size='4' maxlength='4' class='form-control X4 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe a área lançada' onkeypress='return onlynumber();'></nav>\");
            document.getElementById(\"temp\").style.display = \"\";

            document.getElementById(\"emitida\").value = document.getElementById(\"ocultAno\").value; 
            document.getElementById(\"areade\").value = document.getElementById(\"ocultArea\").value;
        </script>
        ";
    }elseif ($_SESSION['menu'] == '3')
    {  
        echo "
        <script type='text/javascript'>
            var motivo = document.getElementById(\"campoS\");
            motivo.selectedIndex = 3;

            motivo.disabled = \"true\";
            document.getElementById(\"liberar\").disabled = false;
            document.getElementById(\"motivo\").value = 3;

            var d = document.getElementById('revisao');
            $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu3' aligin-itens='inline'><span class='input-group-text X31 position-static' id='inputGroup-sizing-sm'>Data:</span><input type='text' id='des_data' name='des_data' value='' size='10' maxlength='10' class='form-control X32 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Data de aprovação' onkeypress='return onlynumber();'><span class='input-group-text X33 position-static' id='inputGroup-sizing-sm'>Cadastros</span><input type='text' id='ncad2' name='ncad2' value='' size='16' maxlength='16' class='form-control X34 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 1° cadastro' onkeypress='return onlynumber();'><input type='text' id='ncad3' name='ncad3' value='' size='16' maxlength='16' class='form-control X35 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 2° cadastro' onkeypress='return onlynumber();'><input type='text' id='ncad4' name='ncad4' value='' size='16' maxlength='16' class='form-control X36 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 3° cadastro' onkeypress='return onlynumber();'><input type='text' id='ncad5' name='ncad5' value='' size='16' maxlength='16' class='form-control X37 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 4° cadastro' onkeypress='return onlynumber();'><input type='text' id='ncad6' name='ncad6' value='' size='16' maxlength='16' class='form-control X38 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 5° cadastro' onkeypress='return onlynumber();'></nav>\");
            document.getElementById(\"temp\").style.display = \"\";

            document.getElementById(\"des_data\").value = document.getElementById(\"ocultData\").value; 
            document.getElementById(\"ncad2\").value = document.getElementById(\"ocultCadastro1\").value; 
            document.getElementById(\"ncad3\").value = document.getElementById(\"ocultCadastro2\").value; 
            document.getElementById(\"ncad4\").value = document.getElementById(\"ocultCadastro3\").value; 
            document.getElementById(\"ncad5\").value = document.getElementById(\"ocultCadastro4\").value; 
            document.getElementById(\"ncad6\").value = document.getElementById(\"ocultCadastro5\").value;

            $('.X32').mask('00/00/0000', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X33').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X34').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X35').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X36').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X37').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
        </script>
        ";      
    }elseif ($_SESSION['menu'] == '4')
    {
        echo "
        <script type='text/javascript'>
            var motivo = document.getElementById(\"campoS\");
            motivo.selectedIndex = 4;

            motivo.disabled = \"true\";
            document.getElementById(\"liberar\").disabled = false;
            document.getElementById(\"motivo\").value = 4;
                    
            var d = document.getElementById('revisao');
            $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu4' aligin-itens='inline'><span class='input-group-text X41 position-static' id='inputGroup-sizing-sm'>Alvará n°</span><input type='text' id='n_alv' name='n_alv' value='' size='10' maxlength='10' class='form-control X42 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='N° do alvará' onkeypress='return onlynumber();'><span class='input-group-text X43 position-static' id='inputGroup-sizing-sm'>Data</span><input type='text' id='proj_data' name='proj_data' value='' size='10' maxlength='10' class='form-control X44 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe a data de aprovação' onkeypress='return onlynumber();'><span class='input-group-text X45 position-static' id='inputGroup-sizing-sm'>Área de</span><input type='text' id='area_proj' name='area_proj' value='' size='4' maxlength='4' class='form-control X46 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe a área do projeto' onkeypress='return onlynumber();'></nav>\");
            document.getElementById(\"temp\").style.display = \"\";

            document.getElementById(\"n_alv\").value = document.getElementById(\"ocultAlvara\").value; 
            document.getElementById(\"proj_data\").value = document.getElementById(\"ocultData\").value; 
            document.getElementById(\"area_proj\").value = document.getElementById(\"ocultArea\").value;

            $('.X44').mask('00/00/0000', {'translation': {0: {pattern: /[0-9*]/}}});
        </script>
        "; 
    }elseif ($_SESSION['menu'] == '5')
    {                
        echo "
        <script type='text/javascript'>
            var motivo = document.getElementById(\"campoS\");
            motivo.selectedIndex = 5;

            motivo.disabled = \"true\";
            document.getElementById(\"liberar\").disabled = false;
            document.getElementById(\"motivo\").value = 5;
                        
            var d = document.getElementById('revisao');
            $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu5' aligin-itens='inline'><div class='form-check'><div class'content_5'><div class='form-check'><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' checked><label class='form-check-label' for='flexCheckDefault'>Revisão de categoria da construção</label></div></div></div></nav>\");
            document.getElementById(\"temp\").style.display = \"\";
        </script>
        ";           
    }elseif ($_SESSION['menu'] == '6')
    {
        echo "
        <script type='text/javascript'>
            var motivo = document.getElementById(\"campoS\");
            motivo.selectedIndex = 6;

            motivo.disabled = \"true\";
            document.getElementById(\"liberar\").disabled = false;
            document.getElementById(\"motivo\").value = 6;

            var d = document.getElementById('revisao');
            $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu6' aligin-itens='inline'><span class='input-group-text X61 position-static' id='inputGroup-sizing-sm'>Data:</span><input type='text' id='uni_data' name='uni_data' value='' size='10' maxlength='10' class='form-control X62 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Data de aprovação'><span class='input-group-text X63 position-static' id='inputGroup-sizing-sm'>Cadastros</span><input type='text' id='ncad2' name='ncad2' value='' size='16' maxlength='16' class='form-control X64 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 1° cadastro'><input type='text' id='ncad3' name='ncad3' value='' size='16' maxlength='16' class='form-control X65 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 2° cadastro'><input type='text' id='ncad4' name='ncad4' value='' size='16' maxlength='16' class='form-control X66 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 3° cadastro'><input type='text' id='ncad5' name='ncad5' value='' size='16' maxlength='16' class='form-control X67 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 4° cadastro'><input type='text' id='ncad6' name='ncad6' value='' size='16' maxlength='16' class='form-control X68 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 5° cadastro'></nav>\");
            document.getElementById(\"temp\").style.display = \"\";

            document.getElementById(\"uni_data\").value = document.getElementById(\"ocultData\").value; 
            document.getElementById(\"ncad2\").value = document.getElementById(\"ocultCadastro1\").value; 
            document.getElementById(\"ncad3\").value = document.getElementById(\"ocultCadastro2\").value; 
            document.getElementById(\"ncad4\").value = document.getElementById(\"ocultCadastro3\").value; 
            document.getElementById(\"ncad5\").value = document.getElementById(\"ocultCadastro4\").value; 
            document.getElementById(\"ncad6\").value = document.getElementById(\"ocultCadastro5\").value;

            $('.X62').mask('00/00/0000', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X64').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X65').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X66').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X67').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
            $('.X68').mask('##.####.####.###', {'translation': {0: {pattern: /[0-9*]/}}});
        </script>
        ";      
    } 
?>