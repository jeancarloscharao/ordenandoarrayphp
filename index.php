<?php


function dd($arrayResultado){

	echo "<pre>";
	var_dump($arrayResultado);	
	echo "<pre>";
	die;

}



function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}





$resultados =  array();

$resultados['0']['candidato'] = "Jean Carlos";
$resultados['0']['votos'] = 10;


$resultados['1']['candidato'] = "Marcelo";
$resultados['1']['votos'] = 5;


$resultados['3']['candidato'] = "Eric";
$resultados['3']['votos'] = 50;


$resultados = array_orderby($resultados, 'votos', SORT_DESC);



?>


<table>
<tr>
	<td>Candidato</td>
	<td>Votos</td>
</tr>
 
<?php $countador = 0; 

foreach ($resultados as $key => $resultado) { $countador++;  ?>

<tr>
	<td><?php echo $countador; ?> º <?php echo $resultado['candidato'] ?></td>
	<td><?php echo $resultado['votos'] ?></td>
</tr>

<?php } ?>

</table>