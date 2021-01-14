@extends('admin.main')
@include('blade_partitions.header')
@include('blade_partitions.footer')

@section('blogsystem_content')

<style>


</style>
<main role="main">

<?php 
    if(empty($blogposts)){
    $message = "NO POSTS AVAILABLE.";
    }else{
       $message = ""; 
    }
?>


             <h3 text-align="center"> <?php echo $message;?> </h3>
 

@foreach($blogposts as $post)
      <div class="container marketing"  text-align="center" width=100%>


          
    <div class="grid-container">    

        <div class="grid-child purple">
            <img class="rounded-circle" text-align="center" src="{{ asset('storage/blog_image_'.$post->image) }}" alt="Generic placeholder image" width="140" height="140">
            <h2 font-size:50px;>{{ $post->title }}</h2>
            <div font-size:10px;>{{ $post->created_at }}<div>
            <?php $post_id = $post->id; ?>
            <p><a onclick="return confirm('Do you want to Delete this Post?')" href="{{ route('deletepost', $post_id) }}" class="btn btn-secondary" role="button">Delete</a> <a class="btn btn-secondary" href="{{ route('editpost', $post_id) }}" role="button">Edit</a></p>
        </div>

        <div class="grid-child green">
            <p style>{{ $post->text }}</p>
        </div>

    </div>
    </div>
@endforeach

    <style>
    div li{
        list-style-type: none;
        display: inline;
        text-align: center;
        margin-top: 20px;
    }
    </style>
    <div class="pagination_class" display="inline" style="text-align:center; margin-top:20px; ">
        @include('pagination', ['paginator' => $blogposts])
    </div>

@endsection


