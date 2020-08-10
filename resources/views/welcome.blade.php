@extends('layouts.app')

@section('content')
<div class="container">
  <!-- Start header -->
 <header id="home">
   <h1 class="text-center">Take care of your body. It's the only place you have to live. Jim Rohn.</h1>
   <div class="overlay">
  </div>
 </header>
 <!-- End header -->
 <!-- Start my recipes -->
 <section class="my-design inner-design">
   <div class="container">
     <h2>latest recipes</h2>
     <ul class="link">
       <li class="selected filter" data-filter="all">all</li>
       @foreach($cat_name as $result)
       <li  class="filter" data-filter=".{{ $result->name }}">{{ $result->name }}</li>
       @endforeach
     </ul>
     <section id="gallery" class="gallery">
       <div class="row">
         @foreach($posts as $post)
         <div class="col-md-3 plus">
           <div class="mix {{$post->category->name}}">
             <a href="/posts/{{$post->id}}"><h4>{{$post->name}}</h4>
             @if($post->image)
             <img src="{{'storage/'
             .$post->image}}">
             @endif
             </a>
             <a class="m-a a-mydesign" href="/posts/{{$post->id}}">  view more </a>
             @if(isset(Auth::user()->id) && Auth::user()->id == 1)
             <a class="m-a a-mydesign" href="/allPosts/{{$post->id}}/edit"> || edit ||</a>
             <a  class="m-a a-mydesign" href="/allPosts/{{$post->id}}/delete"> delete </a>
             @endif
           </div>
         </div>
             @endforeach
       </div>
     </section>
     <!-- End my recipes -->

  <!-- START ALL RECIPES SECTION-->
  <div class="main-recipes my-design">
    <div class="container">
      <h1 class="text-center">all recipes</h1>
        <div class="row">
          @foreach($random as $post)
          <div class="col-md-3 plus">
            <div class="">
              @if($post->image)
              <img src="{{'storage/'
              .$post->image}}">
              @endif
              <a href="/posts/{{$post->id}}"><h4>{{$post->name}}</h4>

              <p >{{$post->description}}</p>
              <a href="/posts/{{$post->id}}" class="btn btn-primary" role="button">read more</a>
              @if(isset(Auth::user()->id) && Auth::user()->id == 1)
              <a class="m-a a-mydesign" href="/allPosts/{{$post->id}}/edit"> || edit ||</a>
              <a  class="m-a a-mydesign" href="/allPosts/{{$post->id}}/delete"> delete </a>
              @endif
            </div>
          </div>
              @endforeach
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- END ALL RECIPES  -->
    </div>
</div>
@endsection
@section('foot')
<!-- START FOOTER -->
<footer class="van ">
  <div class="container">
    <section >
      <span class=" text-center">copyright &copy; 2020 by samar mahfouz </span>
    </section>
  </div>
</footer>
<!-- END FOOTER -->
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script  src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{ asset('js/custom.js') }}" ></script>
  @endsection
