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

    $qstring = 'SELECT * FROM medico WHERE categoria like "%,'.$term.'%"';
    $result = mysql_query($qstring) or die(mysql_error());

    while ($row = mysql_fetch_array($result))
    {
        $row['nome']=htmlentities(stripslashes($row['nome']));
        $row['id']=(int)$row['id'];
        $especialidade = explode(',',$row['especialidade']);


        if(is_array($especialidade))
        {
            $especialidade_somada ='<p><b>Especialidade:</b> ';

            foreach($especialidade as $cada_especi)
            {   
                if($cada_especi > 0)
                {
                    $espqstring = "SELECT nome FROM especialidades WHERE id=".$cada_especi;
                    $result_esp = mysql_query($espqstring) or die(mysql_error());
                    if(empty($especialidade_somada_nome))
                        $especialidade_somada_nome .= mysql_result($result_esp, 0);
                    else
                        $especialidade_somada_nome .= ', '.mysql_result($result_esp, 0);
                }
            }

            $especialidade_somada =$especialidade_somada_nome.'</p>';
        }else
        {
                if($especialidade > 0)
                {
                    $espqstring = "SELECT nome FROM especialidades WHERE id=".$especialidade;
                    $result_esp = mysql_query($espqstring) or die(mysql_error());
                    $especialidade_somada = '<p><b>Especialidade:</b>'.mysql_result($result_esp, 0).'</p>';
                }
        }


        $row['descricao'] = 
        '
            <a class="div_list_medico" rel="'.$row['id'].'">
                 <h1>'. $row['nome'].' </h1>
                 '.$especialidade_somada.'
                 <p>'. $row['telefone1'].'</p>
                 <p>'. $row['endereco'].'</p>
            </a>
        ';
        $row_set[] = $row; 
    }

    echo json_encode($row_set);

?>