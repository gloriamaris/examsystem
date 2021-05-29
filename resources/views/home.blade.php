@extends('layouts.app')

@section('title')
Dashboard - UP Online Examination System
@endsection

@section('content')
    <div class="column">
        <h3 class="title is-3">Dashboard</h3>

        @if ($isAdmin == 1)
        <div class="columns">
            <div class="column">
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="heading">Courses</p>
                        <p class="title">{{ $topics }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="heading">Exams</p>
                        <p class="title">{{ $quizzes }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="heading">Faculty</p>
                        <p class="title">{{ $faculty }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="heading">Students</p>
                        <p class="title">{{ $students }}</p>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="columns mt-5">
            <div class="column is-two-thirds">
                <article class="panel is-primary">
                    <p class="panel-heading">Open exams</p>
                    <div class="panel-block">
                        <a class="panel-block">
                            <span class="panel-icon">
                            <i class="fas fa-book" aria-hidden="true"></i>
                            </span>
                            IS226 - Midterm Exam
                        </a>
                    </div>
                    <div class="panel-block">
                        <a class="panel-block">
                            <span class="panel-icon">
                            <i class="fas fa-book" aria-hidden="true"></i>
                            </span>
                            IS226 - Final Exam
                        </a>
                    </div>
                    <div class="panel-block">
                        <a class="panel-block">
                            <span class="panel-icon">
                            <i class="fas fa-book" aria-hidden="true"></i>
                            </span>
                            DEVC208 - Final Exam
                        </a>
                    </div>
                    <div class="panel-block p-3">
                        <button class="button is-outlined is-primary is-fullwidth">View more</button>
                    </div>
                </article>
                <article class="panel is-info">
                    <p class="panel-heading">Recently registered</p>
                    <div class="panel-block p-2">
                        <span class="panel-icon">
                            <i class="fas fa-user" aria-hidden="true"></i>
                        </span>
                        <p>
                            Jheniel Guardiana<br/>
                            <a href="#">jhenielguardiana@gmail.com</a>
                        </p>
                    </div>
                    <div class="panel-block p-2">
                        <span class="panel-icon">
                            <i class="fas fa-user" aria-hidden="true"></i>
                        </span>
                        <p>
                            Shaina Joy Ceniza<br/>
                            <a href="#">shainaceniza@lamudi.com</a>
                        </p>
                    </div>
                    <div class="panel-block p-2">
                        <span class="panel-icon">
                            <i class="fas fa-user" aria-hidden="true"></i>
                        </span>
                        <p>
                            Eldrin Jay Chit Librea<br/>
                            <a href="#">ejclibrea@up.edu.ph</a>
                        </p>
                    </div>
                    <div class="panel-block p-2">
                        <span class="panel-icon">
                            <i class="fas fa-user" aria-hidden="true"></i>
                        </span>
                        <p>
                            Justin Rafael Mejos<br/>
                            <a href="#">justinmejor@up.edu.ph</a>
                        </p>
                    </div>
                    <div class="panel-block p-2">
                        <span class="panel-icon">
                            <i class="fas fa-user" aria-hidden="true"></i>
                        </span>
                        <p>
                            Isaiah Jan Caracol<br/>
                            <a href="#">isaiahcaracol@wework.ph</a>
                        </p>
                    </div>
                    <div class="panel-block p-2">
                        <button class="button is-outlined is-info is-fullwidth">View more</button>
                    </div>
                </article>
            </div>
            <div class="column">
                <article class="panel is-warning">
                    <p class="panel-heading">Announcements</p>
                    <div class="panel-block">
                        <div class="p-3">
                            <div class="media">
                                <div class="media-left mb-5">
                                    <figure class="image is-48x48">
                                        <img src="https://cataas.com/cat?width=200&height=200" alt="Placeholder image" width="100%">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">Mari Anjeli Crisanto</p>
                                    <p class="subtitle is-6">marianjeli.crisanto@upou.edu.ph</p>
                                </div>
                            </div>
                            <p>
                                Dear Students,<br/>
                                Sit tight as grading is currently in progress. While waiting for your grades to be released, do say goodbye in our Goodbye Forum! Would love to read your parting words especially if you won’t be able to join our Zoom-Ender.
                                <br/>Happy Friday!<br/><br/>
                                <time datetime="2021-05-29">10:09 AM - 29 May 2021</time>
                            </p>
                        </div>
                    </div>
                    <div class="panel-block">
                        <div class="p-3">
                            <div class="media">
                                <div class="media-left mb-5">
                                    <figure class="image is-48x48">
                                        <img src="https://cataas.com/cat/cute?width=200&height=200" alt="Placeholder image" width="100%">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">Ria Mae Borromeo</p>
                                    <p class="subtitle is-6">rhborromeo@upou.edu.ph</p>
                                </div>
                            </div>
                            <p>
                                Hello everyone!<br/>
                                Reminding you all of your deliverables scheduled to be submitted on our last day of classes, May 24. You can do it!<br/>
                                Will be posting an announcement next week if we will have a Zoom Ender before the submission of grades, just in case.
                                <br/><br/>
                                Have a good weekend!<br/><br/>
                                <time datetime="2021-05-29">8:04 AM - 20 May 2021</time>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        @endif
    </div>
@endsection
