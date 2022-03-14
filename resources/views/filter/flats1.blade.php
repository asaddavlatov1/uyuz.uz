<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
          <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> 
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
          <title>Document</title>
</head>
<body>
          <div class="container">
                <div class="mb-3">
                    <label for="text" class="form-label">Uy turi</label>
                    <select class="form-control" required name="flat_type" onchange="getnearby(this.value); getcomfort(this.value)" id="atrofida">
                    <option value="">Tanlang...</option>
                    @foreach($flat_types as $flat)
                        <option value="{{$flat->id}}">
                                {{$flat->name}}
                        </option>
                    @endforeach 
                    </select>
                    <div  class="form-text">Uy turini tanlang</div>
                </div>
          <form action="/flat_type/{1}" method="GET">
                <div class="mb-3">
                    <label for="text" class="form-label">Viloyat</label>
                    <select class="form-control" name="region" onchange="getdistrict(this.value)" id="viloyat" required>
                    <option value="">Tanlang...</option>
                    @foreach($regions as $region)
                        <option value="{{$region->id}}">
                                {{$region->name}}
                        </option>
                    @endforeach 
                    </select>
                    <div  class="form-text">Viloyatni tanlang</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Tuman</label>
                    <select class="form-control"  name="district" id="district">
                    <option value="">Tanlang...</option>
                    
                    </select>
                    <div  class="form-text">Tumanni tanlang</div>
       
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Narxi</label>
                    <input type="text" class="form-control" id="price1" name="price1" placeholder="от" >
                    <input type="text" class="form-control" id="price2" name="price2" placeholder="до">
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Xonalari soni</label>
                    <input type="text" class="form-control" id="num_room1" name="num_room1" placeholder="от" >
                    <input type="text" class="form-control" id="num_room2" name="num_room2" placeholder="до">
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Kvadrati</label>
                    <input type="text" class="form-control" id="square1" name="square1" placeholder="от">
                    <input type="text" class="form-control" id="square2" name="square2" placeholder="до" >
                </div>

                <button type="submit"> Filtirlash </button>
                </form>     
                
                <table>
                          <thead>
                                    <tr>
                                        <th>Rasm</th>
                                        <th>Nomi</th>
                                    </tr>
                          </thead>
                          <tbody>
                                    @foreach($flats as $flat1)
                                        <tr>
                                                  <td><img src="{{URL::asset($flat1->url)}}" alt="" width="15%"></td>
                                                  <td>{{ $flat1->name}}</td>
                                        </tr>
                                    @endforeach
                          </tbody>
                </table>

          </div>
          


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
<script>    
          function getdistrict(id){ 
        iconv_mime_decode_headers = $('#viloyat').val(); // Here, I'm getting selected value of dropdown  
        $.ajax({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            url: "{{route('getdistrict')}}", 
            type: "GET", 
            data:{ 
                'id' : id // in header request I'm getting value [productName: plastic product] * 
                }, 
            success:function(district){ 
                var selectobject = document.getElementById("district");
                for (var i=1; i<selectobject.length; i++) {
                    selectobject.remove(i);
                }
                $(district).each(function(){
                    $("#district").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
              })

  
            }, 
             
        }); 
    }
</script>
</body>
</html>