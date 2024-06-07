 @extends('dashboard.layout.master')

 @section('content')
     <div class="row column4 graph mt-4">


         <div class="col-md-12">
             <div class="dash_blog">
                 <div class="dash_blog_inner">
                     <div class="dash_head">
                         <h3><span><i class="fa fa-newspaper-o"></i> Add New Blog</span><span class="plus_green_bt"><a
                                     href="#">+</a></span></h3>
                     </div>
                     <div class="list_cont">
                         <p>Today Tasks for Ronney Jack</p>
                     </div>
                     <div class="task_list_main">


                         <form action="{{ route('blog.update', ['blog' => $blog->id]) }}" method="post"
                             enctype="multipart/form-data">
                             @csrf
                             @method('PUT')

                             <div class="card-body">
                                 <div class="row">
                                 </div>

                                 <div class="row">
                                     <div class="form-group col-md-6">
                                         <div class="form-group mb-0">

                                             <label>Title</label>
                                             <input placeholder="{{ $blog->title }}" name="title" class="form-control">
                                         </div>

                                         <div class="form-group mt-4">
                                             <label>Description</label>
                                             <textarea rows="4" cols="4" placeholder="{{ $blog->description }}" name="description" class="form-control"></textarea>
                                         </div>
                                     </div>

                                     <div class="form-group col-md-6 mt-2">
                                         <div class="form-group col-md-6">
                                             <div class="col-xl-6">
                                                 <div class="mb-6">

                                                     @if ($blog->image)
                                                         <img id="showImage" src="{{ asset($blog->image) }}"
                                                             alt="Current Image"
                                                             style="width: 150px !important;height: 150px !important;border-radius: 10px;">
                                                     @else
                                                         <img src="{{ url('images/no-category-image.jpg') }}"
                                                             style="max-width: 180px;height: 180px !important; border-radius: 10px;">
                                                     @endif
                                                 </div>
                                             </div>

                                         </div>
                                         <div class="col-xl-5">
                                             <div class="mb-5">
                                                 <label class="text-dark font-weight-medium" for="">Image</label>
                                                 <input type="file" class="form-control" name="image" id="image">
                                             </div>
                                         </div>
                                     </div>


                                 </div>



                             </div>
                             <div class="read_more">
                                 <div class="center">
                                     <button class="main_bt read_bt" type="submit" class="btn btn-primary">Submit</button>

                                 </div>
                             </div>
                         </form>


                     </div>

                 </div>
             </div>
         </div>
     </div>


     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
         $(document).ready(function() {
             $('#image').change(function(e) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('#showImage').attr('src', e.target.result);
                 }
                 reader.readAsDataURL(e.target.files[0]);
             })
         });
     </script>
 @endsection
