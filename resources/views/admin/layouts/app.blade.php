<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Daterangepicker CSS -->
    <link href="{{ asset('admin/vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <!-- Data Table CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />

    <!-- CSS -->
    <link href="{{ asset('admin/dist/css/style.css') }}" rel="stylesheet" type="text/css">
    
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper" data-layout="vertical" data-layout-style="default" data-menu="light" data-footer="simple">
        <!-- Top Navbar -->
        <nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
            <div class="container-fluid">
                <!-- Start Nav -->
                <div class="nav-start-wrap">
                    <button
                        class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span
                            class="icon"><span class="feather-icon"><i
                                    data-feather="align-left"></i></span></span></button>
                </div>
                <!-- /Start Nav -->

                <!-- End Nav -->
                <div class="nav-end-wrap">
                    <ul class="navbar-nav flex-row">

                        <li class="nav-item">
                            <div class="dropdown ps-2">
                                <a class="dropdown-toggle no-caret d-flex align-items-center" href="#"
                                    role="button" data-bs-display="static" data-bs-toggle="dropdown"
                                    data-dropdown-animation data-bs-auto-close="outside" aria-expanded="false">
                                    <div class="avatar avatar-rounded rounded-circle avatar-xs me-2"
                                        style="background-color: #007d88;">
                                        <span
                                            class="initial-wrap text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end shadow-lg border-1 rounded-3">
                                    <div class="dropdown-header">
                                        <h6 class="fw-bold mb-0">{{ Auth::user()->name }}</h6>
                                        <small class="text-muted">Email: {{ Auth::user()->email }}</small>
                                    </div>
                                    <div class="dropdown-divider"></div>

                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item d-flex align-items-center text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /End Nav -->
            </div>
        </nav>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <div class="hk-menu">
            <!-- Brand -->
            <div class="menu-header">
                <span>
                    <a class="navbar-brand" href="/leads">
                        <h5 class="fw-bold mb-0">Webkye</h5>
                    </a>
                    <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                        <span class="icon">
                            <span class="svg-icon fs-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="10" y1="12" x2="20" y2="12"></line>
                                    <line x1="10" y1="12" x2="14" y2="16"></line>
                                    <line x1="10" y1="12" x2="14" y2="8"></line>
                                    <line x1="4" y1="4" x2="4" y2="20"></line>
                                </svg>
                            </span>
                        </span>
                    </button>
                </span>
            </div>
            <!-- /Brand -->

            <!-- Main Menu -->
            <div data-simplebar class="nicescroll-bar">
                <div class="menu-content-wrap">
                    <div class="menu-group">
                        <ul class="navbar-nav flex-column">
                            <li
                                class="nav-item mb-2 {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-template" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <rect x="4" y="4" width="16" height="4" rx="1" />
                                                <rect x="4" y="12" width="6" height="8" rx="1" />
                                                <line x1="14" y1="12" x2="20" y2="12" />
                                                <line x1="14" y1="16" x2="20" y2="16" />
                                                <line x1="14" y1="20" x2="20" y2="20" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">Dashboard</span>
                                    {{-- <span class="badge badge-sm badge-soft-pink ms-auto">Hot</span> --}}
                                </a>
                            </li>

                            <li
                                class="nav-item mb-2 {{ str_starts_with(Route::currentRouteName(), 'admin.faqs') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.faqs.index') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-help-circle" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="9" />
                                                <path d="M12 16v.01" />
                                                <path d="M12 13a3 3 0 1 0 -3 -3" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">FAQs</span>
                                </a>
                            </li>

                            <li
                                class="nav-item mb-2 {{ str_starts_with(Route::currentRouteName(), 'admin.testimonials') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.testimonials.index') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-stars" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.18-6.873l-5-4.867l6.9-1l3.092-6.255l3.092 6.255l6.9 1l-5 4.867l1.18 6.873z" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">Testimonials</span>
                                </a>
                            </li>

                            <li
                                class="nav-item mb-2 {{ str_starts_with(Route::currentRouteName(), 'admin.messages') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.messages.index') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-mail" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                                <polyline points="3 7 12 13 21 7" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">Messages</span>
                                    @if ($unreadMessagesCount > 0)
                                        <span
                                            class="badge badge-sm badge-soft-pink ms-auto">{{ $unreadMessagesCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li
                                class="nav-item mb-2 {{ str_starts_with(Route::currentRouteName(), 'admin.services') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.services.index') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-settings" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">Services</span>
                                </a>
                            </li>
                            
                            <li
                                class="nav-item mb-2 {{ str_starts_with(Route::currentRouteName(), 'admin.case-studies') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.case-studies.index') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-briefcase" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <rect x="3" y="7" width="18" height="13" rx="2" />
                                                <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                                <line x1="12" y1="12" x2="12" y2="12.01" />
                                                <path d="M3 13a20 20 0 0 0 18 0" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">Case Studies</span>
                                </a>
                            </li>
                            
                            <li
                                class="nav-item mb-2 {{ str_starts_with(Route::currentRouteName(), 'admin.blogs') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.blogs.index') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-article" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <rect x="3" y="4" width="18" height="16" rx="2" />
                                                <path d="M7 8h10" />
                                                <path d="M7 12h10" />
                                                <path d="M7 16h10" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">Blogs</span>
                                </a>
                            </li>
                            
                            <li
                                class="nav-item mb-2 {{ str_starts_with(Route::currentRouteName(), 'admin.website-settings') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.website-settings.index') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-adjustments" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="6" cy="10" r="2" />
                                                <line x1="6" y1="4" x2="6" y2="8" />
                                                <line x1="6" y1="12" x2="6" y2="20" />
                                                <circle cx="12" cy="16" r="2" />
                                                <line x1="12" y1="4" x2="12" y2="14" />
                                                <line x1="12" y1="18" x2="12" y2="20" />
                                                <circle cx="18" cy="7" r="2" />
                                                <line x1="18" y1="4" x2="18" y2="5" />
                                                <line x1="18" y1="9" x2="18" y2="20" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">Website Settings</span>
                                </a>
                            </li>

                            <li
                                class="nav-item mb-2 {{ str_starts_with(Route::currentRouteName(), 'admin.newsletters') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.newsletters.index') }}">
                                    <span class="nav-icon-wrap">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-mail" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                                <polyline points="3 7 12 13 21 7" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-link-text">Newsletter</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Main Menu -->
        </div>
        <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        @yield('content')
        <!-- /Main Content -->
    </div>
    <!-- /Wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>

    </script>

    <script>
        $(document).ready(function() {
            $('.edit-users-btn').on('click', function() {
                let empId = $(this).data('emp-id');

                $.ajax({
                    url: '/user/edit/' + empId,
                    type: 'GET',
                    success: function(data) {
                        // Populate modal fields
                        $('#emp_name').val(data.name);
                        $('#emp_email').val(data.email);
                        $('#emp_position').val(data.role);
                        $('#emp_status').val(data.status);
                        $('#emp_password').val(''); // Optional: empty for security

                        // Optionally store users ID for update
                        $('<input>').attr({
                            type: 'hidden',
                            id: 'emp_id',
                            name: 'id',
                            value: data.id
                        }).appendTo('form');
                    },
                    error: function() {
                        alert('Failed to fetch users data.');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.assignAgentModal').on('click', function(e) {
                e.preventDefault();

                // Get leadId from data attribute
                var leadId = $(this).data('leadid');

                // Set value in modal input/display
                $('#lead_id').val(leadId);

                // Show the modal
                var modal = new bootstrap.Modal(document.getElementById('assignAgentModal'));
                modal.show();
            });
        });
    </script>



    <!-- FeatherIcons JS -->
    <script src="{{ asset('admin/dist/js/feather.min.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('admin/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('admin/vendors/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Data Table JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    <script>
        $('#EmpTable').DataTable({
            scrollX: true,
            autoWidth: false,
            language: {
                search: "",
                searchPlaceholder: "Search",
                sLengthMenu: "_MENU_items",
                paginate: {
                    next: '', // or '→'
                    previous: '' // or '←'
                }
            },
            "drawCallback": function() {
                $('.dataTables_paginate > .pagination').addClass('custom-pagination pagination-simple');
            }
        });
    </script>

    <!-- Daterangepicker JS -->
    <script src="{{ asset('admin/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin/dist/js/daterangepicker-data.js') }}"></script>

    <!-- Amcharts Maps JS -->
    {{-- <script src="../../../../cdn.amcharts.com/lib/5/index.js"></script>
    <script src="../../../../cdn.amcharts.com/lib/5/map.js"></script>
    <script src="../../../../cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="../../../../cdn.amcharts.com/lib/5/themes/Animated.js"></script> --}}

    <!-- Apex JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Init JS -->
    <script src="{{ asset('admin/dist/js/init.js') }}"></script>
    <script src="{{ asset('admin/dist/js/chips-init.js') }}"></script>
    {{-- <script src="{{ asset('admin/dist/js/dashboard-data.js') }}"></script> --}}

    @stack('scripts')
</body>

</html>
