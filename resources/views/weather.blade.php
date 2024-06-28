<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        margin-bottom: 60px;
        /* Height of the footer */
    }

    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 60px;
        /* Height of the footer */
        background-color: #f5f5f5;
    }

    p.card-text {
        margin-top: -10px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Weather App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4">Weather Application</h1>
        <div class="input-group mb-3">
            <form action="{{ route('weather.form')}}" method="post" class="form-inline">
                @csrf
                
                <div class="form-group">
                    <label for="city">Enter City Name:</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter city name">
                </div>
                <button type="submit" class="btn btn-primary">Search Weather</button>
                {{-- <div class="d-flex">
                    <div class="form-group">
                        <select class="form-select" name="city" id="city">
                            <option value="-1">-- Select City --</option>
                            <option value="Port Blair">Port Blair</option>
                            <option value="Chandragiri">Chandragiri</option>
                            <option value="Sivasagar">Sivasagar</option>
                            <option value="New York">New York</option>
                        </select>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button> --}}
                </div>
            </form>

        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Looks Like</h5>
                        <br>
                        <b> 
                            @if(isset($data["weather"][0]['main']))
                            @if($data["weather"][0]["main"] == "Clear")
                                <img src="{{ asset('images/clear.png') }}" alt="Clear" style="height: 100px;">
                            @elseif($data["weather"][0]["main"] == "Clouds")
                                <img src="{{ asset('images/cloud.png') }}" alt="Clouds" style="height: 100px;">
                            @elseif($data["weather"][0]["main"] == "Rain")
                                <img src="{{ asset('images/rain.png') }}" alt="Rain" style="height: 100px;">
                            @else
                                <p>Weather condition not recognized</p>
                            @endif
                        @endif                        </b>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Details</h5>
                        <br>
                        <p class="card-text">Country:
                            <b> 
                                @if(isset($data["sys"]["country"]))
                                 {{ $data["sys"]["country"]}} 
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Name: 
                            <b> 
                                @if(isset($data["name"]))
                                 {{ $data["name"]}} 
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Latitude: 
                            <b> 
                                @if(isset($data["coord"]["lat"]))
                                 {{ $data["coord"]["lat"]}} 
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Longitude: 
                            <b> 
                                @if(isset($data["coord"]["lon"]))
                                 {{ $data["coord"]["lon"]}} 
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Sunrise: 
                            <b> 
                                @if(isset($data["sys"]["sunrise"]))
                                 {{ $data["sys"]["sunrise"]}} 
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Sunset: 
                            <b> 
                                @if(isset($data["sys"]["sunset"]))
                                 {{ $data["sys"]["sunset"]}} 
                                @endif
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Temperature &deg; C | &deg; F</h5>
                        <br>
                        <p class="card-text">Temp: 
                            <b> 
                                @if(isset($data["main"]["temp"]))
                                 {{ $data["main"]["temp"]}} 
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Min Temp:
                            <b> 
                                @if(isset($data["main"]["temp_min"]))
                                 {{ $data["main"]["temp_min"]}} 
                                @endif
                            </b>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Weather App. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>