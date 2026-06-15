@props([
'title'=> 'try'
])
<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title}}</title>
    </head>
    <body>
        <main>
            {{ $slot}}
        </main>
    </body>
</html>