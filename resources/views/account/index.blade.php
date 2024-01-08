<style>
    .grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
  gap: 20px;
}
.card-body {
    margin: 40px;
}
.grid-item {
  margin-bottom: 10px;
}
/* Add styling for the pill tabs */
.nav-pills .nav-item {
  margin: 30px 10px 30px 10px; 
  list-style: none;
  min-height: 20px !important;
}

/* Style the active tab */
.nav-pills .nav-item .active {
    background-color: var(--red) !important;
    color: var(--white) !important;
}
.nav-pills {
    margin: 0;
}
/* Style the links inside the tabs */
.nav-pills .nav-link {
  padding: 0.5rem 0.5rem;
  border-radius: 50px !important;
}

/* Style the icons */
.bx {
  vertical-align: middle;
  font-size: 1.5rem;
}

/* Optional: Add hover effect */
.nav-pills .nav-link:hover {
  background-color: var(--red);
  color: var(--white);
}
.tab {
    display: none !important;
}
.active-tab {
    display: grid;
}
</style>

<x-_dossier :pageName="$pageName" :student="$student">
    @php
        $avatar = $student->pluck("avatar_url")[0];
        $course = $student->pluck("course")[0];
        $class = $student->pluck("class")[0];
        $name = $student->pluck("name")[0];
        $lastName = $student->pluck("lastname")[0];
        $email = $student->pluck("email")[0];
        $phonenumber = $student->pluck("phonenumber")[0];
        $city = $student->pluck("city")[0];
        $street = $student->pluck("street")[0];
        $streetnumber = $student->pluck("streetnumber")[0];
        $residence = $student->pluck("residence")[0];
        $zipcode = $student->pluck("zipcode")[0];

        $studentID = auth()->user()->get()->find($student->pluck("user_id"))->pluck('studentid')[0];
    @endphp
    <div class="wrapper container ">
        <ul class="nav-pills d-flex flex-md-row ">
            <li class="nav-item">
              <a class="nav-link active" href="#AccountTab">
                <i class="bx bx-user me-1"></i>Account
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#NotificationTab">
                <i class="bx bx-bell me-1"></i>Notifications
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#UHasseltProfileTab">
                <i class="bx bx-user me-1"></i>UHasselt Profile
              </a>
            </li>
          </ul>
        <div class="card mb-4 active-tab" id="AccountTab">
        <h5 class="card-header">Account Details</h5>
        <div class="card-body">

            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img src="{{asset($avatar)}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
              <div class="align-items-center align-items-sm-center gap-4">
                <div class="d-flex align-items-center gap-4">
                  <form method="POST" action="/{{app()->getLocale()}}/account/upload/avatar" enctype="multipart/form-data">
                    @csrf
                    <label for="upload" class="align-self-center btn red-bg white me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Upload new photo</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input name="avatar" type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    @error('avatar')
                    <p>{{$message}}</p>
                    @enderror
                    <button type="submit" name="reset" class="align-self-center btn btn-label-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Submit</span>
                    </button>
                  </form>
                </div>
                <form method="POST" action="/{{app()->getLocale()}}/account/upload/avatar/reset" enctype="multipart/form-data">
                  @csrf
                  <button type="submit" name="reset" class="btn btn-label-secondary account-image-reset mb-4">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                  </button>
                  @error('reset')
                  <p>{{$message}}</p>
                  @enderror
                </form>
              </div>
            </div>
            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>

          </div>
          <hr class="my-0">
        <div class="card-body">
            <div class="grid-container">
                <div class="grid-item">
                    <label for="firstName" class="form-label">Student-ID</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" value="{{$studentID}}" autofocus="" readonly>
                </div>
          
                <div class="grid-item">
                    <label for="firstName" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" value="{{$name}}" autofocus="" readonly>
                </div>
            
                <div class="grid-item">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{$lastName}}" readonly>
                </div>
            
                <div class="grid-item">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{$email}}" readonly>
                </div>
            
                <div class="grid-item">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                    <span class="input-group-text">BE (+32)</span>
                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="{{$phonenumber}}" readonly>
                    </div>
                </div>
            
                <div class="grid-item">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$street}} {{$streetnumber}}, {{$zipcode}} {{$city}}, {{$residence}}" readonly>
                </div>
          
                @if ($course)
                    <div class="grid-item">
                    <label for="organization" class="form-label">Course</label>
                    <input type="text" class="form-control" id="organization" name="organization" value="{{$course}}" readonly>
                    </div>
                @endif
                @if ($class)
                    <div class="grid-item">
                    <label for="organization" class="form-label">Class</label>
                    <input type="text" class="form-control" id="organization" name="organization" value="{{$class}}" readonly>
                    </div>
                @endif
            </div>
          </div>
        </div>
        <div class="card mb-4 tab" id="NotificationTab">
            <h5 class="card-header">Notification Settings</h5>
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Email Notifications</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="emailOption1">
                    <label class="form-check-label" for="emailOption1">
                        Option 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="emailOption2">
                    <label class="form-check-label" for="emailOption2">
                        Option 2
                    </label>
                </div>
                <!-- Add more options as needed -->
            </div>

            <div class="mb-3">
                <label class="form-label">Push Notifications</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pushOption1">
                    <label class="form-check-label" for="pushOption1">
                        Option 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pushOption2">
                    <label class="form-check-label" for="pushOption2">
                        Option 2
                    </label>
                </div>
                <!-- Add more options as needed -->
            </div>

            <button type="submit" class="btn white red-bg">Save Changes</button>
        </form>
    </div>
        </div>
        <div class="card mb-4 tab" id="UHasseltProfileTab">
            {{--CONTENT--}}
        </div>

          
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabs = document.querySelectorAll('.nav-pills .nav-link');
                tabs.forEach(tab => {
                    tab.addEventListener('click', function (e) {
                        e.preventDefault();
        
                        // Remove 'active' class from all tabs
                        tabs.forEach(t => t.classList.remove('active'));
        
                        // Add 'active' class to the clicked tab
                        tab.classList.add('active');
        
                        // Find the corresponding tab content
                        const targetTabId = tab.getAttribute('href');
                        console.log(targetTabId);
                        const targetTabContent = document.querySelector(targetTabId);
        
                        // Remove 'active' class from all tab contents
                        document.querySelectorAll('.card').forEach(content => {
                            content.classList.remove('active-tab');
                            content.classList.add('tab');
                        });
        
                        // Add 'active' class to the corresponding tab content
                        if (targetTabContent) {
                            targetTabContent.classList.add('active-tab');
                            targetTabContent.classList.remove('tab');

                        }
                    });
                });
            });
        </script>

</x-_dossier>