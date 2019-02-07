@extends('layouts.userDashboard')
@section('title', 'LockSEK')
@section('content')
<div class="col-xs-12 col-sm-3">
    <div class="card profile-card">
        <div class="profile-header">&nbsp;</div>
        <div class="profile-body">
            <div class="image-area">
                @if (isset(Auth::user()->imgname))
                <img src="{{Storage::url('avatars/'.Auth::user()->imgname)}}" alt="AdminBSB - Profile Image" />
                @else
                  <img src="{{asset('assets/images/user.png')}}" alt="AdminBSB - Profile Image" />
                @endif
            </div>
            <div class="content-area">
                <h3>{{Auth::user()->name}}</h3>
                <p>{{Auth::user()->email}}</p>
                <p>Tipo de Usuario</p>
            </div>
        </div>
        <div class="profile-footer">
            <ul>
                <li>
                    <span>Followers</span>
                    <span>1.234</span>
                </li>
                <li>
                    <span>Following</span>
                    <span>1.201</span>
                </li>
                <li>
                    <span>Friends</span>
                    <span>14.252</span>
                </li>
            </ul>
            <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
        </div>
    </div>

    <div class="card card-about-me">
        <div class="header">
            <h2>ABOUT ME</h2>
        </div>
        <div class="body">
            <ul>
                <li>
                    <div class="title">
                        <i class="material-icons">library_books</i>
                        Education
                    </div>
                    <div class="content">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </div>
                </li>
                <li>
                    <div class="title">
                        <i class="material-icons">location_on</i>
                        Location
                    </div>
                    <div class="content">
                        Malibu, California
                    </div>
                </li>
                <li>
                    <div class="title">
                        <i class="material-icons">edit</i>
                        Skills
                    </div>
                    <div class="content">
                        <span class="label bg-red">UI Design</span>
                        <span class="label bg-teal">JavaScript</span>
                        <span class="label bg-blue">PHP</span>
                        <span class="label bg-amber">Node.js</span>
                    </div>
                </li>
                <li>
                    <div class="title">
                        <i class="material-icons">notes</i>
                        Description
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-9">
    <div class="card">
        <div class="body">
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        


                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="NameSurname" class="col-sm-2 control-label">Name Surname</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="NameSurname" name="NameSurname" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="{{Auth::user()->email}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputExperience" class="col-sm-2 control-label">Experience</label>

                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <textarea class="form-control" id="InputExperience" name="InputExperience" rows="3" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputSkills" class="col-sm-2 control-label">Skills</label>

                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="InputSkills" name="InputSkills" placeholder="Skills">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in" />
                                    <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
