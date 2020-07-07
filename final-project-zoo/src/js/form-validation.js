const validateName = (id, message = "Invalid name") => {
    const input = getInputById(id);
    const value = input.value;
    console.log('Value: ', value);

    const isValidName = /^[A-Z]{1}[a-z]{2,20}[ ]{1}[A-Z]{1}[a-z]{2,20}$/.test(value);
    console.log("Is valid name: ", isValidName)
    showErrorSpan(id, isValidName, message);
}

const validateEmail = (id, message = "Invalid email") => {
    const input = getInputById(id);
    const value = input.value;

    const isValidEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
    showErrorSpan(id, isValidEmail, message);
}


const validateLength = (id, min, max, message = `Length must be between ${min} and ${max}`) => {
    const input = getInputById(id);
    const value = input.value;

    const length = value.length;
    showErrorSpan(id, length > min && length < max, message);
}

const validatePassword = (id, message = `Password must contain upper case, lower case and special character`) => {
    const input = getInputById(id);
    const value = input.value;

    const isValidRegex = /((?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).+)/.test(value);
    showErrorSpan(id, isValidRegex, message);
}

const showErrorSpan = (id, isValid, message) => {
    let errorSpan = document.getElementById(id).getElementsByClassName("error")[0];
    console.log("ShowErrorSpan: ", isValid, message);
    if (isValid) {
        errorSpan.style.visibility = "hidden"; // Hides the error
    } else {
        errorSpan.textContent = message;
        errorSpan.style.visibility = "visible"; // Displays the error
    }
}

const getInputById = (id) => {
    let input = document.getElementById(id).getElementsByTagName("input");
    return input && input.length > 0 ? input[0] : document.getElementById(id).getElementsByTagName("textarea")[0];
}