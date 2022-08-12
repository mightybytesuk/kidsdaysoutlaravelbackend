@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row mt-2">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Listing Clicks</div>
                <div class="card-body">
                  <h5 class="card-title">Primary card title</h5>
                  <p class="card-text">Each time a user clicks a listing within the app and it makes an api call it will be noted in the clicks DB.</p>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Active Uses</div>
                <div class="card-body">
                  <h5 class="card-title">Primary card title</h5>
                  <p class="card-text">This will get data from the uses DB - Each time a users app makes a call to the api it will be noted so we can see how often our app is being usd</p>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Listings</div>
                <div class="card-body">
                  <h5 class="card-title">{{$listings}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection