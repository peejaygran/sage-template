<div id="register-page" class="container-fluid">

    <div class="row">
        
        <div class="col-md-6 d-none d-md-flex align-items-center p-5">
            <img src="{{ wp_get_attachment_url(655, '') }}" alt="" width="100%">
        </div>
    
        <div class="col-md-6 p-3">
    
            <form action="">
    
                <h1 class="text-center">Registration</h1>
    
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="">Firstname:</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="e.g. John"
                            required>
                    </div>
    
                    <div class="form-group col-lg-6">
                        <label for="">Lastname:</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="e.g. Doe"
                            required>
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" class="form-control" name="" id="" aria-describedby="helpId" placeholder="e.g. johndoe@sample.eg"
                        required>
                </div>
    
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="">Contact Number:</label>
                        <input type="tel" class="form-control" name="" id="" aria-describedby="helpId" placeholder="e.g. 9999-999-9999"
                            required>
                    </div>
    
    
                    <div class="form-group col-lg-6">
                        <label for="">Postcode:</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="e.g. WC2N 5DU"
                            required>
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="">Company Name:</label>
                    <input type="email" class="form-control" name="" id="" aria-describedby="helpId" placeholder="e.g. Removals Experts Ltd"
                        required>
                </div>
    
                <div class="form-group">
                    <label for="">Website:</label>
                    <input type="url" class="form-control" name="" id="" aria-describedby="helpId" placeholder="e.g. https://getmovingexperts.co.uk/"
                        required>
                </div>
    
                <button type="submit" class="form-control btn wp-orange">Create Account</button>
    
    
    
    
            </form>
    
        </div>

    </div>

    @include('partials.three-steps')

</div>
