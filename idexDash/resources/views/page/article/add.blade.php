 @extends('dashboard.layout.master')

 @section('content')
     <div class="content-start transition">

         <div class="main-content">
             <section class="section">
                 <div class="section-header">
                     <h1>ِArticle</h1>

                 </div>

                 <div class="section-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="card">
                                 <div class="card-header">
                                     <h4>New ِArticle</h4>
                                 </div>
                                 <div class="card-body p-0">

                                     <div class="card-body pr-4">
                                         <form action="{{ route('article.store') }}" method="POST"
                                             enctype="multipart/form-data">
                                             @csrf

                                             <div class="card-body">


                                                 <div class="row">
                                                     <div class="col-xl-3">
                                                         <div class="mb-3 ml-1">
                                                             <img id="showImage1" width="100px"
                                                                 src="{{ url('images/no-category-image.jpg') }}">
                                                         </div>
                                                     </div>
                                                     <div class="col-xl-5">
                                                         <div class="mb-5">
                                                             <label class="text-dark font-weight-medium"
                                                                 for="">Image One</label>
                                                             <input type="file" required class="form-control"
                                                                 name="image1" id="image1">
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="row">
                                                     <div class="col-xl-3">
                                                         <div class="mb-3 ml-1">
                                                             <img id="showImage2" width="100px"
                                                                 src="{{ url('images/no-category-image.jpg') }}">
                                                         </div>
                                                     </div>
                                                     <div class="col-xl-5">
                                                         <div class="mb-5">
                                                             <label class="text-dark font-weight-medium"
                                                                 for="">Image Two</label>
                                                             <input type="file" required class="form-control"
                                                                 name="image2" id="image2">
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="row">
                                                     <div class="form-group col-8">
                                                         <label>Header </label>
                                                         <input name="text" class="form-control" required></input>

                                                     </div>

                                                     <div class="form-group col-8">
                                                         <label>paragraph </label>
                                                         <textarea name="description" class="form-control" required></textarea>

                                                     </div>
                                                 </div>


                                                 <div class="row">
                                                     <div class="form-group col-8">
                                                         <label>Title two</label>
                                                         <input name="text" class="form-control" required></input>

                                                     </div>

                                                     <div class="form-group col-8">
                                                         <label>paragraph two</label>
                                                         <textarea name="description" class="form-control" required></textarea>

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
 @endsection
