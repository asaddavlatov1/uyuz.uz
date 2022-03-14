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
<h2 class="text-center p-3">Bu create sahifa</h2>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="/flats/store" enctype="multipart/form-data">
                @csrf

                
                <div class="mb-3">
                    <label for="text" class="form-label">Uy turi</label>
                    <select class="form-control" required name="flat_type" onchange="getnearby(this.value); getcomfort(this.value)" id="atrofida">
                    <option value="">Tanlang...</option>
                    @foreach($flats as $flat)
                        <option value="{{$flat->id}}">
                                {{$flat->name}}
                        </option>
                    @endforeach 
                    </select>
                    <div  class="form-text">Uy turini tanlang</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Nomi</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <div  class="form-text">Sarlavhani kiriting</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Kvadrati</label>
                    <input type="text" class="form-control" id="square" name="square" >
                    <div  class="form-text">Uyning to'liq kvadrati</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Xonalar soni</label>
                    <input type="text" class="form-control" id="num_room" name="num_room" >
                    <div  class="form-text">Uyning xonalari soni</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Etaj</label>
                    <input type="text" class="form-control" id="storey" name="storey" >
                    <div  class="form-text">Nechinchi etaj</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Uyning qavati</label>
                    <input type="text" class="form-control" id="f_storey" name="f_storey" >
                    <div  class="form-text">Uy necha qavatligini kiriting</div>
                </div>
                <div class="mb-3">
                <label for="text" class="form-label">Uyning atrofida bor narsalar</label>
                    <div id="addElementsHere" class="form-check form-switch">
                        
                    </div>
                </div>
                <input type="hidden" name="maxsoni1" id="maxsoni1">

                <div class="mb-3">
                <label for="text" class="form-label">Uyning ichida bor narsalar</label>
                    <div id="addElementsHerecomfort" class="form-check form-switch">
                        
                    </div>
                </div>
                <input type="hidden" name="maxsoni2" id="maxsoni2">

                <div class="mb-3">
                    <label for="text" class="form-label">Viloyat</label>
                    <select class="form-control" name="region" onchange="getdistrict(this.value)" id="viloyat">
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
                    <select class="form-control" required name="district" id="tuman">
                    <option value="">Tanlang...</option>
                    
                    </select>
                    <div  class="form-text">Tumanni tanlang</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">To'lov turi</label>
                    <select class="form-control" required name="payment_type">
                    <option value="">Tanlang...</option>
                    @foreach($payment_types as $payment_type)
                        <option value="{{$payment_type->id}}">
                                {{$payment_type->name}}
                        </option>
                    @endforeach 
                    </select>
                    <div  class="form-text">Dollor yoki so'mda</div>
                </div>


                <div class="mb-3">
                    <label for="text" class="form-label">Narxi</label>
                    <input type="text" class="form-control" id="price" name="price">
                    <div  class="form-text">Uyning narxi.</div>
                </div>

                
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    <div  class="form-text">Qo'shimcha ma'lumotlar</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Telefon raqam</label>
                    <input type="text" class="form-control" id="phone" name="phone" >
                    <div  class="form-text">Telefon raqam kiriting</div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Rasm qo'shish</label>
                    <input type="file" class="form-control" id="photo0" name="photo0" required >
                    <input type="file" class="form-control" id="photo1" name="photo1" >
                    <input type="file" class="form-control" id="photo2" name="photo2" >
                    <input type="file" class="form-control" id="photo3" name="photo3" >
                    <input type="file" class="form-control" id="photo4" name="photo4" >
                    <input type="file" class="form-control" id="photo5" name="photo5" >
                    <input type="file" class="form-control" id="photo6" name="photo6" >
                    <input type="file" class="form-control" id="photo7" name="photo7" >
                    <input type="file" class="form-control" id="photo8" name="photo8" >
                    <input type="file" class="form-control" id="photo9" name="photo9" >
                    <div  class="form-text">Rasm kiriting</div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
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
                var selectobject = document.getElementById("tuman");
                for (var i=1; i<selectobject.length; i++) {
                    selectobject.remove(i);
                }
                $(district).each(function(){
                    $("#tuman").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
              })

  
            }, 
             
        }); 
    } 
 


    function getnearby(id){ 
        iconv_mime_decode_headers = $('#atrofida').val(); // Here, I'm getting selected value of dropdown  
        $.ajax({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            url: "{{route('getnearby')}}", 
            type: "GET", 
            data:{ 
                'id' : id // in header request I'm getting value [productName: plastic product] * 
                }, 
            success:function(nearby){ 
                n = nearby.length;
                document.getElementById("maxsoni1").value=n;
                for(var i = 0; i<n; i++){
                        $("#addElementsHere")
                        .append(`<input class="form-check-input" type="checkbox" id="${i}" name="nearby${i}" value="${nearby[i].id}">`)
                        .append(`<label for="${i}">${nearby[i] .name}</label></div>`)
                        .append(`<br>`);
                }

                }

  
            
             
        })
    } 

    function getcomfort(id){ 
        iconv_mime_decode_headers = $('#atrofida').val(); // Here, I'm getting selected value of dropdown  
        $.ajax({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            url: "{{route('getcomfort')}}", 
            type: "GET", 

            data:{ 
                'id' : id // in header request I'm getting value [productName: plastic product] * 
                }, 
            success:function(comfort){ 
                
                n = comfort.length;
                document.getElementById("maxsoni2").value=n;
                for(var i = 0; i<n; i++){
                        $("#addElementsHerecomfort")
                        .append(`<input class="form-check-input" type="checkbox" id="${i}" name="comfort${i}" value="${comfort[i].id}">`)
                        .append(`<label for="${i}">${comfort[i] .name}</label></div>`)
                        .append(`<br>`);
                }

                }

  
            
             
        })
       
    } 

   

 
</script>

</body>
</html>
