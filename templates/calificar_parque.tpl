<div class="square">
<form action="{$gvar.l_global}calificar_parque.php?option=calificar" method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="5">
	<tr>
		<td>
			<b>Calificar el Parque</b><br/><br/>
			<b>Codigo: {$codigo}</b><br/>
			<b>Nombre: {$nombre}</b><br/>
			<b>Municipio: {$municipio}</b><br/>
			<b>Calificacion</b> <input type="text" {if isset($calificacion)} value="{$calificacion}"{/if} name="calificacion" /><br/>
			<input type="hidden" name="parque" value="{$codigo}">
			<input type="hidden" name="codigo" value="{$codigo}">
			<input type="hidden" name="nombre" value="{$nombre}">
			<input type="hidden" name="municipio" value="{$municipio}">
			<input class="btn btn-primary" type="submit" value="Calificar" />
		</td>
	</tr></table>
</form>
</div>

