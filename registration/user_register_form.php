<form onsubmit="register_submit()">

    <div class="form-group">
        <label for="name">Full Name *</label>
        <input required 
            type="text" 
            class="form-control" 
            id="name" 
            aria-describedby="name" 
            placeholder="Enter Your full name">
    </div>

    <div class="form-group">
        <label for="email">Email *</label>
        <input required 
            type="text" 
            class="form-control" 
            id="email" 
            aria-describedby="emailHelp" 
            placeholder="Enter Your Email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="pw">Password *</label>
        <input required type="password" class="form-control" id="pw" placeholder="Password">
    </div>

    <div class="form-group">
        <label for="pw1">Confirm Password *</label>
        <input required type="password" class="form-control" id="pw1" placeholder="Confirm Password">
    </div>

    <p>Preferences</p>
    <div class="form-group form-check">
        <input name='preference' type="checkbox" class="form-check-input" id="veg">
        <label class="form-check-label" for="veg">Veg.</label>
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <input name='preference' type="checkbox" class="form-check-input" id="non-veg">
        <label class="form-check-label" for="non-veg">Non-Veg.</label>

        <small class="form-text text-muted">You can change these later.</small>
    </div>

    <button class="btn btn-inline btn-primary">Register</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="#" id="partner-register-link">
        <small>Partner/Restaurant Register</small>
    </a>

</form>