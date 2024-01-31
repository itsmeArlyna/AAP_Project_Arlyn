var currentTab = 0;
showTab(currentTab);

function showTab(n) {

    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";

    var icons = document.querySelectorAll(".step i");
    icons.forEach(function(icon) {
        icon.classList.remove("pulse");
    });

    icons[n].classList.add("pulse");
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }

    fixStepIndicator(n)
}

function nextPrev(n) {

    var x = document.getElementsByClassName("tab");
    
    if (n == 1 && !validateTab(currentTab)) return false;

    x[currentTab].style.display = "none";

    currentTab = currentTab + n;

    if (currentTab >= x.length) {

        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Survey form submitted successfully.',
            showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {

            }
        });

        return false;
    }

    showTab(currentTab);
}

function validateTab(tabIndex) {
    var tab = document.getElementsByClassName("tab")[tabIndex];
    var requiredInputs = tab.querySelectorAll("[required]");
    var isValid = true;

    requiredInputs.forEach(function(input) {
        if (input.type === "radio" || input.type === "checkbox") {
            var inputName = input.name;
            var inputGroup = tab.querySelectorAll('input[name="' + inputName + '"]');
            var isAnyChecked = false;

            inputGroup.forEach(function(radioOrCheckbox) {
                if (radioOrCheckbox.checked) {
                    isAnyChecked = true;
                }
            });

            if (!isAnyChecked) {
                isValid = false;
            }
        } else if (input.value.trim() === "") {
            isValid = false;
        }
    });
    if (isValid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return isValid;
}

function fixStepIndicator(n) {

    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()
var randomSurveyNumber = Math.floor(Math.random() * 999) + 1;
var formattedSN = "SN-" + randomSurveyNumber.toString().padStart(3, '0');
document.getElementById("sn").value = formattedSN;

$(document).ready(function() {
    $('#validationCustom01').on('input', function() {
        var emailInput = $(this).val();
        var isValidEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(
            emailInput);

        if (isValidEmail) {
            $(this).removeClass('is-invalid').addClass('is-valid');
        } else {
            $(this).removeClass('is-valid').addClass('is-invalid');
        }
    });
});


//roulette
