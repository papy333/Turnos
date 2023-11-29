<?php 
    unset($_SESSION['turnos']);
?>
<div class="seccion-turnos">
                <div class="tipo-documento">
                    <form action="index.php?controllers=Usuario&action=tipoCliente" method="POST">
                        <select name="tipo_documento">
                            <option disabled selected>Seleccione Tipo Documento...</option>
                            <option value="tarjeta_identidad">Tarjeta De Identidad</option>
                            <option value="cedula_ciudadania">Cedula De Ciudadania</option>
                            <option value="cedula_extranjeria">Cedula De Extranjeria</option>
                        </select>
                <?php if(isset($_SESSION['errores'])): ?>
                    <!-- Button trigger modal -->
                <div class="error-caja">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">
                    Ver Errores!!
                    </button>
    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-body">
                        <?php if(isset($_SESSION['errores']['tipoDocumento'])):?>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="text-dark"><?=$_SESSION['errores']['tipoDocumento']?></h4>
                        </div>
                        <?php endif; ?>
    
                        <?php if(isset($_SESSION['errores']['identi'])):?>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="text-dark"><?=$_SESSION['errores']['identi']?></h4>
                        </div>
                        <?php endif; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div> 
                </div>   
                <?php endif; ?>
                <?php Utilidades::deleteErrores('errores') ?>
                </div>
                <div class="escribir-documento">
                    <div class="ingresar-doc">
                            <div class="input-text">
                                <input type="text" name="identificacion" id="id" placeholder="Documento...">
                            </div>
                            <input type="button" value="1" id="uno">
                            <input type="button" value="2" id="dos">
                            <input type="button" value="3" id="tres">
                            <input type="button" value="4" id="cuatro">
                            <input type="button" value="5" id="cinco">
                            <input type="button" value="6" id="seis">
                            <input type="button" value="7" id="siete">
                            <input type="button" value="8" id="ocho">
                            <input type="button" value="9" id="nueve">
                            <input type="button" value="Borrar" id="borrar">
                            <input type="button" value="0" id="cero">
                            <input type="submit" value="Siguiente" id="siguiente">
                        </form>
                    </div>
                </div>
            </div>