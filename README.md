
# Simple Laravel 9 Blog App 
### Post, Comment and Authentication

# Installation steps

### <i>1. Clone the repository<i>
````
git clone https://github.com/deva7mad/simple-blog.git
````

### <i>2. Configure the database connection<i>
````
cd simple-blog/

cp .env.example .env
````
#### <i>Then</i> Add your database config to .env

### <i>3. Running Migration </i>
````
php artisan migrate --seed
````
#### <i>This</i> will seed the database with 30 posts and for each post 5 comments each comment associated with a user.

### <i>4. Storage Link </i>
````
php artisan storage:link
````

### <i>5. Run the app </i>
````
php artisan serve
````
#### <i>You </i> can access dashboard with any generated user email and password will be (password) 

