 @extends('dashboard.layout.master')

 @section('content')
     {{-- <div class="content-start transition">

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
                                         <form action="{{ route('blog.store') }}" method="POST"
                                             enctype="multipart/form-data">

                                             @csrf

                                             <div class="card-body">

                                                 <div class="row">




                                                 </div>

                                                 <div class="row">
                                                     <div class="form-group col-md-6">
                                                         <label>Title</label>
                                                         <input name="title" class="form-control" required>

                                                     </div>



                                                     <div class="form-group col-md-6">
                                                         <label>Image</label>
                                                         <input name="image" type="file" class="form-control">

                                                     </div>
                                                 </div>



                                                 <div class="form-group mb-0">
                                                     <label>Description</label>
                                                     <textarea name="description" class="form-control" required></textarea>

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
     </div> --}}
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
                         <ul class="task_list">
                             <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>10:00
                                     AM</strong></li>
                             <li><a href="#">Create new task for Dashboard</a><br><strong>10:00 AM</strong></li>
                             <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>11:00
                                     AM</strong></li>
                             <li><a href="#">Create new task for Dashboard</a><br><strong>10:00 AM</strong></li>
                             <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>02:00
                                     PM</strong></li>
                         </ul>
                     </div>
                     <div class="read_more">
                         <div class="center"><a class="main_bt read_bt" href="#">Read More</a></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
