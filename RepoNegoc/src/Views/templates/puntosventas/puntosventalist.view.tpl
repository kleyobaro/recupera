<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    section {
        margin: 20px;
    }

    h2 {
        color: #333;
    }

    a {
        color: #3498db;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #333;
        color: #dddddd;
    }

    th:last-child {
        color: #fff;
        text-align: center;
        background-color: #3498db;
    }
    th a:last-child {
        color: #fff;
    }

    td:last-child {
        text-align: center;
    }

    tbody tr:hover {
        background-color: #f5f5f5;
    }


</style>

<section>
    <h2>
        Puntos de venta registrados
    </h2>
</section>
<section>
    <table >
        <thead>
            <tr>
                <th>Id</th>
                <th>Franquicia</th>
                <th>Punto de venta</th>
                <th>Pais</th>
                <th>Ciudad</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Responsable</th>
                <th><a href="index.php?page=Puntosventas_Puntosventas&mode=INS">Nuevo</a></th>
            </tr>
        </thead>
        <tbody>
        {{foreach puntosventa}}
        <tr>
            <td>{{idpuntoventa}}</a></td>
            <td>{{nombrefranquicia}}</td>
            <td><a href="index.php?page=Puntosventas_Puntosventas&mode=DSP&idpuntoventa={{idpuntoventa}}">{{nombrepuntoventa}}</a></td>
            <td>{{pais}}</td>
            <td>{{ciudad}}</td>
            <td>{{telefono}}</td>
            <td>{{email}}</td>
            <td>{{responsablenombre}}</td>
            <td>
                <a href="index.php?page=Puntosventas_Puntosventas&mode=UPD&idpuntoventa={{idpuntoventa}}">Editar</a> ] [
                <a href="index.php?page=Puntosventas_Puntosventas&mode=DEL&idpuntoventa={{idpuntoventa}}">Eliminar</a>
            </td>
        </tr>
     {{endfor puntosventa}}</tbody>
    </table>
</section>