<h1>Listado de arriendos</h1>
<table border=1>
    @foreach ($arriendos as $arriendo)
        <tr>
            <td>{{ $arriendo->rutcliente }}
            </td>
            <td>{{ $arriendo->patentevehiculo }}
            </td>
            <td>{{ $arriendo->fecha }}
            </td>
            <td>{{ $arriendo->fechadevolucion }}
            </td>
        </tr>
    @endforeach

</table>
