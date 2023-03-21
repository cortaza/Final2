<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
    <body>
        <div id="Pagina">
            <table width="100%" border="0">
                <caption>Horario</caption>
                <tr>
                    <th scope="col" class="elements">Numero de Ficha</th>
                    <th scope="col" class="elements">Programa</th>
                    <th scope="col" class="elements">Ambinete</th>
                    <th scope="col" class="elements">Jornada</th>
                    <th scope="col" class="elements">Instructor</th>
                    <th scope="col" class="elements">Trimestre</th>
                    
                    <tr class="odd">
                @foreach ($horario as $h)
                    <td>{{$h->nr_ficha}}</td>
                    <td>{{$h->codigo_prog}}</td>
                    <td>{{$h->codigo_ambiente}}</td>
                    <td>{{$h->jornada}}</td>
                    <td>{{$h->dni}}</td>
                    <td>{{$h->id_semaforo}}</td>
                @endforeach
                </tr>
            </table>
        </div>
        <style type="text/css">

body {
    color: #000;
    background: #efefef;
    font-family: Helvetica, Arial, sans-serif;
    text-align: center;
}

#page {
    width: 600px;
    text-align: left;
    margin: 0 auto;
    padding: 2em;
    background: #fff;
}

/* the table */

table {
    width: 100%;
    border: 1px solid #000;
    border-collapse: collapse;
    caption-side: top;
}

th, td {
    width: 25%;
    text-align: center;
    vertical-align: top;
    border: 1px solid #000;
    padding: 0.3em;
}

caption {
    padding: 0.3em;
    color: #fff;
    background: #000;
}

th {
    background: #ccc;
}

td {
    background: #f4f4f4;
}

.odd td {
    background: #fff;
}

.elements {
    width: 30%;
}

</style>
    </body>
</html>