@extends('layouts.admin')

@section('content')
<div class="container">
    <form action="" method="post">
        <input type="text" name="name" placeholder="Name" class="form-control">
        <textarea name="description" class="form-control" cols="30" rows="10" placeholder='Description' required></textarea>
        <input type="text" name="long" class="form-control" placeholder="Long">
        <input type="text" name="lat" class="form-control" placeholder="lat">
        <input type="text" name="price" class="form-control" placeholder="Price">
        <input type="text" name="website" class="form-control" placeholder="Website URL">   
        <input type="file" name="image" class="form-control">


    </form>    
</div>
@endsection