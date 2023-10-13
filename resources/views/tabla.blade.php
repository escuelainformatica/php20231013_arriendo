<h1>Listado de arriendos</h1>
<table border=1>
    @foreach ($arriendos as $arriendo)
        <tr>
            <td>{{$arriendo->cliente->nombre}} {{$arriendo->cliente->apellido}} ({{ $arriendo->rutcliente }})
            </td>
            <td>{{$arriendo->vehiculo->marca}} ({{ $arriendo->patentevehiculo }})
            </td>
            <td>{{ $arriendo->fecha }}
            </td>
            <td>{{ $arriendo->fechadevolucion }}
            </td>
        </tr>
    @endforeach
</table>

<a href='/arriendo'>Agregar un arriendo</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href='/devolucion'>Devolver arriendo</a>
