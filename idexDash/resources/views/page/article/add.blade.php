 @extends('dash.layout.master')

 @section('content')
     <div class="content container-fluid">
         <div class="row justify-content-lg-center">
             <div class="col-lg-9">
                 <div class="card card-lg mb-3 mb-lg-5">
                     <div class="card-header">
                         <h4 class="card-header-title">Add New Article</h4>
                     </div>
                     {{-- <-- start here --> --}}

                     <form id="formArticle" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="card-body">
                             <div class="mb-4">
                                 <label for="blog_id" class="form-label">
                                     Blog name
                                     <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="The Blog Name Is Required"></i>
                                 </label>
                                 <div class="tom-select-custom">
                                     <select name="blog_id" id="blog_id" class="js-select form-select" autocomplete="off">
                                         <option value="">Select blog</option>
                                         @foreach ($blogs as $blog)
                                             <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="mb-4">
                                 <label class="form-label">
                                     Header
                                 </label>
                                 <input type="text" class="form-control" name="header" placeholder="Enter header here"
                                     required>
                             </div>
                             <div class="mb-4">
                                 <label class="form-label">
                                     Paragraph
                                 </label>
                                 <div class="quill-custom">
                                     <div id="prag" class="js-quill" style="min-height: 15rem;"
                                         data-hs-quill-options='{
                        "placeholder": "Type your article...",
                        "modules": {
                            "toolbar": [
                                ["bold", "italic", "underline", "strike", "link", "blockquote", "code", {"list": "bullet"}]]}}'>
                                     </div>
                                 </div>
                                 <textarea name="paragraph" style="display:none;"></textarea>
                             </div>
                             <div class="mb-4">
                                 <label class="form-label">
                                     Header Two <span class="form-label-secondary">(Optional)</span>
                                 </label>
                                 <input type="text" class="form-control" name="header_two"
                                     placeholder="Enter header two here">
                             </div>
                             <div class="mb-4">
                                 <label class="form-label">
                                     Paragraph Two <span class="form-label-secondary">(Optional)</span>
                                 </label>
                                 <div class="quill-custom">
                                     <div id="secPrag" class="js-quill" style="min-height: 15rem;"
                                         data-hs-quill-options='{
                        "placeholder": "Type your article...",
                        "modules": {
                            "toolbar": [
                                ["bold", "italic", "underline", "strike", "link", "blockquote", "code", {"list": "bullet"}]]}}'>
                                     </div>
                                 </div>
                                 <textarea name="paragraph_two" style="display:none;"></textarea>
                             </div>


                             {{-- my  image  --}}
                             <div class="card mb-3 mb-lg-5 mt-2">
                                 <div class="card-header card-header-content-between">
                                     <h4 class="card-header-title">Image</h4>
                                 </div>
                                 <div class="card-group">
                                     <!-- Card 1 -->
                                     <div class="card">
                                         <div class="dz-dropzone-card" id="dropzone1">
                                             <div style="width: 100%; text-align: center;">
                                                 <img style="width: 150px;height: 100px;" id="showImageDefault1"
                                                     class="card-img-top mb-3"
                                                     src="{{ asset('dist/assets/svg/illustrations/oc-browse.svg') }}"
                                                     alt="Image Description" data-hs-theme-appearance="default">
                                                 <img style="width: 150px;height: 100px;" id="showImageLight1"
                                                     class="card-img-top mb-3"
                                                     src="{{ asset('dist/assets/svg/illustrations-light/oc-browse.svg') }}"
                                                     alt="Image Description" data-hs-theme-appearance="dark">
                                                 <h5>Drag and drop your first file here</h5>
                                                 <input hidden id="image1" accept="image/*" name="image1" type="file"
                                                     class="form-control">
                                                 <label class="btn btn-primary btn-lg mt-3" for="image1">Upload First
                                                     Image</label>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- Card 2 -->
                                     <div class="card">
                                         <div class="dz-dropzone-card" id="dropzone2">
                                             <div style="width: 100%; text-align: center;">
                                                 <img style="width: 150px;height: 100px;" id="showImageDefault2"
                                                     class="card-img-top mb-3"
                                                     src="{{ asset('dist/assets/svg/illustrations/oc-browse.svg') }}"
                                                     alt="Image Description" data-hs-theme-appearance="default">
                                                 <img style="width: 150px;height: 100px;" id="showImageLight2"
                                                     class="card-img-top mb-3"
                                                     src="{{ asset('dist/assets/svg/illustrations-light/oc-browse.svg') }}"
                                                     alt="Image Description" data-hs-theme-appearance="dark">
                                                 <h5>Drag and drop your second file here <span
                                                         class="form-label-secondary">(Optional)</span></h5>
                                                 <input hidden id="image2" accept="image/*" name="image2"
                                                     type="file" class="form-control">
                                                 <label class="btn btn-primary btn-lg mt-3" for="image2">Upload Second
                                                     Image</label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>


                             {{-- my  image  --}}


                         </div>
                         <div class="card-footer d-flex justify-content-end align-items-center gap-3">
                             <a href="{{ route('page.article') }}" class="btn btn-white">Cancel</a>
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </form>


                     {{-- <-- end here --> --}}



                 </div>
             </div>
         </div>
     </div>



     <script>
         document.addEventListener('DOMContentLoaded', function() {
             HSCore.components.HSQuill.init('.js-quill');
         });

         document.addEventListener("DOMContentLoaded", function() {
             new TomSelect("#blog_id", {
                 persist: false,
                 createOnBlur: true,
                 create: true
             });
         });




         document.querySelector('#formArticle').addEventListener('submit', function(event) {
             var quillEditor = document.querySelector('#prag .ql-editor');
             var quillHtml = quillEditor.innerHTML;
             document.querySelector('textarea[name="paragraph"]').value = quillHtml;
         });
     </script>



     <script>
         document.querySelector('#formArticle').addEventListener('submit', function(event) {
             var quillEditor = document.querySelector('#secPrag .ql-editor');
             var quillHtml = quillEditor.innerHTML;
             document.querySelector('textarea[name="paragraph_two"]').value = quillHtml;
         });
     </script>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <script>
         $(document).ready(function() {
             function previewImage(file, defaultImgId, lightImgId) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('#' + defaultImgId).attr('src', e.target.result);
                     $('#' + lightImgId).attr('src', e.target.result);
                 }
                 reader.readAsDataURL(file);
             }

             function handleFileInput(fileInputId, defaultImgId, lightImgId) {
                 $('#' + fileInputId).change(function(e) {
                     var file = e.target.files[0];
                     if (file) {
                         previewImage(file, defaultImgId, lightImgId);
                     }
                 });
             }

             handleFileInput('image1', 'showImageDefault1', 'showImageLight1');
             handleFileInput('image2', 'showImageDefault2', 'showImageLight2');

             function handleDropzone(dropzoneId, fileInputId) {
                 var dropzone = $('#' + dropzoneId);

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
                         $('#' + fileInputId).prop('files', files);
                         $('#' + fileInputId).trigger('change');
                     }
                 });
             }

             handleDropzone('dropzone1', 'image1');
             handleDropzone('dropzone2', 'image2');
         });
     </script>
 @endsection
