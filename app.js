
const submitButton = document.getElementById('submitButton');

submitButton.addEventListener('click', (event) => {
    event.preventDefault(); 

    const dayInput = document.getElementById('day').value.trim(); 

    const existingDays = document.querySelectorAll('table tr td:nth-child(2)'); 
    let isDuplicate = false;

    existingDays.forEach(dayElement => {
        if (dayElement.textContent.trim() === dayInput) {
            isDuplicate = true;
        }
    });

    if (isDuplicate) {
        const errorMessage = document.createElement('span');
        errorMessage.textContent = 'Check the date because it is a duplicate!!!';
        errorMessage.style.color = 'red';
        submitButton.parentNode.insertBefore(errorMessage, submitButton.nextSibling); 
    } else {
        submitButton.parentNode.submit(); 
    }
});
