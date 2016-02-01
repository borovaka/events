## Simple Tickets system

[![Build Status](https://travis-ci.org/borovaka/events.svg?branch=master)](https://travis-ci.org/borovaka/events)



## Setup

1) Clone git repo and change Homestead.yml mappings
2) Generate ssh key in ~/.ssh

``` bash
# 3) Get vagrant box
vagrant box add laravel/homestead

# 4) Start virtual machine
vagrant up

# 5) SSH into the machine
vagrant ssh

# 6) switch to project direcotry
cd tickets

# 7) Install composer components, migrate and seed

composer install
php artisan migrate
php artisan db:seed --class DataSeeder

```

8) Add "192.168.12.10 tickets.dev" to your host OS host file