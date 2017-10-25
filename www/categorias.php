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
    mysql_set_charset('utf8');

    $term = trim(strip_tags($_REQUEST['q']));

    $qstring = "SELECT id,nome,faicon FROM categoria";
    $result = mysql_query($qstring) or die(mysql_error());

    while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
    {
        $row['nome']=htmlentities(stripslashes($row['nome']));
        $row['id']=(int)$row['id'];
        $row['faicon'] = $row['faicon'];
        
        $row_set[] = $row; 
    }

    echo json_encode($row_set,JSON_UNESCAPED_UNICODE);

?>