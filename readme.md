# Exam System

A final deliverable for IS226 Web Information Systems.

Built on top of Laravel Quiz which is generated from Quick Admin Panel tool, but the UI is fully redesigned and the backend customized as needed.
The app is hosted at [http://examsystemis1226.herokuapp.com](http://examsystemis1226.herokuapp.com).

## How to use

#### Using Docker
- Clone the repository with __git clone__
- Run __make setup__
- Run __docker-compose run --rm app php artisan db:seed__ to add initial data.
- Access via __http://localhost:8888__

#### Without Docker
- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Now you can login as admin: launch the main URL and login with default credentials __admin@admin.com__ - __password__
- Fill in the database with topics, questions and options
- For social login - fill in the credentials of your social apps in .env file
- That's it - allow people to register and take quizzes!

## License
Basically, feel free to use and re-use any way you want.


