<nav class="navbar navbar-default hidden-md" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            Menu
        </button>
    </div>
</nav>

<div class="navbar-default sidebar hidden-print" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <a class="navbar-brand text-center" title="Home | {{ Option::get('agency_tagline', 'Laravel app description') }}" href="{{ route('home') }}">
            {{ appLogoImage(['class' => 'sidebar-logo']) }}
            <div class="small" style="margin-top:10px">{{ config('app.name') }}</div>
        </a>
        <div class="text-center" style="border-bottom: 1px solid #e7e7e7; padding-bottom: 10px">
            {{ trans('lang.lang') }} :
            {!! FormField::formButton(
                [
                    'route'  => 'users.profile.switch-lang',
                    'method' => 'patch',
                    'title'  => auth()->user()->lang != 'en' ? trans('lang.switch_tooltip', ['lang' => trans('lang.en')]) : ''
                ],
                'EN',
                ['class' => 'btn btn-default btn-xs', 'id' => 'switch_lang_en']
                + (auth()->user()->lang == 'en' ? ['disabled' => 'disabled'] : []),
                ['lang' => 'en']
            ) !!}
            {!! FormField::formButton(
                [
                    'route'  => 'users.profile.switch-lang',
                    'method' => 'patch',
                    'title'  => auth()->user()->lang != 'id' ? trans('lang.switch_tooltip', ['lang' => trans('lang.id')]) : ''
                ],
                'ID',
                ['class' => 'btn btn-default btn-xs', 'id' => 'switch_lang_id']
                + (auth()->user()->lang == 'id' ? ['disabled' => 'disabled'] : []),
                ['lang' => 'id']
            ) !!}
        </div>
        <ul class="nav" id="side-menu">
            <li>{!! html_link_to_route('home', trans('nav_menu.dashboard'), [], ['icon' => 'dashboard']) !!}</li>
            @can('manage_agency')
            <li>{!! html_link_to_route('jobs.index', trans('job.on_progress').' <span class="badge pull-right">'.AdminDashboard::onProgressJobCount().'</span>', [], ['icon' => 'tasks']) !!}</li>
            <li>
                {!! html_link_to_route('projects.index', trans('project.projects') . ' <span class="fa arrow"></span>', [], ['icon' => 'table']) !!}
                @include('view-components.sidebar-project-list-links')
            </li>
            <li>{!! html_link_to_route('reports.payments.yearly', trans('dashboard.yearly_earnings'), [], ['icon' => 'line-chart']) !!}</li>
            <li>{!! html_link_to_route('reports.current-credits', trans('dashboard.receiveable_earnings'), [], ['icon' => 'money']) !!}</li>
            <li>{!! html_link_to_route('users.calendar', trans('nav_menu.calendar'), [], ['icon' => 'calendar']) !!}</li>
            <li>{!! html_link_to_route('subscriptions.index', trans('subscription.subscription'), [], ['icon' => 'retweet']) !!}</li>
            <li>{!! html_link_to_route('invoices.index', trans('invoice.list'), [], ['icon' => 'table']) !!}</li>
            <li>{!! html_link_to_route('payments.index', trans('payment.payments'), [], ['icon' => 'money']) !!}</li>
            <li>{!! html_link_to_route('customers.index', trans('customer.list'), [], ['icon' => 'users']) !!}</li>
            <li>{!! html_link_to_route('vendors.index', trans('vendor.list'), [], ['icon' => 'users']) !!}</li>
            @endcan
            @can('manage_backups')
            <li><a href="{{ route('backups.index') }}"><i class="fa fa-refresh fa-fw"></i> {{ trans('backup.list') }}</a></li>
            @endcan
            <li>{!! html_link_to_route('auth.change-password', trans('auth.change_password'), [], ['icon' => 'lock']) !!}</li>
            <li>{!! html_link_to_route('auth.logout', trans('auth.logout'), [], ['icon' => 'sign-out']) !!}</li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
