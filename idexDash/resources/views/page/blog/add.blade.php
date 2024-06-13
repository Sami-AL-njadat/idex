 @extends('dash.layout.master')

 @section('content')
     <div class="content container-fluid">
         <div class="row justify-content-lg-center">
             <div class="col-lg-9">
                 <div class="card card-lg mb-3 mb-lg-5">
                     <div class="card-header">
                         <h4 class="card-header-title">Add New Blog</h4>
                     </div>
                     <form id="blogForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="card-body">
                             <div class="mb-4">
                                 <label for="projectNameProjectSettingsLabel" class="form-label">
                                     Blog name
                                     <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="The Blog Name Is Required"></i>
                                 </label>
                                 <div class="input-group input-group-merge ">
                                     <div class="input-group-prepend input-group-text">
                                         <i class="bi-briefcase"></i>
                                     </div>
                                     <input type="text" class="form-control form-control-lg" name="title"
                                         id="projectNameProjectSettingsLabel" placeholder="Enter blog name here"
                                         aria-label="Enter project name here" required>
                                 </div>
                             </div>
                             <div class="mb-4">
                                 <label class="form-label">
                                     Blog Contant
                                     <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="The Description Is Required"></i>
                                 </label>
                                 <div class="quill-custom">
                                     <div class="js-quill" id="desc" style="height: 15rem;"
                                         data-hs-quill-options='{
                                        "placeholder": "Type your description...",
                                        "modules": {
                                            "toolbar": [
                                                ["bold", "italic", "underline", "strike", "link", "blockquote", "code", {"list": "bullet"}]
                                            ]
                                        }
                                    }'>
                                     </div>
                                 </div>
                                 <textarea name="description" style="display:none;"></textarea>
                             </div>
                             <div class="card mb-3 mb-lg-5 mt-2">
                                 <div class="card-header card-header-content-between">
                                     <h4 class="card-header-title">Image</h4>
                                 </div>
                                 <div class="dz-dropzone-card ">
                                     <div style="width: 100%; text-align: center;">
                                         <img id="showImageDefault" class="avatar avatar-xl avatar-4x3 mb-3"
                                             src="{{ asset('dist/assets/svg/illustrations/oc-browse.svg') }}"
                                             alt="Image Description" data-hs-theme-appearance="default">
                                         <img id="showImageLight" class="avatar avatar-xl avatar-4x3 mb-3"
                                             src="{{ asset('dist/assets/svg/illustrations-light/oc-browse.svg') }}"
                                             alt="Image Description" data-hs-theme-appearance="dark">
                                         <h5>Drag and drop your file here</h5>
                                         <input hidden id="image" accept="image/*" name="image" type="file"
                                             class="form-control">
                                         <label class="btn btn-primary btn-lg mt-3" for="image">Upload Image</label>

                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer d-flex justify-content-end align-items-center gap-3">
                             <a href="{{ route('page.blog') }}" class="btn btn-white">Cancel</a>
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>


     <script>
         document.addEventListener('DOMContentLoaded', function() {
             HSCore.components.HSQuill.init('.js-quill');
         });

         document.querySelector('#blogForm').addEventListener('submit', function(event) {
             var quillEditor = document.querySelector('#desc .ql-editor');
             var quillHtml = quillEditor.innerHTML;
              
             document.querySelector('textarea[name="description"]').value = quillHtml;
         });
     </script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


     <script>
         $(document).ready(function() {
             function previewImage(file) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('#showImageDefault').attr('src', e.target.result);
                     $('#showImageLight').attr('src', e.target.result);
                 }
                 reader.readAsDataURL(file);
             }

             $('#image').change(function(e) {
                 var file = e.target.files[0];
                 if (file) {
                     previewImage(file);
                 }
             });

             var dropzone = $('.dz-dropzone-card');

             dropzone.on('dragover', function(e) {
                 e.preventDefault();
                 e.stopPropagation();
                 dropzone.addClass('dragover');
             });

             dropzone.on('dragleave', function(e) {
                 e.preventDefault();
                 e.stopPropagation();
                 dropzone.removeClass('dragover');
             });

             dropzone.on('drop', function(e) {
                 e.preventDefault();
                 e.stopPropagation();
                 dropzone.removeClass('dragover');

                 var files = e.originalEvent.dataTransfer.files;
                 if (files.length) {
                     $('#image').prop('files', files);
                     previewImage(files[0]);
                 }
             });
         });
     </script>
 @endsection
