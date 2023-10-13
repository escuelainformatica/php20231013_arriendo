<h1>Arriendo</h1>
<form method='post'>
    @csrf
    cliente:

    <select name="rutcliente">
        <option>--seleccione el cliente--</option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->rut }}">{{ $cliente->nombre }} - {{ $cliente->apellido }}</option>
        @endforeach
    </select>
    <br>
    Vehiculo:
    <select name="patentevehiculo">
        <option>--seleccione el vehiculo--</option>
        @foreach ($vehiculos as $vehiculo)
            <option value="{{ $vehiculo->patente }}">{{ $vehiculo->marca }}</option>
        @endforeach
    </select>
    <br>
    <button type='submit'>Envio</button>
    <br><br>
    <div style="background-color:red">{{$mensaje}}
    </div>
</form>
