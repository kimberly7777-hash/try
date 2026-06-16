@props([
'title'=> 'try'
])
<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title}}</title>
        <style>
            body{
                min-height:100%;
                margin:0;
                max-width:100%;
            }
            .home{
               background-color:bisque;
               
               
               width:100%;
               height:100vh;
               text-align:center;
                 
            }
            h1{
                font-size:36px;
                font-family: 'Playfair Display', serif;

            }
            p{
                font-size:25px;
                font-family: 'Playfair Display', serif;
            }
            </style>
    </head>
    <body>
        
            {{ $slot}}
        
    </body>
</html>