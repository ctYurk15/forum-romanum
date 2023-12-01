
function addOption() 
{
    const optionsContainer = document.querySelector('.options-container');
    const newOption = document.createElement('div');
    newOption.className = 'option';
    newOption.innerHTML = `
        <input type="text" name="option[]" required>
        <button type="button" onclick="removeOption(this)">Delete</button>
    `;
    optionsContainer.appendChild(newOption);
}

function removeOption(button) 
{
    const optionContainer = button.parentNode;
    optionContainer.parentNode.removeChild(optionContainer);
}