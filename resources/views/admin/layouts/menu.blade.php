<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->

        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
            </a>
            <ul class="dropdown-menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach

            </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="@if(auth()->user()->path_image != '') {{asset('upload/'. auth()->user()->path_image)}} @else {{asset('upload/def.png')}} @endif" class="user-image" alt="User Image">
                <span class="hidden-xs text-capitalize">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img  src="@if(auth()->user()->path_image != '') {{asset('upload/'. auth()->user()->path_image)}} @else {{asset('upload/def.png')}} @endif" class="img-circle" alt="User Image" style="width: 70px; height: 70px">

                    <p class="text-capitalize">
                        {{auth()->user()->first_name}} {{auth()->user()->last_name}} - {{auth()->user()->username}}
                        <small>Member since {{date('F,y', strtotime(auth()->user()->created_at))}}</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="{{route('profile',auth()->user()->id)}}" class="btn btn-default btn-flat">@lang('admin.profile')</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('logout')}}" class="btn btn-default btn-flat">@lang('admin.sign-out')</a>
                    </div>
                </li>
            </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
    </ul>
</div>
