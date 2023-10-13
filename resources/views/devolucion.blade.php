<h1>Devolucion</h1>
<form method="post">
    @csrf
    <select name="idarriendo">
        <option>--seleccione el arriendo--</option>
        @foreach ($arriendos as $arriendo)
            <option value="{{ $arriendo->id }}">{{ $arriendo->rutcliente }} - {{ $arriendo->patentevehiculo }}</option>
        @endforeach
    </select>
    <br>
    <button type='submit'>Envio</button>
</form>
<br><br>
<div style="background-color:red">{{ $mensaje }}
</div>
