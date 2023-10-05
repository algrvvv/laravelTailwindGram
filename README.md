# TailwindGram
A small forum written in Laravel, the styles of which, based on the name, are made with a Tailwind.

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone git@github.com:algrvvv/laravelTailwindGram.git blog
composer install
cp .env.example .env
```

Then create the necessary database. <br>
And run the initial migrations and seeders.

```
php artisan migrate --seed
```

## Main page
On the main page, we are greeted by posts that have been posted

## Post page:
By clicking on the title, we will be able to see the full text of the article and comments on it

>**A comment system is provided on the post page, but only if the user has logged into his account**

## Authors page
>Here are the authors, the number of their posts and the total number of views

>**It is worth noting that in order to publish a post and, accordingly, display the author on this page, it is necessary that the admin approves your post**

As already noted earlier, there is a self-made admin panel on the forum
After logging in to the admin panel, we display articles that are awaiting approval or rejection

>After approval, your post will be posted. It can be found among others by the name or some words of your post itself through the search bar on the main page

In main page if you clicking on the author's name will take you to the author's profile page where all his articles will be displayed. In addition, it is made, maybe not the best, but still a system for counting views. It is possible to register on the forum and add your posts or comments

