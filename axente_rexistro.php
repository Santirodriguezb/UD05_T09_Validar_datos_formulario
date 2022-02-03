<?php
    header('Content-Type: text/html; charset=UTF-8');
    echo "<pre>"; print_r($_REQUEST); echo "</pre>";

    $nomeCompleto= htmlspecialchars(trim(strip_tags($_REQUEST['nomeCompleto'])), ENT_QUOTES, "ISO-8859-1");
    if ($nomeCompleto == "")
        print "<p>O campo nome esta baleiro</p>";
    else
        print "<p>O valor recibido do campo nome completo é: $nomeCompleto</p>";
    
    $nomeUsr= htmlspecialchars(trim(strip_tags($_REQUEST['nomeUsr'])), ENT_QUOTES, "ISO-8859-1");
    if ($nomeUsr == "")
        print "<p>O campo nome de usuario esta baleiro. É un campo obrigatorio.</p>";
    else
        print "<p>O valor recibido do campo nome de usuario é: $nomeUsr</p>";

    $contrasinal= htmlspecialchars(trim(strip_tags($_REQUEST['contrasinal'])), ENT_QUOTES, "ISO-8859-1");
    if ($contrasinal == "")
        print "<p>O campo contrasinal esta baleiro. É un campo obrigatorio</p>";
    else if(strlen($contrasinal)<6){
        print "<p>O campo contrasinal non ten o mínimo de 6 caracteres</p>";
    } else{
        print "<p>O valor recibido do campo contrasinal é: $contrasinal</p>";
    }
    

    $idade= htmlspecialchars(trim(strip_tags($_REQUEST['idade'])), ENT_QUOTES, "ISO-8859-1");
    if ($idade == "")
        print "<p>O campo idade esta baleiro</p>";
    else if((int)$idade<0 || (int)$idade>130){
        print "<p>O valor recibido non esta entre 0 e 130</p>";
    } else {
        print "<p>O valor recibido do campo idade é: $idade</p>";
    }

    $dNac= htmlspecialchars(trim(strip_tags($_REQUEST['dNac'])), ENT_QUOTES, "ISO-8859-1");
    if ($dNac == "")
        print "<p>O campo data de nacemento esta baleiro</p>";
    else {
        $partes_data=explode("/",$dNac);
        if(count($partes_data)==3){
            if(checkdate($partes_data[1],$partes_data[2],$partes_data[2])){

                print "<p>O valor recibido do campo data de nacemento é: $dNac</p>"; 
            }else {
                print "<p>O valor recibido non é válido</p>";
            }
        }
    }

    $email = htmlspecialchars(trim(strip_tags($_REQUEST['email'])), ENT_QUOTES, "ISO-8859-1");
    if ($email == "")
        print "<p>O campo email esta baleiro. É un campo obrigatorio.</p>";
    else if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        print "<p>O valor recibido do campo email é: $email</p>";
    }else{
       print "<p>O valor recibido do campo email non é válido</p>";
    }

    $url= htmlspecialchars(trim(strip_tags($_REQUEST['url'])), ENT_QUOTES, "ISO-8859-1");
    if ($url == "")
        print "<p>O campo URL da páxina persoal está baleiro</p>";
    else if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        print "<p>O valor recibido do campo URL da páxina persoal é: $url</p>";
    }else{

        print "<p>O valor recibido é invalido</p>";
    }
    
    $ip= htmlspecialchars(trim(strip_tags($_REQUEST['ip'])), ENT_QUOTES, "ISO-8859-1");
    if ($ip == "")
        print "<p>O campo IP esta baleiro.</p>";
    else if (filter_var($ip, FILTER_VALIDATE_IP)){
        print "<p>O valor recibido do campo IP do equipo é: $ip</p>";
    }else{

        print "<p>O valor recibido é invalido</p>";
    }


    $hobbies= htmlspecialchars(trim(strip_tags($_REQUEST['hobbies'])), ENT_QUOTES, "ISO-8859-1");
    if ($hobbies == "")
        print "<p>O campo descrición dos hobbies esta baleiro.</p>";
    else
        print "<p>O valor recibido do campo hobbies é: $hobbies</p>";
    
    $rcbInfo= (isset($_REQUEST['rcbInfo']))
        ? htmlspecialchars(trim(strip_tags($_REQUEST['rcbInfo'])), ENT_QUOTES, "ISO-8859-1")
        : "";
    if ($rcbInfo == "")
        print "<p>Non se utilizou o control recibir información.</p>";
    else
        print "<p>O valor recibido do control recibir informacioón é: $rcbInfo</p>";
    
    $sexo= (isset($_REQUEST['rcbInfo']))
    ? htmlspecialchars(trim(strip_tags($_REQUEST['sexo'])), ENT_QUOTES, "ISO-8859-1")
    : "";
    if ($sexo == "")
        print "<p>Non se utilizou o control sexo. É obligatorio.</p>";
    else
        print "<p>O valor recibido do control sexo é: $sexo</p>";
    
    $linguasEs= (isset($_REQUEST['rcbInfo']))
    ? htmlspecialchars(trim(strip_tags($_REQUEST['linguasEs'])), ENT_QUOTES, "ISO-8859-1")
    : "";
    if ($linguasEs == "")
        print "<p>Non se utilizou o control de linguas estranxeiras.</p>";
    else {
        echo "Os valores recibidos do menú linguas estranxeiras son: <pre>";
        print_r($linguasEs);
        echo "</pre>";
    }

    $curriculo= (isset($_FILES['curriculo']))
        ? $_FILES['curriculo']
        : "";
    if ($curriculo == "")
        print "<p>Non se utilizou o control curriculo.</p>";
    else{
        echo "<p>O nome e o tamaño do arquivo recibido no campo curriculo son: ".$currriculo["name"]." e ".$curriculo["size"]." bytes</p>";
        move_uploaded_file($curriculo["tmp_name"], "subidos/".$curriculo["name"]);
    }
?>