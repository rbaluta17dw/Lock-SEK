

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>
<!--<script src="{{asset('assets/js/email.js')}}"></script>-->
<script src="{{asset('assets/js/parallax/parallax.min.js')}}"></script>

<script src="{{asset('assets/js/validation.js')}}"></script>

<!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->

<script src="https://apis.google.com/js/api.js"></script>
    <script type="text/javascript">
        function onSignIn(googleUser) {
            console.log( "signedin");
            // Useful data for your client-side scripts:
            var profile = googleUser.getBasicProfile();
            console.log("Name: " + profile.getName());
        };

        gapi.load('auth2', function() {
            gapi.auth2.init({
                client_id: "376929193590-jaqs30ap9ifrd5eostsg22dka5u2heol.apps.googleusercontent.com",
                scope: "profile email" // this isn't required
            }).then(function(auth2) {
                console.log( "signed in: " + auth2.isSignedIn.get() );
                auth2.isSignedIn.listen(onSignIn);
                var button = document.querySelector('#signInButton');
                button.addEventListener('click', function() {
                  auth2.signIn();
                });
            });
        });
    </script>
