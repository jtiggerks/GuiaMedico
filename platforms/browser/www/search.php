<?

    /*local onde está rodando o PHP*/
    $hostname = 'mysql15-farm51.kinghost.net';
    /* nome de usuário que tem acesso*/
    $username = 'corpoemoviment04';
    /* Senha do usuario */
    $senha = '904625q';
    /* Banco de dados desejado */
    $banco = 'corpoemoviment04';
     
    $base = @mysql_connect($hostname, $username, $senha);
    
    $db = mysql_select_db($banco, $base);
 
    $term = trim(strip_tags($_REQUEST['q']));

    $qstring = "SELECT nome,id,especialidade FROM medico WHERE nome LIKE '%".$term."%'";
    $result = mysql_query($qstring) or die(mysql_error());

    while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
    {
        $row['nome']=htmlentities(stripslashes($row['nome']));
        $row['id']=(int)$row['id'];
        $row['descricao'] = 
        '
            <a class="div_list_medico" rel="'.$row['id'].'">
                 <h1>'. $row['nome'].' </h1>
                 <p><b>Especialidade:</b> Dermatologista - Cardiologista - Pediatra</p>
                 <p>CENTRO - Lins / SP</p>
            </a>
        ';
        $row_set[] = $row; 
    }

    echo json_encode($row_set);

?>