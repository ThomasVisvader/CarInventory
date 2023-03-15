function checkRegNum() {
    const checkbox = document.getElementById('is_registered')
    const regNum = document.getElementById('registration_number')
    checkbox.addEventListener('change', (event) => {
        regNum.required = event.currentTarget.checked;
        if (!event.currentTarget.checked) {
            regNum.value = "";
        }
    })
}
