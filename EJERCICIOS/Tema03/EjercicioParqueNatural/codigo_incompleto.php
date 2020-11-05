<html xmlns="http://www.w3.org/1999/xhtml">
    <head><meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
        <title>Parque Natural Sierra Bicuerca - Reservas</title>
        <link href="estilos.css" rel="stylesheet" type="text/css" /> 

    </head>
    <body>
        <div class="red_arriba">
            <div></div>
        </div>

        <h1>Parque Natural Cabarceno</h1>

        <div class="contenido">
            <div class="contenido_abajo">
                <h2>Reservas</h2>
                <p>El acceso al parque es libre y gratuito, siempre que se respeten las normas de conducta y preservaci&oacute;n del entorno. </p>
                <p>No obstante, tambi&eacute;n disponemos de servicios adicionales, como visita guiada  o aula educativa para ni&ntilde;os.</p>
                <h3>Horarios y reservas</h3>
                <table border="0" cellspacing="3" cellpadding="3" class="reservas">
                    <tr>
                        <th colspan="5">Visitas con gu&iacute;a:</th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="2" class="titulo">Temporada de Verano</td>
                        <td colspan="2" class="titulo">Temporada de Invierno</td>
                    </tr>
                    <tr>
                        <td class="titulo">Horarios:</td>
                        <td colspan="2">10:00 - 13:00<br />
                            16:00 - 19:00</td>
                        <td colspan="2">11:00 -14:00</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="titulo">Tarifas:</td>
                        <td>Individual:</td>
                        <td>Grupos:</td>
                        <td>Individual:</td>
                        <td>Grupos:</td>
                    </tr>
                    <tr>
                        <td>5 &euro; persona</td>
                        <td>3 &euro; persona</td>
                        <td>4 &euro; persona</td>
                        <td>2 &euro; persona</td>
                    </tr>
                </table>
                <table border="0" cellspacing="3" cellpadding="3" class="reservas">
                    <tr>
                        <th colspan="3">Aula educativa (s&oacute;lo grupos):</th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="titulo">Temporada de Verano</td>
                        <td class="titulo">Temporada de Invierno</td>
                    </tr>
                    <tr>
                        <td class="titulo">Horarios:</td>
                        <td>9:00 - 10:00<br />
                            15:00 - 16:00</td>
                        <td>10:00 - 11:00</td>
                    </tr>
                    <tr>
                        <td class="titulo">Tarifas:</td>
                        <td>25 &euro;</td>
                        <td>25 &euro;</td>
                    </tr>
                </table>
                <h3>Contacto</h3>
                <p>Si est&aacute;s pensando visitar el parque con un grupo, por favor, rellena este formulario:</p>

            </div>
        </div>

        <div class="red_abajo"><div></div>
        </div>
        <div class="contacto">
            <form method="post" action="enviar_reservar.php">
                <table border="0" cellspacing="3" cellpadding="3" class="reservas">
                    <tr>
                        <td colspan="2"><label for="nombre">Nombre: </label></td>
                        <td colspan="2"><input type="text" name="nombre" id="nombre" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="email">Email: </label></td>
                        <td colspan="2"><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="fechaVisita">Fecha de la visita: </label></td>
                        <td colspan="2"><input type="date" name="fechaVisita" id="fechaVisita" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="numPersonas">Número de personas: </label></td>
                        <td colspan="2"><input type="number" name="numPersonas" id="numPersonas" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>Edad del grupo: </label></td>
                        <td colspan="2">
                            <input type="radio" name="edad" id="de5a8" value="1" required/>
                            <label for="de5a8">De 5 a 8</label><br>
                            <input type="radio" name="edad" id="de9a14" value="2" />
                            <label for="de9a14">De 9 a 14</label><br>
                            <input type="radio" name="edad" id="de15a18" value="3"  />
                            <label for="de15a18">De 15 a 18</label><br>
                            <input type="radio" name="edad" id="adulto" value="4"  />
                            <label for="adulto">Adultos</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="checkbox" name="aula" id="aula">
                            <label for="aula">Deseamos asistir al aula educatica (sólo niños)</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Observaciones:</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><textarea name="observaciones" id="observaciones"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" name="enviar" id="enviar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>