<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>User Flats</title>
</head>
<body>
        <h3>User Flats</h3>
        <a href="/flats/create"><button class="btn btn-primary me-md-2" type="button">Elon berish</button></a>
        <br>
<table class="table table-bordered">
   
   <tbody>
           
        @foreach($flats as $flat)
        <tr>
       
        <div class="panel-group">
                <div class="panel panel-default">

                        <div class="panel-body">
                                
                                        <a href="/flatindex/{{$flat->id}}">
                                                <img src="{{ asset($flat->url)}}" alt="" width="15%">
                                                {{ $flat->name }}
                                        </a>
                                
                         
                        </div>

                </div>
        
        </div>      
        </tr>
        @endforeach
   </tbody>
</table>
</body>
</html>