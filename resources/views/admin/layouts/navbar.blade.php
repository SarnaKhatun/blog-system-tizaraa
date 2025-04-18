<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                   aria-expanded="false">
                    <div class="avatar-sm">
                        @if(Auth::user()->image)
                            <img src="{{ asset('backend/images/user/'.Auth::user()->image ?? '/backend/images/user.jpeg') }}" alt="noimg"
                            class="avatar-img rounded-circle"/>
                        @else
                          <img src="/backend/images/user.jpeg" alt="noimg"
                             class="avatar-img rounded-circle"/>
                        @endif

                    </div>
                    <span class="profile-username">
                                        {{-- <span class="op-7">Hi,</span> --}}
                                        <span class="fw-bold">{{ auth()->user()->name ?? ''}}</span>
                                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    @if(Auth::user()->image)
                                        <img src="{{ asset('backend/images/user/'.Auth::user()->image ?? '/backend/images/user.jpeg') }}" alt="noimg"
                                        class="avatar-img rounded-circle"/>
                                    @else
                                    <img src="/backend/images/user.jpeg" alt="noimg"
                                        class="avatar-img rounded-circle"/>
                                    @endif
                                </div>
                                <div class="u-text">
                                    <h4>{{auth()->user()->name ?? ''}}</h4>
                                    <p class="text-muted">{{auth()->user()->email ?? ''}}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('profile.edit')  }}">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('logout') }}" id="logout-form" method="post"
                                  class="d-none">@csrf</form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>



@push('scripts')
    <script>
        $(document).ready(function() {
            $('#search').change(function() {
                $('#clientSearch').hide();
                $('#directorSearch').hide();
                $('#schemeSearch').hide();
                $('#memberSearch').hide();
                $('#providentSearch').hide();
                $('#collectionSearch').hide();
                $('#withdrawSearch').hide();
                $('#userSearch').hide();


                var selectedValue = $(this).val();
                if (selectedValue === '1') {
                    $('#clientSearch').show();
                }
                else if (selectedValue === '2') {
                    $('#directorSearch').show();
                }
                else if (selectedValue === '3') {
                    $('#schemeSearch').show();
                }
                else if (selectedValue === '4') {
                    $('#memberSearch').show();
                }
                else if (selectedValue === '5') {
                    $('#providentSearch').show();
                }
                else if (selectedValue === '6') {
                    $('#collectionSearch').show();
                }
                else if (selectedValue === '7') {
                    $('#withdrawSearch').show();
                }
                else if (selectedValue === '8') {
                    $('#userSearch').show();
                }
            });
        });
    </script>
@endpush

