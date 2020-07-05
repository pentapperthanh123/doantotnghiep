    <div class="sidebar" data-color="purple">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ url('/') }}" class="simple-text">
                    {{trans('partials/sidebar.logo')}} 
                </a>
            </div>

            <ul class="nav">
                <li {{ TemplateHelper::checkMenuSelected('/') }}>
                    <a href="{{ url('/') }}">
                        <i class="pe-7s-graph"></i>
                        <p>{{trans('partials/sidebar.home')}}</p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('users') }}>
                    <a href="{{ url('/users') }}">
                        <i class="pe-7s-user"></i>
                        <p>{{trans('partials/sidebar.user')}}</p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('rooms') }}>
                    <a href="{{ url('/rooms') }}">     
                        <i class="pe-7s-culture"></i>
                        <p>{{trans('partials/sidebar.room')}}</p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('computers') }}>
                    <a href="{{ url('/computers') }}">
                        <i class="pe-7s-display1"></i>
                        <p>{{trans('partials/sidebar.computer')}}</p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('devices') }}>
                    <a href="{{ url('/devices') }}">
                        <i class="pe-7s-note2"></i>
                        <p>{{trans('partials/sidebar.device')}}</p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('type_devices') }}>
                    <a href="{{ url('/typedevices') }}">
                        <i class="pe-7s-note2"></i>
                        <p>{{trans('partials/sidebar.type_devices')}}</p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('tags') }}>
                    <a href="{{ url('/tags') }}">
                        <i class="pe-7s-ticket"></i>
                        <p>{{trans('partials/sidebar.tag')}}</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('tasks') }}">
                        <i class="pe-7s-note2"></i>
                        <p>{{trans('partials/sidebar.task')}}</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>