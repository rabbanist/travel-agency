
<div class="page-top" style="background-image: url('uploads/banner.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Create Account</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Create Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content pt_70 pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <form class="login-form" method="post" action="{{route('registration.submit')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address *</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password *</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password *</label>
                        <input type="password" name="retype_password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">
                            Create Account
                        </button>
                    </div>
                    <div class="mb-3">
                        <a href="{{route('login')}}" class="primary-color">Existing User? Login Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
