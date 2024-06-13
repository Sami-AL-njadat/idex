@extends('layout.master')

@section('content')

    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Blog <span class="badge bg-soft-dark text-dark ms-2">72,031</span></h1>


                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="{{ route('pageBlog.add') }}">Add Blog</a>
                </div>
            </div>

            <div class="js-nav-scroller hs-nav-scroller-horizontal">


                <ul class="nav nav-tabs page-header-tabs" id="pageHeaderTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">All Blog</a>
                    </li>

                </ul>
            </div>
        </div>


        <div class="card">
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search blogs"
                                aria-label="Search blogs">
                        </div>
                    </form>
                </div>

            </div>


            <div class="table-responsive datatable-custom">
                <table id="datatable"
                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
               "columnDefs": [{
                  "targets": [2, 3],
                  "width": "25%",
                  "orderable": true
                }],
               "order": [],
               "info": {
                 "totalQty": "#datatableWithPaginationInfoTotalQty"
               },
               "search": "#datatableSearch",
               "entries": "#datatableEntries",
               "pageLength": 5,
               "isResponsive": true,
               "isShowPaging": true,
               "pagination": "datatablePagination"
             }'>
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    @if (isset($blogs) && count($blogs) > 0)
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $num }}</td>
                                    <td>
                                        <a class="d-flex align-items-center" href="{{ route('pageBlog.edit', $blog->id) }}">
                                            <div class="flex-shrink-0">
                                                <img class="avatar avatar-lg" src="{{ asset($blog->image) }}"
                                                    alt="Blog Image">
                                            </div>
                                        </a>
                                    </td>
                                    <td>{{ $blog->title }}</td>
                                    <td>
                                        <div class="scrollable-cell">
                                            <span>
                                                {!! $blog->description !!}
                                            </span>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty"
                                                id="actionsDropdown{{ $blog->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi-three-dots"></i>
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-end m-1"
                                                aria-labelledby="actionsDropdown{{ $blog->id }}">
                                                <a class="dropdown-item" href="{{ route('pageBlog.edit', $blog->id) }}">
                                                    <i class="bi-pencil-fill me-1"></i> Edit
                                                </a>
                                                <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $blog->id }}">
                                                    <i class="bi-trash dropdown-item-icon"></i> Delete
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $blog->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $blog->id }}">
                                                            Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this item?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('blog.destroy', $blog->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                @php
                                    $num += 1;
                                @endphp
                            @endforeach
                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td colspan="5">
                                    <div id="noDataMessage" class="text-center p-4">
                                        <img class="mb-3" src="{{ asset('dist/assets/svg/illustrations/oc-error.svg') }}"
                                            alt="Image Description" style="width: 10rem;"
                                            data-hs-theme-appearance="default">
                                        <img class="mb-3"
                                            src="{{ asset('dist/assets/svg/illustrations-light/oc-error.svg') }}"
                                            alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                                        <p class="mb-0">No data to show</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endif

                </table>
            </div>



          <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Showing:</span>

                            <div class="tom-select-custom">
                                <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto"
                                    autocomplete="on"
                                    data-hs-tom-select-options='{"searchInDropdown": true, "hideSearch": true}'>
                                  
                                    <option value="5" selected>5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                  
                                </select>

                            </div>

                            <span class="text-secondary me-2">of</span>

                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Include Bootstrap JS (optional for styling) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- DataTables Initialization Script -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            HSCore.components.HSDatatables.init('.js-datatable');
        });
    </script>
    <script>
        $(document).ready(function() {
            var datatable = $('#datatable').DataTable({
                "columnDefs": [{
                    // "targets": [0, 1, 2, 3],
                    // "width": "25%",
                    "orderable": true
                }],
                "order": [],
                "pageLength": 5,
                "paging": true,
                "info": true,
                "language": {
                    "paginate": {
                        "previous": "<i class='bi bi-arrow-left ></i>",
                        "next": "<i class='bi bi-arrow-right'></i>"
                    }
                },
                  "language": {
                    "paginate": {
                        "previous": "<i class='bi bi-arrow-left '></i>",
                        "next": "<i class='bi bi-arrow-right'></i>"
                    }
                },
                "autoWidth": false, 
                "drawCallback": function() {
                    var api = this.api();
                    var pageInfo = api.page.info();

                     $('#datatableWithPaginationInfoTotalQty').text(pageInfo.recordsTotal);

                     var paginationHTML = '<li class="page-item previous' + (pageInfo.page === 0 ?
                        'd-none' : '') + '"><a class="page-link" href="#">Previous</a></li>';
                    for (var i = 0; i < pageInfo.pages; i++) {
                        var activeClass = (i === pageInfo.page) ? 'active' : '';
                        paginationHTML +=
                            `<li class="page-item ${activeClass}"><a class="page-link" href="#">${i + 1}</a></li>`;
                    }
                    paginationHTML += '<li class="page-item next ' + (pageInfo.page === pageInfo.pages -
                        1 ? 'd-none' : '') + '"><a class="page-link" href="#">Next</a></li>';

                    $('#datatablePagination').html(`<ul class="pagination">${paginationHTML}</ul>`);

                     $('#datatablePagination').find('a').off('click').on('click', function(e) {
                        e.preventDefault();
                        var pageIndex = $(this).text();
                        if (pageIndex === 'Previous') {
                            if (pageInfo.page > 0) {
                                api.page(pageInfo.page - 1).draw(false);
                            }
                        } else if (pageIndex === 'Next') {
                            if (pageInfo.page < pageInfo.pages - 1) {
                                api.page(pageInfo.page + 1).draw(false);
                            }
                        } else {
                            api.page(parseInt(pageIndex) - 1).draw(false);
                        }
                    });
                }
            });


            // Debounce search input
            var debounceTimer;
            $('#datatableSearch').on('keyup', function() {
                clearTimeout(debounceTimer);
                var searchValue = $(this).val();
                debounceTimer = setTimeout(function() {
                    datatable.search(searchValue).draw();
                }, 300); // Adjust debounce delay as needed
            });

            $('#datatableEntries').on('change', function() {
                datatable.page.len($(this).val()).draw();
            });

            // Reset search on mouseup if input is cleared
            $('#datatableSearch').on('mouseup', function() {
                var $input = $(this),
                    oldValue = $input.val();

                if (oldValue === "") return;

                setTimeout(function() {
                    if ($input.val() === "") {
                        datatable.search('').draw();
                    }
                }, 1);
            });

            // Improved form submission (assuming this is meant to delete rows)
            function deleteBlog() {
                $('#deleteForm').submit();
            }
        });
    </script>

    <!-- JS Plugins Init. -->
    <script>
        (function() {
            window.onload = function() {


                new HSSideNav('.js-navbar-vertical-aside').init()


                // INITIALIZATION OF FORM SEARCH
                // =======================================================
                new HSFormSearch('.js-form-search')


                // INITIALIZATION OF BOOTSTRAP DROPDOWN
                // =======================================================
                HSBsDropdown.init()


                // INITIALIZATION OF SELECT
                // =======================================================
                HSCore.components.HSTomSelect.init('.js-select')


                // INITIALIZATION OF NAV SCROLLER
                // =======================================================
                new HsNavScroller('.js-nav-scroller')


                // INITIALIZATION OF DROPZONE
                // =======================================================
                HSCore.components.HSDropzone.init('.js-dropzone')
            }
        })()
    </script>

    <!-- Style Switcher JS -->

    <script>
        (function() {
            // STYLE SWITCHER
            // =======================================================
            const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
            const $variants = document.querySelectorAll(
                `[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

            // Function to set active style in the dorpdown menu and set icon for dropdown trigger
            const setActiveStyle = function() {
                $variants.forEach($item => {
                    if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                        $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                        return $item.classList.add('active')
                    }

                    $item.classList.remove('active')
                })
            }

            // Add a click event to all items of the dropdown to set the style
            $variants.forEach(function($item) {
                $item.addEventListener('click', function() {
                    HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                })
            })

            setActiveStyle()

            window.addEventListener('on-hs-appearance-change', function() {
                setActiveStyle()
            })
        })()
    </script>



@endsection
