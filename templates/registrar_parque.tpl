<div class="square">
<form action="{$gvar.l_global}registrar_parque.php?option=registrar" method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="5">
	<tr>
		<td>
			<b>Registrar un Parque</b><br /><br />
			<b>Codigo:</b> <input type="text" {if isset($codigo)} value="{$codigo}"{/if} name="codigo" /><br />
			<b>Nombre:</b> <input type="text" {if isset($nombre)} value="{$nombre}"{/if} name="nombre" /><br />
			<b>Municipio:</b> <input type="text" {if isset($municipio)} value="{$municipio}"{/if} name="municipio" /><br />
			<b>Nivel:</b> <input type="text" {if isset($nivel)} value="{$nivel}"{/if} name="nivel" /><br />
			<input class="btn btn-primary" type="submit" value="Registrar" />
		</td>
	</tr></table>
</form>
</div>

