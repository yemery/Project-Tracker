<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/project-tracker-logo.svg') }}" alt="project-tracker-logo">
        <ul>
            <li>
                <img src="{{ Str::contains(Request::url(), 'dashboard') ? '/images/dashboard-active.svg' : '/images/dashboard.svg' }}"
                    alt="dashboard-icon">
                <a href="{{ url('dashboard') }}"
                    class="{{ Str::contains(Request::url(), 'dashboard') ? 'active' : '' }}">Dashboard</a>
            </li>
            <li>
                <img src="{{ Str::contains(Request::url(), 'projects') ? '/images/projects-active.svg' : '/images/projects.svg' }}"
                    alt="projects-icon">
                <a href="{{ url('projects') }}"
                    class="{{ Str::contains(Request::url(), 'projects') ? 'active' : '' }}">Projects</a>
            </li>
            <li>
                <img src="{{ Str::contains(Request::url(), 'tasks') ? '/images/tasks-active.svg' : '/images/tasks.svg' }}"
                    alt="tasks-icon">
                <a href="{{ url('tasks') }}"
                    class="{{ Str::contains(Request::url(), 'tasks') ? 'active' : '' }}">Tasks</a>
            </li>
            <li>
                <img src="{{ Str::contains(Request::url(), 'settings') ? '/images/settings-active.svg' : '/images/settings.svg' }}"
                    alt="settings-icon">
                <a href="{{ url('settings') }}"
                    class="{{ Str::contains(Request::url(), 'settings') ? 'active' : '' }}">Settings</a>
            </li>
        </ul>
    </div>
</body>

</html>
