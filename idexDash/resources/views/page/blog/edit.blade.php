 @extends('dashboard.layout.master')

 @section('content')
     <div class="content-start transition">

         <div class="main-content">
             <section class="section">
                 <div class="section-header">
                     <h1>Blog</h1>

                 </div>

                 <div class="section-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="card">
                                 <div class="card-header">
                                     <h4>New Blog</h4>
                                 </div>
                                 <div class="card-body p-0">

                                     <div class="card-body p-0">
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
                                                             <input placeholder="{{ $blog->title }}" name="title"
                                                                 class="form-control">
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
                                                                 <label class="text-dark font-weight-medium"
                                                                     for="">Image</label>
                                                                 <input type="file" class="form-control" name="image"
                                                                     id="image">
                                                             </div>
                                                         </div>
                                                     </div>


                                                 </div>



                                             </div>
                                             <div class="card-footer text-right">
                                                 <button type="submit" class="btn btn-primary">Submit</button>
                                             </div>
                                         </form>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
             </section>
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
