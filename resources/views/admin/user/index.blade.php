<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Users</title>
</head>
<body>
    <h2 class="text-center">Foydalanuvchilar ro'yxati</h2>
<div class="container">
    <div class="row">
        <div class="form-group">
            <a href="/admin"><button class="btn btn-danger" type="button">Orqaga qaytish</button></a>
        </div>


    <table class="table table-bordered">
    <thead>
        <tr>    
            <th>№</th>
            <th>ID</th>
            <th>Ism</th>
            <th>Familiya</th>
            <th>Login</th>
            <th>email</th>
            <th>phone</th>
        </tr>    
    </thead>
    <tbody>
    @foreach($users as $user)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->login}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="/admins/delete"><input type="hidden" value="{{$user->id}}" name="id" ><button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Delete</button></form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
   </div>  
</div>

</body>
</html>