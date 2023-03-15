function checkRegNum() {
    const checkbox = document.getElementById('is_registered');
    const regNum = document.getElementById('registration_number');
    const star = document.getElementById('star');
    checkbox.addEventListener('change', (event) => {
        regNum.required = event.currentTarget.checked;
        if (!event.currentTarget.checked) {
            regNum.value = "";
            star.className = "d-none";
        }
        else {
            star.className = "req d-flex";
        }
    })

}
