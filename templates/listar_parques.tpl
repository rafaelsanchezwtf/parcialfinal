<table border="0" width="100%" cellpadding="0" cellspacing="5">
<tr><td><b>LISTA DE PARQUES</b></td></tr>
<table style="width:100%">
  <tr>
    <th>Codigo</th>
    <th>Nombre</th> 
    <th>Municipio</th>
  </tr>
  {section loop=$parque name=i}
  	<form action="{$gvar.l_global}listar_parques.php?option=calificar" method="post">
	  <tr>
	  	<input type="hidden" name="codigo" value="{$parque[i]->get('codigo')}">
	    <td align='center'>{$parque[i]->get('codigo')}</td>
	    <td align='center'><button>{$parque[i]->get('nombre')}</button></td> 
	    <td align='center'>{$parque[i]->get('municipio')}</td>
	  </tr>
	</form>
  {/section}
</table>
</table>