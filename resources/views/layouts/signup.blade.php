<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotifSignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

<section>
  <div class="w-screen h-screen">
    <div class="card border-light-subtle">
      <div class="row g-0">
        <div class="col-12 col-md-6 text-bg-secondary">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="col-10 col-xl-8 py-3">
              <img width="48" height="48" src="https://img.icons8.com/glyph-neue/64/FAB005/three-leaf-clover.png"
                alt="three-leaf-clover" />
              <hr class="border-primary-subtle mb-4">
              <h2 class="h1 mb-4">Notifications™: Explore and Share Knowledge Together!</h2>
              <p class="lead m-0">They write words, And we get closer to each other with knowledge.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h3>Sign Up</h3>
                </div>
              </div>
            </div>
            <form action="{{ route('signup') }}" method="post">
              @csrf
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="firstname"  placeholder="Your first name" >
                  @error('firstname')
                  <div class="text-danger">
                    {{ $message }}
                  </div> 
                  @enderror
                </div>
                <div class="col-12">
                  <label for="lname" class="form-label">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="lastname" placeholder="Your last name" >
                  @error('lastname')
                  <div class="text-danger">
                    {{ $message }}
                  </div> 
                  @enderror
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com" >
                </div>
                @error('email')
                  <div class="text-danger">
                    {{ $message }}
                  </div> 
                  @enderror
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password" id="password" value="" >
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Verify Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password_confirmation" value="" >
                </div>
                @error('password')
                <div class="text-danger">
                  {{ $message }}
                </div> 
                @enderror
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-secondary" type="submit" name="signup">Sign Up</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                  <a href="{{ route('form.signin') }}" class="link-secondary text-decoration-none">Have an account? Sign in</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>