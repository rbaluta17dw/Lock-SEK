
  var change= document.getElementById("myEmail");
    
  var email = change.value;

// Function: valid email address without regex
function emailValido(email) {
    // If no email or wrong value gets passed in (or nothing is passed in), immediately return false.
    if(typeof email === 'undefined') return null;
    if(typeof email !== 'string' || email.indexOf('@') === -1) return false;

    // Get email parts
    var emailParts = email.split('@'),
        emailName = emailParts[0],
        emailDomain = emailParts[1],
        emailDomainParts = emailDomain.split('.'),
        validChars = 'abcdefghijklmnopqrstuvwxyz.0123456789_-';

    // There must be exactly 2 parts
    if(emailParts.length !== 2) {
        alert("Wrong number of @ signs");
        return false;
    }

    // Must be at least one char before @ and 3 chars after
    if(emailName.length < 1 || emailDomain.length < 3) {
        alert("Wrong number of characters before or after @ sign");
        return false;
    }

    // Domain must include but not start with .
    if(emailDomain.indexOf('.') <= 0) {
        alert("Domain must include but not start with .");
        return false;
    }

    // emailName must only include valid chars
    for (var i = emailName.length - 1; i >= 0; i--) {
        if(validChars.indexOf(emailName[i]) < 0) {
            alert("Invalid character in name section");
            return false;
        }
    };

    // emailDomain must only include valid chars
    for (var i = emailDomain.length - 1; i >= 0; i--) {
        if(validChars.indexOf(emailDomain[i]) < 0) {
            alert("Invalid character in domain section");
            return false;
        }
    };

    // Domain's last . should be 2 chars or more from the end
    if(emailDomainParts[emailDomainParts.length - 1].length < 2) {
        alert("Domain's last . should be 2 chars or more from the end");
        return false;   
    }

    alert("Email address seems valid");
    return true;
}