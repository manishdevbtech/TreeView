<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tree View</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
           
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">     
        <div class="panel panel-primary">
            <div class="panel-heading">TreeView</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>TreeView</h3>
                        <ul id="tree1">
                            @foreach($tree_entry as $category)
                                <li>
                                    {{ $category->entry_id }}
                                    <!-- @if(count($category->childs))
                                        @include('manageChild',['childs' => $category->childs])
                                    @endif -->
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    <script src="/js/treeview.js"></script>
    </body>
</html>
