<table border="0" width="100%" cellpadding="0" cellspacing="5">
<tr><td><b>LISTA DE PARQUES</b></td></tr>
<table style="width:100%">
  <tr>
    <th>Codigo</th>
    <th>Nombre</th> 
    <th>Municipio</th>
  </tr>
  {section loop=$parque name=i}
  	<form action="{$gvar.l_global}calificar_parque.php" method="post">
	  <tr>
	  	<input type="hidden" name="codigo" value="{$parque[i]->get('codigo')}">
      <input type="hidden" name="nombre" value="{$parque[i]->get('nombre')}">
      <input type="hidden" name="municipio" value="{$parque[i]->get('municipio')}">
	    <td align='center'>{$parque[i]->get('codigo')}</td>
	    <td align='center'><button>{$parque[i]->get('nombre')}</button></td> 
	    <td align='center'>{$parque[i]->get('municipio')}</td>
	  </tr>
	</form>
  {/section}
</table>
</table>