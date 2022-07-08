<!DOCTYPE html>

<html>

<head>

    <title>Tree</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link href="{{ asset('css/treeview.css') }}" rel="stylesheet">

</head>

<body>

<div class="container">

    <div class="panel panel-primary">

        <div class="panel-heading">Tree</div>

        <div class="panel-body">

            <div class="row">

                <div class="col-md-6">

                    <h3>Node List Without Ajax</h3>
                        <ul id="tree1">
                    {{ callChilds() }}
                        </ul>

                </div>
                <div class="col-md-6">

                    <h3>Node List With Ajax</h3>
                        <ul id="tree2">
                    {{ callChildsAjax() }}
                        </ul>

                </div>
            </div>
        </div>

    </div>

</div>

<script src="{{ asset('js/treeview.js') }}"></script>

<script type="text/javascript">
function toggleFN(tog) {
    var curNode = $(tog).attr('rel');
    var openedClass = 'glyphicon-minus-sign';
    var closedClass = 'glyphicon-plus-sign';
    if($(tog).next().next().is(":visible")){
        $(tog).removeClass(openedClass);
        $(tog).addClass(closedClass);
        $(tog).next('ul').slideUp('slow');
        $(tog).next().next().remove();
    } else {
        $(tog).removeClass(closedClass);
        $(tog).addClass(openedClass);
        $.ajax({
                    type: "POST",
                    url: "{{route('get.node')}}",
                    data: {"_token": "{{ csrf_token() }}", curNode : curNode },
                    success: function(data) {
                        $('.curSpan'+curNode).after(data);
                    }
                });
    }
}
</script>

</body>

</html>