<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.22/dist/vue.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/humanity/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="/">TMDB API TEST</a>
            </div>
        </nav>

        <div class="container" id="app">
            <div class="media my-4" v-for="(person, index) in people">
                <img class="mr-3" :src="'https://image.tmdb.org/t/p/w500' + person.profile_path" width="150">
                <div class="media-body">
                    <h5 class="mt-0">名字：@{{ person.name }}</h5>

                    <h6>演過的電影：</h6>
                    <template v-for="(movie, index2) in person.known_for">
                        <div v-if="movie.title" class="float-left text-center mr-3">
                            <img class="mr-3" :src="'https://image.tmdb.org/t/p/w500' + movie.poster_path" height="100">
                            <div>
                                @{{ movie.title }}
                                <br>
                                <span class="text-muted">at @{{ movie.release_date }}</span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <script>
        var app = new Vue({
            el: '#app',
            data: {
                people: {!! $people !!}
            }
        })
        </script>
    </body>
</html>