<style>
    h2 {
        color: #333;
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        display: block;
        width: 100%;
        background-color: #3498db;
        color: #fff;
        padding: 10px;
        margin-top: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button#btnCancel {
        background-color: #777;
        margin-top: 10px;
    }
</style>

<h2>{{modedsc}}</h2>
    
{{with puntosventa}}
    <form action="index.php?page=Puntosventas_Puntosventas&mode={{~mode}}&idpuntoventa={{id}}" method="POST">
        
        <label for="idpuntoventa">Codigo</label>
        <input type="text" id="idpuntoventa" name="idpuntoventa" value="{{idpuntoventa}}" readonly/>
        {{if idpuntoventa_error}}<div class="text-red-500 text-sm">{{idpuntoventa_error}}</div>{{endif idpuntoventa_error}}
        <br>

        <label for="nombrefranquicia">Franquicia</label>
        <input type="text" id="nombrefranquicia" name="nombrefranquicia" placeholder="Nombre de la franquicia" value="{{nombrefranquicia}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if nombrefranquicia_error}}<div class="text-red-500 text-sm">{{nombrefranquicia_error}}</div>{{endif nombrefranquicia_error}}
        <br>

        <label for="nombrepuntoventa">Punto de venta</label>
        <input type="text" id="nombrepuntoventa" name="nombrepuntoventa" placeholder="Nombre del punto" value="{{nombrepuntoventa}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if nombrepuntoventa_error}}<div class="text-red-500 text-sm">{{nombrepuntoventa_error}}</div>{{endif nombrepuntoventa_error}}
        <br>

        <label for="pais">Pais</label>
        <input type="text" id="pais" name="pais" placeholder="Pais del punto" value="{{pais}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if pais_error}}<div class="text-red-500 text-sm">{{pais_error}}</div>{{endif pais_error}}
        <br>

        <label for="ciudad">Ciudad</label>
        <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad del punto" value="{{ciudad}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if ciudad_error}}<div class="text-red-500 text-sm">{{ciudad_error}}</div>{{endif ciudad_error}}
        <br>

        <label for="codigopostal">Cod. Postal</label>
        <input type="text" id="codigopostal" name="codigopostal" placeholder="Codigo postal" value="{{codigopostal}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if codigopostal_error}}<div class="text-red-500 text-sm">{{codigopostal_error}}</div>{{endif codigopostal_error}}
        <br>

        <label for="direccion">Direccion</label>
        <input type="text" id="direccion" name="direccion" placeholder="Direccion del punto de venta" value="{{direccion}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if direccion_error}}<div class="text-red-500 text-sm">{{direccion_error}}</div>{{endif direccion_error}}
        <br>

        <label for="telefono">Numero de telefono</label>
        <input type="text" id="telefono" name="telefono" placeholder="000000000" value="{{telefono}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if telefono_error}}<div class="text-red-500 text-sm">{{telefono_error}}</div>{{endif telefono_error}}
        <br>

        <label for="email">Correo electronico</label>
        <input type="text" id="email" name="email" placeholder="correo@example.com" value="{{email}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if email_error}}<div class="text-red-500 text-sm">{{email_error}}</div>{{endif email_error}}
        <br>

        <label for="responsablenombre">Nombre del responsable</label>
        <input type="text" id="responsablenombre" name="responsablenombre" placeholder="Jose Guerrero" value="{{responsablenombre}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if responsablenombre_error}}<div class="text-red-500 text-sm">{{responsablenombre_error}}</div>{{endif responsablenombre_error}}
        <br>

        <label for="responsabletelefono">Telefono del responsable</label>
        <input type="text" id="responsabletelefono" name="responsabletelefono" placeholder="99999999" value="{{responsabletelefono}}" {{if ~readonly}} readonly {{endif ~readonly}} />
        {{if responsabletelefono_error}}<div class="text-red-500 text-sm">{{responsabletelefono_error}}</div>{{endif responsabletelefono_error}}
        <br>

        
        {{if ~showConfirm}}
            <button type="submit" name="btnConfirm">Guardar</button>&nbsp;
        {{endif ~showConfirm}}
        <button id="btnCancel">Cancelar</button>
    </form>
{{endwith puntosventa}}

<script>
    document.addEventListener("DOMContentLoaded", ()=>{
        document.getElementById("btnCancel").addEventListener("click", (e)=>{
            e.preventDefault();
            e.stopPropagation();
            document.location.assign("index.php?page=Puntosventas_Puntosventa");
        });
    });
</script>