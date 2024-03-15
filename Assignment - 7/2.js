function daysUntilNextBirthday(birthDate) {
    const today = new Date();
    const birthday = new Date(birthDate);

    birthday.setFullYear(today.getFullYear());

    if (birthday < today) {
        birthday.setFullYear(today.getFullYear() + 1);
    }

    const differenceInTime = birthday.getTime() - today.getTime();
    const daysUntilBirthday = Math.ceil(differenceInTime / (1000 * 3600 * 24));

    return daysUntilBirthday;
}

function calculateDaysUntilBirthday() {
    const birthDate = document.getElementById("birthdayInput").value;
    const daysLeft = daysUntilNextBirthday(birthDate);
    document.getElementById("result").textContent = "Days left until your birthday: " + daysLeft;
}