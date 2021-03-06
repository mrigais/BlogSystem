

@extends('admin.main')

@section('blogsystem_content')

<style>

    .main{
        overflow:auto;
        width:100%;
    }

    .blogpost{
        height :

    }
    .content{
        width:40%;
        margin-left:20px;
        display:inline-block;
        text-align:left;
        padding:10px;
    }

    .image{
        /* margin-left:10px; */
        width:40%;
        margin-top:10px;
        /* text-align:center; */
        float:right;
        /* padding:10px; */
    }

    .blog_input{
        text-align:center;
        margin:35px;
        overflow:auto;
    }

    #blogpost_title{
        height: 35px;
        width: 40%;
        border: 1px solid #222;
        border-radius: 10px;
        padding: 20px;
        margin-left: 5px;
    }

    #blogpost_content{
        height: 35px;
        width: 40%;
        /* border: 1px solid #222; */
        border-radius:10px;
        padding: 20px;
        margin-left: 5px; 
    }

    #blogpost_image:{
        height: 35px;
        width: 40%;
        /* border: 1px solid #222; */
        border-radius: 20px;
        padding: 20px;
        margin-left: 5px;
    }

    #submit-post{

    }

</style>


<div class="main">
<h3 style="text-align:center;">UPDATE POST</h3>

@if(session('status'))
    <h2 style = "text-align:center">{{ session('status') }}</h2>
@endif
<form action="/updateForm" method='POST' enctype='multipart/form-data'>
    @csrf
    <div class='blog_input'>
        <label>Title</label>
        <input type='text'  id='blogpost_title' name='title' value ={{ $post['title'] }} placeholder='Name of post'></input>
    </div>
        
    <div class='blog_input'>
        <label>Content</label>
        <input type='text' size="50" id='blogpost_content' name='content'value={{ $post['text'] }} placeholder='Content for post'></input>
    </div>

    <div class='blog_input'>
        <label>Image</label>
        <img width="50" height="50"  src="{{ asset('storage/blog_image_'.$post['image']) }}">
        <input type='file' value='' id='blogpost_image' name='image' value={{ $post['image'] }} placeholder='Name of post'></input>
        <input type='hidden'  name ='post_id' value={{ $post['id'] }} </input>
    </div>

    <div class='blog_input'>
        <input type='submit' value='update' id='submit-post'></input>
    </div>

 </form>   
</div>
@endsection