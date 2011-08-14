<!Doctype html>
<html lang="pl">
	<meta charset="UTF-8" />
	<title>Kod Genetyczny</title>
<h3>Kod Genetyczny</h3>
<?php
if($_POST['gcode']){
	require_once "GeneticCode.class.php";
	try{
	$gc = new GeneticCode();
	$gc->setGeneticCode($_POST['geneticCode']);
	$r = $gc->translateGeneticCode();
	$r['codons'] = explode(" ", $r['codons']);
	$r['mini'] = explode(" ", $r['mini']);
	$r['full'] = explode(", ", $r['full']);
	
	echo '<table>
<tr><td>Kodony:</td><td>&nbsp;</td>
';
foreach($r['codons'] as $c){
	echo '<td style="font-style: italic;">'.$c.'</td>';
}
echo '
</tr>
<tr><td>Skróty:</td><td>&nbsp;</td>
';
foreach($r['mini'] as $c){
	echo '<td style="font-style: italic;">'.$c.'</td>';
}
echo '
</tr>
<tr><td>Pełne nazwy:</td><td>&nbsp;</td>
';
foreach($r['full'] as $c){
	echo '<td style="font-style: italic;">'.$c.'</td>';
}
echo '
</tr>
</table>';
} catch(Exception $e){
	echo ' <b>Błąd: </b>'.$e->getMessage()."<br />\r\n";
}
}
echo '<br />
<form action="index.php" method="post">
<input type="text" size="100" name="geneticCode" />
<input type="submit" name="gcode" value="Odczytaj!" />
</form>';
?>
</html>