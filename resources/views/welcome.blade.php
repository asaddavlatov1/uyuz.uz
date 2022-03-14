<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <title>Document</title>
</head>
<body>
<a href="/login"><button>Login oynasiga kirish</button></a><br>
<a href="/register"><button>Registratsiya oynasiga kirish</button></a>

<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    @foreach($flat_types as $flat_type)      
          <a href="/flat_type/<?=$flat_type->id?>"><button type="button" class="btn btn-success">{{ $flat_type->name}} </button></a>
    @endforeach      
</div>

</body>
</html>