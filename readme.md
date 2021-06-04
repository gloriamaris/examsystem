# Exam System

A final deliverable for IS226 Web Information Systems.

Built on top of Laravel Quiz which is generated from Quick Admin Panel tool, but the UI is fully redesigned and the backend customized as needed.
The app is hosted at [http://examsystemis1226.herokuapp.com](http://examsystemis1226.herokuapp.com).

![](https://z-p3-scontent.fmnl8-1.fna.fbcdn.net/v/t1.15752-9/191655672_986693935411590_3404036114902249810_n.png?_nc_cat=110&ccb=1-3&_nc_sid=ae9488&_nc_eui2=AeGnh8LpeVQ7iabt8qUHTnfWrtbKcWa94QKu1spxZr3hApPjtssdXqaWPROerQxLyY-WIrjZFcGjOYOl5HmBTjVB&_nc_ohc=FeXFYs2cXRAAX-RTZS_&_nc_ht=z-p3-scontent.fmnl8-1.fna&oh=bf139d0cc63b90f53dcabf816a51be8c&oe=60E080D4)
![](https://z-p3-scontent.fmnl8-1.fna.fbcdn.net/v/t1.15752-9/187159057_919080271995441_1324745133067265777_n.png?_nc_cat=107&ccb=1-3&_nc_sid=ae9488&_nc_eui2=AeFvlYIwaLrcGaFIX-4SscXrZyFAOMP1-UFnIUA4w_X5QSVMm2WzXEgjLuppgZvKcq7U4NqTqajSo7RcBiyLk2nq&_nc_ohc=CZ8pFjfew_cAX_PFsZo&_nc_ht=z-p3-scontent.fmnl8-1.fna&oh=0246c30182c0e97091ecd259f7f6397b&oe=60DF082E)

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


