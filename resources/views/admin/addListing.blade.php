@extends('layouts.admin')

@section('content')
<div class="container">
    <form action="" method="post">
        <input type="text" name="name" placeholder="Name" class="form-control">
        <textarea name="description" class="form-control" cols="30" rows="10" placeholder='Description' required></textarea>
        <input type="text" name="line_one" class="form-control" placeholder="Line One">
        <input type="text" name="line_two" class="form-control" placeholder="Line Two">
        <input type="text" name="town" class="form-control" placeholder="Town">
        <input type="text" name="county" class="form-control" placeholder="County">
        <input type="text" name="country" class="form-control" placeholder="Country">
        <input type="text" name="postcode" class="form-control" placeholder="Postcode/Zip Code">
        
        <input type="text" name="price" class="form-control" placeholder="Price">
        <input type="text" name="website" class="form-control" placeholder="Website URL">   
        <input type="file" name="image" class="form-control">


    </form>    
</div>
@endsection