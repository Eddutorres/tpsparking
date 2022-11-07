<form action="{{route('registro.store')}}" method="POST">
  {{ csrf_field() }}
  @method('post')
    <input type="date" name="fecha" id="fecha">
    <input type="text" name="codigo_est" id="codigo_est">
    <input type="time" name="hora_ingreso" id="hora_ingreso">
    <input type="text" name="rut" id="rut">
    <input type="text" name="patente" id="patente">
    <button type="submit">Registrar</button>
  </form>