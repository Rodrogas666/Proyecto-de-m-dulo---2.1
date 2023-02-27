<form action="" method="post">
    <label for="">Tipo</label>
    <select name="estados" id="estados">
        <option value="">Cita común</option>
        <option value="">Emergencia</option>
    </select>
    <br>
    <br>

    <label for="">Fecha</label>
    <input type="datetime-local" name="fecha" id="fecha">

    <br><br>
    
    <label for="">Asunto</label>
    <input type="text" name="asunto" id="asunto">

    <br><br>

    <label for="">Mascota</label>
    <select name="mascotas" id="mascotas">
        <option value="">Zeus</option>
        <option value="">Canelon</option>
    </select>

    <br><br>
    <button type="submit">Agregar cita</button>
</form>