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

    $qstring = 'SELECT * FROM medico WHERE id = '.$term;
    $result = mysql_query($qstring) or die(mysql_error());

    while ($row = mysql_fetch_array($result))
    {
        $especialidade = explode(',',$row['especialidade']);

        if(is_array($especialidade))
        {   
            $row['especialidade']='';
            foreach($especialidade as $cada_especi)
            {   
                if($cada_especi > 0)
                {
                    $espqstring = "SELECT nome FROM especialidades WHERE id=".$cada_especi;
                    $result_esp = mysql_query($espqstring) or die(mysql_error());
                    if(empty($row['especialidade']))
                        $row['especialidade'] .= mysql_result($result_esp, 0);
                    else
                        $row['especialidade'] .= ', '.mysql_result($result_esp, 0);
                }
            }

           
        } 
 

        $row_set[] = $row; 
    }

    echo json_encode($row_set);

?>