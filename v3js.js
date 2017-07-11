document.getElementById("legend").classList.remove("not_displayed");

var frm = document.getElementById("contactForm");
frm.addEventListener("submit", function(evt) {
    evt.preventDefault();
    evt.stopPropagation();
});

/*  function to check name & email fields, gets passed the id of the field when it's called, 
in the 'change' events and in the 'submit' button click event */
function validateInput(field) {
    var id = field.id;
    field.value = field.value.trim();
    var classList = document.getElementById(id + "-error").classList;
    if (field.checkValidity()) {
        classList.add("hidden");
    } else {
        classList.remove("hidden");
    }
}

/* function to take whatever the user types into the phone number field, 
remove the junk characters and re-format the input into (xxx) xxx-xxxx format */
function validatePhone() { 
	var ph = document.getElementById("phone");
	ph.value = ph.value.trim();
	ph.value = ph.value.replace(/[^0-9]/g, '');
	var classList = document.getElementById("phone-error").classList;
	var ph_shorten;
	
	if (ph.value.length < 10)
		{ classList.remove("hidden"); }
	else if (ph.value.length >= 10)
		{ 
			if (ph.value.length > 10)
			  { 
				ph_shorten = ph.value.substring(0,10);
				ph.value = ph_shorten;
			  }
			ph.value = ph.value.replace(/(\d{3})(\d{3})(\d{4,})/, "($1) $2-$3"); 
			classList.add("hidden");
		}
}

//function to check the status drop-down box's validity:
function checkStatus() {
    var st = document.getElementById("status");
    var statusValue = st.options[st.selectedIndex].value;
    if (statusValue == 'select') {
        document.getElementById("status-error").classList.remove("hidden");
    } else {
        document.getElementById("status-error").classList.add("hidden");
    }
}

//function to check the radio buttons' validity:
function checkRBs() {
    var found;
    var rbs = document.querySelectorAll("input[type='radio']");
    var i = 0,
        l = rbs.length;
    for (i = 0; i < l; i++) {
        if (rbs[i].checked) {
            found = true;
            document.getElementById("type-error").classList.add("hidden");
            break;
        } else {
            found = false;
            document.getElementById("type-error").classList.remove("hidden");
        }
    }
}

// function to check the msg textarea since we can't put the 'pattern' attribute in the textarea tag:
function checkMessage() {
    var msg = document.getElementById("message");
    var msgValue = document.getElementById("message").value;
    var msg_re = new RegExp(/[\w\,\.\'-\(\)\$ ]{5,99}/);
    msg.value = msg.value.trim();
    if ((!msg_re.test(msgValue.trim())) || (msgValue.trim() == '')) {
        document.getElementById("message-error").classList.remove("hidden");
    } else {
        document.getElementById("message-error").classList.add("hidden");
    }
}

document.getElementById("name").addEventListener("change", function() {
    validateInput(document.getElementById("name"))
});
document.getElementById("phone").addEventListener("change", validatePhone);
document.getElementById("email").addEventListener("change", function() {
    validateInput(document.getElementById("email"))
});
document.getElementById("message").addEventListener("keyup", checkMessage);
document.getElementById("status").addEventListener("change", checkStatus);

// turning off the error message as soon as the radio buttons are clicked:
document.getElementById("rb1").addEventListener("click", function() {
    document.getElementById("type-error").classList.add("hidden");
});
document.getElementById("rb2").addEventListener("click", function() {
    document.getElementById("type-error").classList.add("hidden");
});

// Code for when the "send message" button is clicked:
document.getElementById("sendMsg").addEventListener("click", function(evt) {
    validateInput(document.getElementById("name"));
    validateInput(document.getElementById("email"));
    validatePhone();
    checkStatus();
    checkRBs();
    checkMessage();

    var hidden = document.querySelectorAll("span.error:not(.hidden)");


    // ------------------------- AJAX -----------------------------------------
    // get values from form
    var frm = document.getElementById("contactForm");
    var i, l, v;
    var inp = frm.querySelectorAll("input, select, textarea");
    var data = {};
    il = inp.length;

    for (i = 0; i < il; i++) {
        v = inp[i].name;
        data[v] = inp[i].value;
    }

    // handling the response from the server:
    function done() {
        var details;
        var response = JSON.parse(this.response);
        var message = response['status'] + "\n";
        if (typeof response['invalid'] !== "undefined") {
            details = response['invalid'];
            message += details.join("\n");
			
        } 
		if (response['status'] === 'success') { location.href='contactthanks.html'; }
        document.getElementById("server_response").textContent = message;
		document.getElementById("legend").classList.add("not_displayed");
		document.getElementById("server_response").classList.remove("not_displayed");
		
    }

    // sending data to server:
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.addEventListener("load", done, false);
    xmlhttp.open("POST", "http://ncc.wirehopper.com/ajax-submit.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/JSON");

    if ((frm.checkValidity()) && (hidden.length == 0)) {
        xmlhttp.send(JSON.stringify(data));
    }
});

// form-reset button:
document.getElementById("resetBtn").addEventListener("click", function() {    
	document.getElementById("legend").classList.remove("not_displayed");
	document.getElementById("server_response").classList.add("not_displayed");
	frm.reset();
	document.getElementById("textCounter").classList.add("hidden");
	/* location.reload(); */
});	