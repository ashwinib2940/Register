
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in {{isset($meta_title) && $meta_title ? " - ".$meta_title : "" }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{config('constant.ASSETS_PATH')}}/css/register.css">
   
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">

</head>
<body>
    
    @include('layouts.header')  
    @yield('content')       
    @include('layouts.footer')      

    
</body>
</html>