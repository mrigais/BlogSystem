<link rel="stylesheet" href=" {{ asset('css/app.css')}} ">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
    body{
        background-color:#FFFFFF;
        margin: 8px;
        color:#f6b319;
        margin-bottom:100px;
    }

    header{
        overflow:hidden;
        background-color:#f6b319;
        padding: 20px 10px;
    }
    
    header a{
        float:left;
        color:black;
        text-align:center;
        padding:12px;
        font-size:10px;
        line-height:25px; 
    }
    #blogsystem{
        font-size: 30px;
        font-weight: bold;
        text-align: 'center';

    };

    #menu{
        float: right;
        font-size: 25px;
    };
    a {
        margin: 10px;
     }

    </style>

    <header>
        <a id ="blogsystem" href="https://blogsystem.com">BlogSystem</a>
            <nav>
                <div id="menu" style="float:right;">
                <p><a href="{{ route('createBlog') }}" class="btn btn-secondary" role="button">ADD POST</a>
                
                <a href="{{ route('allPosts') }}" class="btn btn-secondary" role="button">VIEW POSTS</a></p>
                </div>
            </nav>
    </header>
