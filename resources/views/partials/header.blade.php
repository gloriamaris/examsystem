<nav class="navbar navbar-height is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('home') }}">
            <img src="upou-exam-logo.png" class="header-img">
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
        <a class="navbar-item {{ \Route::current()->getName() === 'home' ? 'navbar-link-is-active' : '' }}"
            href="{{ route('home') }}">
            Home
        </a>

        <a class="navbar-item {{ \Route::current()->getName() === 'topics.index' ? 'navbar-link-is-active' : '' }}"
            href="{{ route('topics.index') }}">
            Courses
        </a>

        <a class="navbar-item {{ \Route::current()->getName() === 'questions.index' ? 'navbar-link-is-active' : '' }}"
            href="{{ route('questions.index') }}">
            Exams
        </a>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link {{ \Route::current()->getName() === 'users.index' || \Route::current()->getName() === 'roles.index' ? 'navbar-link-is-active' : '' }}">
            Admin Panel
            </a>

            <div class="navbar-dropdown">
                <a class="navbar-item {{ \Route::current()->getName() === 'users.index' ? 'navbar-link-is-active' : '' }}"
                    href="{{ route('users.index') }}">
                    Announcements
                </a>
                <a class="navbar-item {{ \Route::current()->getName() === 'users.index' ? 'navbar-link-is-active' : '' }}"
                    href="{{ route('users.index') }}">
                    Users
                </a>
                <a class="navbar-item {{ \Route::current()->getName() === 'roles.index' ? 'navbar-link-is-active' : '' }}"
                    href="{{ route('roles.index') }}">
                    User Roles
                </a>
            </div>
        </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                <a class="button is-primary" href="{{ route('tests.index') }}">
                    <strong>Create exam</strong>
                </a>
                <a class="button is-dark is-inverted"
                    href="{{ route('home') }}#logout">
                    Log out
                </a>
                </div>
            </div>
        </div>
    </div>
</nav>