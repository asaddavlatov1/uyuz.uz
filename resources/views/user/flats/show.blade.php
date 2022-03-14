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
          <title>Document</title>
</head>
<body>
        
        <tbody>
                <tr>
                        <td>
                                <h2>{{ $flats->name }}</h2>
                        </td>
                </tr>
        </tbody>

      <thead>
            <tr>
            <div class="panel-group">
                   <div class="panel panel-default">
                           <div class="panel-body">
                                   <td>
                                        <img src="{{URL::asset($flats->url)}}" alt="" width="15%">                                         
                                   </td>
                           </div>
                   </div>
           </div>       
            </tr> 
      @foreach($images as $image)
           <tr>
           <div class="panel-group">
                   <div class="panel panel-default">
                           <div class="panel-body">
                                   <td>
                                        <img src="{{URL::asset($image->url)}}" alt="" width="15%">                                         
                                   </td>
                           </div>
                   </div>
           </div>      
           </tr>
           @endforeach  
      </thead> 
        

         
          
</body>
</html>