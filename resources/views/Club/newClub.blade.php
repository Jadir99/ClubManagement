

hello this is page to add a new ffedback for the reclamation :


<form action="{{ route('Club.store') }}" method="POST">
    @csrf

    Name of club: <input type="text" name="club_name"> <br>

    Description: <textarea name="description" id="" cols="30" rows="10"></textarea> <br>
    
    Image: <input type="text" name="image"> <br>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>
