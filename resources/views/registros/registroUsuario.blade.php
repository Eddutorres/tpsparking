<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <form action="{{route('registro.registroUsuario')}}" method="POST">
        @csrf
        @method('post')
        <div class="form-group"> <!-- Full Name -->
            <label for="full_name_id" class="control-label">Nombre</label>
            <input type="text" class="form-control" id="full_name_id" name="name" >
        </div>    
    
        <div class="form-group"> <!-- Street 1 -->
            <label for="street1_id" class="control-label">Email</label>
            <input type="text" class="form-control" id="street1_id" name="email">
        </div>                    
                                
        <div class="form-group"> <!-- Street 2 -->
            <label for="street2_id" class="control-label">Password</label>
            <input type="password" class="form-control" id="street2_id" name="password">
        </div>    
                                    
        <div class="form-group"> <!-- State Button -->
            <label for="role" class="control-label">Role</label>
            <select class="form-control" id="role" placeholder="seleccione">
                <option disabled selected>Seleccione Rol</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
              
            </select>                    
        </div>
                       
        <div class="form-group"> <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>     
        
    </form>
</body>
</html>
