<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Background Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('https://images.unsplash.com/photo-1518144597368-62f7c2a7d67f'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 50vh;">
            <div class="col-md-8">
                <div class="card bg-light">
                    <div class="card-body">
                        <h2 class="card-title text-center">Tree Information Card</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Tree Details</th>
                                        <td>{{$tree->details}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Planted On</th>
                                        <td>{{$tree->planting_date}} at {{$tree->planting_time}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{$tree->treeAddress->division}}, {{$tree->treeAddress->district}}, {{$tree->treeAddress->home_address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Longitude</th>
                                        <td>{{$tree->longitude}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Latitude</th>
                                        <td>{{$tree->latitude}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <h5 class="card-title fw-semibold  mb-3">Timeline</h5>
                        </div>
                        <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tree</th>
                                        <th scope="col">Photo Date</th>
                                        <th scope="col">Photo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($timelines as $timeline)
                                    <tr>
                                        <th scope="row">{{ $timeline->id }}</th>
                                        <td>{{ $timeline->treeProfile->details }}</td>
                                        <td>{{ $timeline->photo_date }}</td>
                                        <td><img src="{{ Storage::url($timeline->tree_photo_path) }}" alt="Timeline Image" height="100" width="100"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
