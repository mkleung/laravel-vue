# Creating a laravel, Vue and InertiaJs app 🌞

### Main Features

-   Authentication & Authorization
-   Emails
-   User Roles & Profile
-   CRUD actions
-   File Upload
-   Dark Mode

### Packages and Tools

-   Laravel 11
-   InertiaJS
-   VueJS
-   Squlite
-   TailwindCSS
-   Ziggy
-   Font Awesome
-   MailTrap

### 1. Install Laravel and Vue

`laravel new project-name`

Pick no starter kit, sqlite

**Run application**

`php artisan serve`

**Errors**

-   If server is not started (Failed to listen on 127.0.0.1:8000)
-   Run php.ini on your terminal and find the location of php.ini file.
-   Change `variables_order = "EGPCS"` to variables_order = "GPCS"

**Install Vue**

`npm i vue@latest`

### 2. Install Inertia

-   InertiaJS allows you to easily connect the frontend (Vue/React/etc) with laravel wihout the use of building APIs.
-   No need for different repositories for front end and back end, just one repo for the whole project.

Instructions on [inertia's website](https://inertiajs.com/server-side-setup)

**Root Template**

-   Install dependencies `composer require inertiajs/inertia-laravel`
-   Rename the welcome.blade.php to app.blade.php

Modify this file

<details>
  <summary><u>resources > views > app.blade.php</u></summary>
    
```bash
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>
```
</details>

**Middleware**

Install middleware
`php artisan inertia:middleware
`
Modify this file 

<details>
  <summary><u>bootstrap > app.php</u></summary>
  
```
use App\Http\Middleware\HandleInertiaRequests;
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        HandleInertiaRequests::class,
    ]);
})
```
</details>

**Creating Responses**

Modify this file

<details>
  <summary><u>routes > web.php</u></summary>
  
```
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
Route::get('/', function () {
    return Inertia::render('Home');
});
```
</details>

**Client side installation**

`npm install @inertiajs/vue3`

Modify this file

<details>
  <summary><u>resources > js > app.js</u></summary>
    
```
import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
```
</details>

Next, Create this file

<details>
  <summary><u>resources > js > Pages > Home.vue</u></summary>
  
```
<template>
    <div>
        <h1>Hello</h1>
    </div>
</template>
```
</details>

### 4. Configure vite and Tailwindcss ###

First run this following commands to install vite and tailwind

`npm i @vitejs/plugin-vue`

`npm install tailwindcss @tailwindcss/vite`


Modify this config file

<details>
  <summary><u>vite.config.js</u></summary>

```
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite'
export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

```
</details>

Inside resources > css > app.css, add this line of code 

@import 'tailwindcss';


Inside views > app.blade.php

`@vite('resources/css/app.css')`

Check if tailwind is working, go to Home.vue and add this code

```
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
```


### 5. Finally Run the application

* Open a terminal tab
`php artisan serve`

* Next open another terminal tab
`npm run dev`

* Then go to the link

http://127.0.0.1:8000/


### 6. Notes

**Layouts**
* When adding layouts, Add this code to app.js

<details>
  <summary><u>resources > js > app.js</u></summary>

```
import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from './Layouts/Layout.vue'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Layout
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
```
</details>

**Progress Indicator**

* add `sleep(.5);` inside web.php route

**Shared Data**
* Shared data like User Authentication can be modified inside 

`app > Http > Middleware > HandleInertiaRequests.php`

**Ziggy Installation**

* Go to [ziggy](https://github.com/tighten/ziggy)
* Install `composer require tightenco/ziggy`
* Import ziggy package into app.js

```
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      ...
```
* Then go to `resources > views > app.blade.php` and add `@routes` as new directive
* Then, we can add routes in our template `<Link :href="route('home')">Home</Link>`

**Scroll preservation**

* Add `preserve-scroll` to a link (example in Home.vue)

### 7. Project Progress

[x] Routes  
[x] Layouts  
[x] Link and Head  
[x] Progress Indicator  
[x] shared data  
[x] Named Routes  
[x] Scroll Preservation  
[ ] Forms  
[ ] Auth Controller  
[ ] Login / Logout  
[ ] Session Messages  
[ ] Filters / Search  
[ ] Authorization  
[ ]  

### Sources

Installation

Project 1
https://www.youtube.com/watch?v=WkH3UE-1xqQ&list=PL38wFHH4qYZXCW2rlBLNdHi5cv-v_qlXO&index=4

