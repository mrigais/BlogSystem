

@extends('main')

@section('blogsystem_content')
<style>

    .main{
        overflow:auto;
        width:100%;
    }
    .content{
        width:40%;
        margin-left:20px;
        display:inline-block;
        text-align:right;
        padding:10px;
    }

    .image{
        /* margin-left:10px; */
        width:40%;
        margin-top:10px;
        /* text-align:center; */
        float:left;
        /* padding:10px; */
    }

    .pagination{
        display:inline;
        list-style: none;
        padding-left: 0;
        padding-top: 50;
        text-align:center;

    }

</style>


<div class="main">
@if (session('status'))
    <div text-align="center">
        {{ session('status') }}
    </div>
@endif
    @foreach($blogposts as $post)
    <div class="blogpost">
        <div class="content">
            <h2>{{ $post->title }}</h12>
            <p>{{ $post->text }}</p>
        </div>

        <div class="image">
            <img height=100 width=100 src="{{ asset('storage/blog_image_'.$post->image) }}"></img>
        </div>
        <!-- <a  type='button' class="btn btn-primary">Delete Post</a> -->
        <?php $post_id = $post->id; ?>

        <a type="button" onclick="return confirm('Do you want to Delete this Post?')" href="{{ route('deletepost', $post_id) }}" class="fa fa-trash" id="delete_post" >Delete</a>
        <a type="button"  href="{{ route('editpost', $post_id) }}" class="fa fa-edit" id="edit_post" >Edit</a>
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


        
</div>
@endsection
