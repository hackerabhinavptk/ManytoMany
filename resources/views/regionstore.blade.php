<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())

        <div class="alert alert-danger">

            @foreach ($errors->all() as $key => $value)
                <p class="text-align-center">{{ $value }}</p>
            @endforeach
        </div>

    @endif
    <div class="jumbotron container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Add Stores</h3>
            </div>
            <div class="panel-body">

                <form action="/store/addrelation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Store</label>
                        <input type="text" name='store_name' value="{{ old('store_name') }}" class="form-control"
                            id="exampleInputPassword1" placeholder="Store">
                    </div>

                    @foreach ($regions as $key => $value)
                        <div class="form-group">
                            <input type="checkbox" name="region_name[]" value="{{ $value['id'] }}">
                            <label for="vehicle1"> {{ $value['region_name'] }}</label><br>

                        </div>
                    @endforeach
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">



                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>


            </div>
        </div>


    </div>


</body>

</html>
