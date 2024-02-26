@foreach($users as $user)
<div class="card" style="width: 18rem;">
   <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">Full Stack Developer</p>
        <p class="card-text">YouCode</p>
        <a href="#" class="btn btn-primary">Follow</a>
        <a href="#" class="btn btn-secondary">Message</a>
    </div>
</div>
@endforeach
