 @extends('dash.layout.master')

 @section('content')
     <main id="content" role="main" class="main">
         <div class="container">
             <div class="row justify-content-lg-center">
                 <div class="col-lg-9">
                     <div class="card card-lg mb-3 mb-lg-5">
                         <div class="card-header">
                             <h4 class="card-header-title">Details</h4>
                         </div>
                         <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="card-body">
                                 <div class="mb-4">
                                     <label for="projectNameProjectSettingsLabel" class="form-label">
                                         Blog name
                                         <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="Displayed on public forums, such as Front."></i>
                                     </label>
                                     <div class="input-group input-group-merge">
                                         <div class="input-group-prepend input-group-text">
                                             <i class="bi-briefcase"></i>
                                         </div>
                                         <input type="text" class="form-control" name="title"
                                             id="projectNameProjectSettingsLabel" placeholder="Enter blog name here"
                                             aria-label="Enter project name here" required>
                                     </div>
                                 </div>
                                 <div class="mb-4">
                                     <label class="form-label">
                                         Blog description
                                         <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                             data-bs-placement="top" title="Displayed on public forums, such as Front."></i>
                                     </label>
                                     <div class="quill-custom">
                                         <div class="js-quill" id="desc" style="height: 15rem;"
                                             data-hs-quill-options='{
                        "placeholder": "Type your message...",
                        "modules": {
                            "toolbar": [
                                ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                            ]
                         }
                          }'>
                                         </div>
                                     </div>
                                     <textarea name="description" style="display:none;"></textarea>
                                 </div>
                                 <div class="card mb-3 mb-lg-5 mt-2">
                                     <div class="card-header card-header-content-between">
                                         <h4 class="card-header-title">Media</h4>
                                     </div>
                                     <div class="js-dropzone dz-dropzone dz-dropzone-card">
                                         <div class="dz" style="width: 100%; text-align: center;">
                                             <!-- Use unique IDs for each image -->
                                             <img id="showImageDefault" class="avatar avatar-xl avatar-4x3 mb-3"
                                                 src="{{ asset('dist/assets/svg/illustrations/oc-browse.svg') }}"
                                                 alt="Image Description" data-hs-theme-appearance="default">
                                             <img id="showImageLight" class="avatar avatar-xl avatar-4x3 mb-3"
                                                 src="{{ asset('dist/assets/svg/illustrations-light/oc-browse.svg') }}"
                                                 alt="Image Description" data-hs-theme-appearance="dark">
                                             <h5>Drag and drop your file here</h5>
                                             <input id="image" name="image" type="file"
                                                 class="btn btn-white btn-sm">
                                         </div>
                                     </div>
                                 </div>



                             </div>
                             <div class="card-footer d-flex justify-content-end align-items-center gap-3">
                                 <button type="button" class="btn btn-white">Cancel</button>
                                 <button type="submit" class="btn btn-primary">Save changes</button>
                             </div>
                         </form>





                     </div>
                 </div>
             </div>
         </div>
     </main>
     {{-- <script>
         document.querySelector('form').addEventListener('submit', function() {
             var quillEditor = document.querySelector('#desc .ql-editor');
             var quillHtml = quillEditor.innerHTML;
             document.querySelector('textarea[name="description"]').value = quillHtml;
         });
     </script> --}}
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
         $(document).ready(function() {
             $('#image').change(function(e) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('#showImageDefault').attr('src', e.target.result);
                     $('#showImageLight').attr('src', e.target.result);
                 }
                 reader.readAsDataURL(e.target.files[0]);
             });

             // Check if the input file has a value on page load
             $('#image').each(function() {
                 if ($(this).val()) {
                     var reader = new FileReader();
                     reader.onload = function(e) {
                         $('#showImageDefault').attr('src', e.target.result);
                         $('#showImageLight').attr('src', e.target.result);
                     }
                     reader.readAsDataURL($(this)[0].files[0]);
                 }
             });
         });
     </script>
 @endsection
