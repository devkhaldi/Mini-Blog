@extends('layouts/theme')
@section('content')

<div class="test">
    <ul>
    @foreach ($category->posts as $post)
        <li>{{$post->title}}</li>
    @endforeach
    </ul>

</div>

<div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <span>Category</span>
          <h3>{{$category->name}}</h3>
          <p>{{$category->description}}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-white">
    <div class="container">
      <div class="row">

        <!-- Posts  -->
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">Politics</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
        
        <!--End Posts  -->
        
      </div>
      <div class="row text-center pt-5 border-top">
        <div class="col-md-12">
          <div class="custom-pagination">
            <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">15</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection