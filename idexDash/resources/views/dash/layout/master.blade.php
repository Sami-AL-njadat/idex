<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dashboard | IDEX</title>

    <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('images/logoidex.png')}}">

    <!-- Font -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css">


    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/quill/dist/quill.snow.css') }}">


    <link rel="preload" href="{{ asset('dist/assets/css/theme.min.css') }}" data-hs-appearance="default"
        as="style">
    <link rel="preload" href="{{ asset('dist/assets/css/theme-dark.min.css') }}" data-hs-appearance="dark"
        as="style" onload="this.onload=null;this.rel='stylesheet'">


    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;
        }
    </style>

    <script>
        window.hs_config = {
            "autopath": "@@autopath",
            "deleteLine": "hs-builder:delete",
            "deleteLine:build": "hs-builder:build-delete",
            "deleteLine:dist": "hs-builder:dist-delete",
            "previewMode": false,
            "startPath": "/index.html",
            "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                "version": "?v=1.0"
            },
            "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                },
                "header": {
                    "layoutMode": "default",
                    "containerMode": "container-fluid"
                },
                "sidebarLayout": "default"
            },
            "themeAppearance": {
                "layoutSkin": "default",
                "sidebarSkin": "default",
                "styles": {
                    "colors": {
                        "primary": "#377dff",
                        "transparent": "transparent",
                        "white": "#fff",
                        "dark": "132144",
                        "gray": {
                            "100": "#f9fafc",
                            "900": "#1e2022"
                        }
                    },
                    "font": "Inter"
                }
            },
            "languageDirection": {
                "lang": "en"
            },
            "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js",
                    "assets/js/demo.js"
                ],
                "build": ["assets/css/theme.css",
                    "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js",
                    "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css",
                    "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js",
                    "assets/js/hs.theme-appearance-charts.js",
                    "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js",
                    "assets/js/demo.js"
                ]
            },
            "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
            "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                },
                "build": {
                    "*assets/js/theme-custom.js": "",
                    "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            },
            "buildFolder": "",
            "replacePathsToCDN": {},
            "directoryNames": {
                "src": "./src",
                "dist": "./dist",
                "build": "./build"
            },
            "fileNames": {
                "dist": {
                    "js": "theme.min.js",
                    "css": "theme.min.css"
                },
                "build": {
                    "css": "theme.min.css",
                    "js": "theme.min.js",
                    "vendorCSS": "vendor.min.css",
                    "vendorJS": "vendor.min.js"
                }
            },
            "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

    <script src="{{ asset('dist/assets/js/hs.theme-appearance.js') }}"></script>

    <script src="{{ asset('dist/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js') }}">
    </script>

    <!-- ========== HEADER ========== -->

    @include('dash.layout.nav')

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->


    @include('dash.layout.side')

    <!-- End Navbar Vertical -->
    <main id="content" role="main" class="main">

        @yield('content')

        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== SECONDARY CONTENTS ========== -->

        <!-- Keyboard Shortcuts -->

        <!-- End Keyboard Shortcuts -->

        <!-- Activity -->

        <!-- End Activity -->

        <!-- Welcome Message Modal -->
        <div class="modal fade" id="welcomeMessageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-close">
                        <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="bi-x-lg"></i>
                        </button>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="modal-body p-sm-5">
                        <div class="text-center">
                            <div class="w-75 w-sm-50 mx-auto mb-4">
                                <img class="img-fluid" src="./assets/svg/illustrations/oc-collaboration.svg"
                                    alt="Image Description" data-hs-theme-appearance="default">
                                <img class="img-fluid" src="./assets/svg/illustrations-light/oc-collaboration.svg"
                                    alt="Image Description" data-hs-theme-appearance="dark">
                            </div>

                            <h4 class="h1">Welcome to Front</h4>

                            <p>We're happy to see you in our community.</p>
                        </div>
                    </div>
                    <!-- End Body -->

                    <!-- Footer -->
                    <div class="modal-footer d-block text-center py-sm-5">
                        <small class="text-cap text-muted">Trusted by the world's best teams</small>

                        <div class="w-85 mx-auto">
                            <div class="row justify-content-between">
                                <div class="col">
                                    <img class="img-fluid" src="./assets/svg/brands/gitlab-gray.svg"
                                        alt="Image Description">
                                </div>
                                <div class="col">
                                    <img class="img-fluid" src="./assets/svg/brands/fitbit-gray.svg"
                                        alt="Image Description">
                                </div>
                                <div class="col">
                                    <img class="img-fluid" src="./assets/svg/brands/flow-xo-gray.svg"
                                        alt="Image Description">
                                </div>
                                <div class="col">
                                    <img class="img-fluid" src="./assets/svg/brands/layar-gray.svg"
                                        alt="Image Description">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>

        <!-- End Welcome Message Modal -->

        <!-- Create a new user Modal -->
        <div class="modal fade" id="inviteUserModal" tabindex="-1" aria-labelledby="inviteUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="inviteUserModalLabel">Invite users</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <!-- Form -->
                        <div class="mb-4">
                            <div class="input-group mb-2 mb-sm-0">
                                <input type="text" class="form-control" name="fullName"
                                    placeholder="Search name or emails" aria-label="Search name or emails">

                                <div class="input-group-append input-group-append-last-sm-down-none">
                                    <!-- Select -->
                                    <div class="tom-select-custom tom-select-custom-end">
                                        <select class="js-select form-select" autocomplete="off"
                                            data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true,
                            "dropdownWidth": "11rem"
                          }'>
                                            <option value="guest" selected>Guest</option>
                                            <option value="can edit">Can edit</option>
                                            <option value="can comment">Can comment</option>
                                            <option value="full access">Full access</option>
                                        </select>
                                    </div>
                                    <!-- End Select -->

                                    <a class="btn btn-primary d-none d-sm-inline-block" href="javascript:;">Invite</a>
                                </div>
                            </div>

                            <a class="btn btn-primary w-100 d-sm-none" href="javascript:;">Invite</a>
                        </div>
                        <!-- End Form -->

                        <div class="row">
                            <h5 class="col modal-title">Invite users</h5>

                            <div class="col-auto">
                                <a class="d-flex align-items-center small text-body" href="#">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="./assets/svg/brands/gmail-icon.svg" alt="Image Description">
                                    Import contacts
                                </a>
                            </div>
                        </div>

                        <hr class="mt-2">

                        <ul class="list-unstyled list-py-2 mb-0">
                            <!-- List Group Item -->
                            <li>
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="./assets/img/160x160/img10.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 ms-3">
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <h5 class="mb-0">Amanda Harvey <i
                                                        class="bi-patch-check-fill text-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Top endorsed"></i></h5>
                                                <span class="d-block small">amanda@site.com</span>
                                            </div>

                                            <div class="col-sm-auto">
                                                <!-- Select -->
                                                <div class="tom-select-custom tom-select-custom-sm-end">
                                                    <select
                                                        class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0"
                                                        autocomplete="off"
                                                        data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                                                        <option value="guest" selected>Guest</option>
                                                        <option value="can edit">Can edit</option>
                                                        <option value="can comment">Can comment</option>
                                                        <option value="full access">Full access</option>
                                                        <option value="remove"
                                                            data-option-template='<div class="text-danger">Remove</div>'>
                                                            Remove
                                                        </option>
                                                    </select>
                                                </div>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </div>
                            </li>
                            <!-- End List Group Item -->

                            <!-- List Group Item -->
                            <li>
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="./assets/img/160x160/img3.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 ms-3">
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <h5 class="mb-0">David Harrison</h5>
                                                <span class="d-block small">david@site.com</span>
                                            </div>

                                            <div class="col-sm-auto">
                                                <!-- Select -->
                                                <div class="tom-select-custom tom-select-custom-sm-end">
                                                    <select
                                                        class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0"
                                                        autocomplete="off"
                                                        data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                                                        <option value="guest" selected>Guest</option>
                                                        <option value="can edit">Can edit</option>
                                                        <option value="can comment">Can comment</option>
                                                        <option value="full access">Full access</option>
                                                        <option value="remove"
                                                            data-option-template='<div class="text-danger">Remove</div>'>
                                                            Remove
                                                        </option>
                                                    </select>
                                                </div>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </div>
                            </li>
                            <!-- End List Group Item -->

                            <!-- List Group Item -->
                            <li>
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="./assets/img/160x160/img9.jpg"
                                                alt="Image Description">
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 ms-3">
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <h5 class="mb-0">Ella Lauda <i
                                                        class="bi-patch-check-fill text-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Top endorsed"></i></h5>
                                                <span class="d-block small">Markvt@site.com</span>
                                            </div>

                                            <div class="col-sm-auto">
                                                <!-- Select -->
                                                <div class="tom-select-custom tom-select-custom-sm-end">
                                                    <select
                                                        class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0"
                                                        autocomplete="off"
                                                        data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                                                        <option value="guest" selected>Guest</option>
                                                        <option value="can edit">Can edit</option>
                                                        <option value="can comment">Can comment</option>
                                                        <option value="full access">Full access</option>
                                                        <option value="remove"
                                                            data-option-template='<div class="text-danger">Remove</div>'>
                                                            Remove
                                                        </option>
                                                    </select>
                                                </div>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </div>
                            </li>
                            <!-- End List Group Item -->

                            <!-- List Group Item -->
                            <li>
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">B</span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 ms-3">
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <h5 class="mb-0">Bob Dean</h5>
                                                <span class="d-block small">bob@site.com</span>
                                            </div>

                                            <div class="col-sm-auto">
                                                <!-- Select -->
                                                <div class="tom-select-custom tom-select-custom-sm-end">
                                                    <select
                                                        class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0"
                                                        autocomplete="off"
                                                        data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                                                        <option value="guest" selected>Guest</option>
                                                        <option value="can edit">Can edit</option>
                                                        <option value="can comment">Can comment</option>
                                                        <option value="full access">Full access</option>
                                                        <option value="remove"
                                                            data-option-template='<div class="text-danger">Remove</div>'>
                                                            Remove
                                                        </option>
                                                    </select>
                                                </div>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </div>
                            </li>
                            <!-- End List Group Item -->
                        </ul>
                    </div>
                    <!-- End Body -->

                    <!-- Footer -->
                    <div class="modal-footer">
                        <div class="row align-items-center flex-grow-1 mx-n2">
                            <div class="col-sm-9 mb-2 mb-sm-0">
                                <input type="hidden" id="inviteUserPublicClipboard"
                                    value="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/">

                                <p class="modal-footer-text">The public share <a href="#">link settings</a>
                                    <i class="bi-question-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="The public share link allows people to view the project without giving access to full collaboration features."></i>
                                </p>
                            </div>

                            <div class="col-sm-3 text-sm-end">
                                <a class="js-clipboard btn btn-white btn-sm text-nowrap" href="javascript:;"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard!"
                                    data-hs-clipboard-options='{
                  "type": "tooltip",
                  "successText": "Copied!",
                  "contentTarget": "#inviteUserPublicClipboard",
                  "container": "#inviteUserModal"
                 }'>
                                    <i class="bi-link-45deg me-1"></i> Copy link</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>

        </div>
        <!-- End Create a new user Modal -->
        <!-- ========== END SECONDARY CONTENTS ========== -->

        <!-- JS Global Compulsory  -->
        <script src="{{ asset('dist/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/hs-add-field/dist/hs-add-field.min.js') }}"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{ asset('dist/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/hs-form-search/dist/hs-form-search.min.js') }}"></script>

        <script src="{{ asset('dist/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}">
        </script>
        <script src="{{ asset('dist/assets/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/tom-select/dist/js/tom-select.complete.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/clipboard/dist/clipboard.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/datatables.net.extensions/select/select.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>

        <!-- JS Front -->
        <script src="{{ asset('dist/assets/js/theme.min.js') }}"></script>
        <script src="{{ asset('dist/assets/js/hs.theme-appearance-charts.js') }}"></script>


        <script src="{{ asset('dist/assets/vendor/quill/dist/quill.min.js') }}"></script>

        <script src="{{ asset('dist/assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js') }}"></script>
        <script src="{{ asset('dist/assets/vendor/hs-file-attach/dist/hs-file-attach.min.js') }}"></script>


        <!-- JS Plugins Init. -->
        <script>
            (function() {
                localStorage.removeItem('hs_theme')

                window.onload = function() {

                    // INITIALIZATION OF DROPZONE
                    // =======================================================
                    HSCore.components.HSDropzone.init('.js-dropzone')


                    // INITIALIZATION OF ADD FIELD
                    // =======================================================
                    new HSAddField('.js-add-field', {
                        addedField: field => {
                            HSCore.components.HSTomSelect.init(field.querySelector('.js-select-dynamic'))
                        }
                    })



                    // INITIALIZATION OF SELECT
                    // =======================================================

                    /// sami must  make sure if this function it  will  work  good 

                    // INITIALIZATION OF FILE ATTACHMENT
                    // =======================================================
                    new HSFileAttach('.js-file-attach')





                    // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                    // =======================================================
                    new HSSideNav('.js-navbar-vertical-aside').init()


                    // INITIALIZATION OF FORM SEARCH
                    // =======================================================
                    // const HSFormSearchInstance = new HSFormSearch('.js-form-search')

                    // if (HSFormSearchInstance.collection.length) {
                    //     HSFormSearchInstance.getItem(1).on('close', function(el) {
                    //         el.classList.remove('top-0')
                    //     })

                    //     document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                    //         let dataOptions = JSON.parse(e.currentTarget.getAttribute(
                    //                 'data-hs-form-search-options')),
                    //             $menu = document.querySelector(dataOptions.dropMenuElement)

                    //         $menu.classList.add('top-0')
                    //         $menu.style.left = 0
                    //     })
                    // }


                    // INITIALIZATION OF BOOTSTRAP DROPDOWN
                    // =======================================================
                    HSBsDropdown.init()


                    // INITIALIZATION OF CHARTJS
                    // =======================================================
                    HSCore.components.HSChartJS.init('.js-chart')








                    // INITIALIZATION OF SELECT
                    // =======================================================
                    HSCore.components.HSTomSelect.init('.js-select')


                    // INITIALIZATION OF CLIPBOARD
                    // =======================================================
                    HSCore.components.HSClipboard.init('.js-clipboard')
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

                // Call the setActiveStyle on load page
                setActiveStyle()

                // Add event listener on change style to call the setActiveStyle function
                window.addEventListener('on-hs-appearance-change', function() {
                    setActiveStyle()
                })
            })()
        </script>


        <script>
            $(document).ready(function() {

                //                 Sync Quill content with hidden textarea on form submit
                //                 $('form').on('submit', function() {
                //                     var quillHtml = $('#desc .ql-editor').html();
                //  console.log(quillHtml);
                //                 return false;
                //                     $('textarea[name="description"]').val(quillHtml);
                //                 });



                // Daterangepicker initialization





                const datatable = HSCore.components.HSDatatables.getItem(0);

                document.querySelectorAll('.js-datatable-filter').forEach(function(item) {
                    item.addEventListener('change', function(e) {
                        const elVal = e.target.value,
                            targetColumnIndex = e.target.getAttribute('data-target-column-index'),
                            targetTable = e.target.getAttribute('data-target-table');

                        HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex)
                            .search(elVal !== 'null' ? elVal : '').draw();
                    });
                });

                // Other initializations
                HSCore.components.HSDropzone.init('.js-dropzone');
                new HSAddField('.js-add-field', {
                    addedField: field => {
                        HSCore.components.HSTomSelect.init(field.querySelector('.js-select-dynamic'));
                    }
                });
                new HSFileAttach('.js-file-attach');
                new HSSideNav('.js-navbar-vertical-aside').init();
                const HSFormSearchInstance = new HSFormSearch('.js-form-search');

                if (HSFormSearchInstance.collection.length) {
                    HSFormSearchInstance.getItem(1).on('close', function(el) {
                        el.classList.remove('top-0');
                    });

                    document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                        let dataOptions = JSON.parse(e.currentTarget.getAttribute(
                                'data-hs-form-search-options')),
                            $menu = document.querySelector(dataOptions.dropMenuElement);

                        $menu.classList.add('top-0');
                        $menu.style.left = 0;
                    });
                }

                HSBsDropdown.init();
                HSCore.components.HSChartJS.init('.js-chart');
                HSCore.components.HSChartJS.init('#updatingBarChart');
                const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart');

                document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
                    item.addEventListener('click', e => {
                        let keyDataset = e.currentTarget.getAttribute('data-datasets');

                        const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart',
                            HSThemeAppearance.getAppearance());

                        if (keyDataset === 'lastWeek') {
                            updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25",
                                "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"
                            ];
                            updatingBarChart.data.datasets = [{
                                "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                                "backgroundColor": styles.data.datasets[0].backgroundColor,
                                "hoverBackgroundColor": styles.data.datasets[0]
                                    .hoverBackgroundColor,
                                "borderColor": styles.data.datasets[0].borderColor,
                                "maxBarThickness": 10
                            }, {
                                "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                                "backgroundColor": styles.data.datasets[1].backgroundColor,
                                "borderColor": styles.data.datasets[1].borderColor,
                                "maxBarThickness": 10
                            }];
                            updatingBarChart.update();
                        } else {
                            updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5",
                                "May 6", "May 7", "May 8", "May 9", "May 10"
                            ];
                            updatingBarChart.data.datasets = [{
                                "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                                "backgroundColor": styles.data.datasets[0].backgroundColor,
                                "hoverBackgroundColor": styles.data.datasets[0]
                                    .hoverBackgroundColor,
                                "borderColor": styles.data.datasets[0].borderColor,
                                "maxBarThickness": 10
                            }, {
                                "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                                "backgroundColor": styles.data.datasets[1].backgroundColor,
                                "borderColor": styles.data.datasets[1].borderColor,
                                "maxBarThickness": 10
                            }];
                            updatingBarChart.update();
                        }
                    });
                });

                HSCore.components.HSChartJS.init('.js-chart-datalabels', {
                    plugins: [ChartDataLabels],
                    options: {
                        plugins: {
                            datalabels: {
                                anchor: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? 'end' : 'center';
                                },
                                align: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? 'end' : 'center';
                                },
                                color: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? context.dataset.backgroundColor : context.dataset
                                        .color;
                                },
                                font: function(context) {
                                    var value = context.dataset.data[context.dataIndex],
                                        fontSize = 25;

                                    if (value.r > 50) {
                                        fontSize = 35;
                                    }

                                    if (value.r > 70) {
                                        fontSize = 55;
                                    }

                                    return {
                                        weight: 'lighter',
                                        size: fontSize
                                    };
                                },
                                formatter: function(value) {
                                    return value.r;
                                },
                                offset: 2,
                                padding: 0
                            }
                        },
                    }
                });

                HSCore.components.HSTomSelect.init('.js-select');
                HSCore.components.HSClipboard.init('.js-clipboard');
            });
        </script>
</body>

</html>
