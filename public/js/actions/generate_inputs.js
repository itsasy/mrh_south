const number = document.querySelector('#study_parameter');
const objetive = document.querySelector('.inputs_container');

const inputs = (valor) =>
    `<div class="form-group">
        <label class="col-10 justify-content-start" for="muestras_${valor}">Atributo ${valor}</label>
        <input 
        type="text" 
        name="attribute[${valor}]" 
        id="muestras_${valor}" 
        class="form-control col-2 muestras_${valor}"
        placeholder=""  
        required>
    </div>`;

const generate = (container, repeat) => {
    container.innerHTML = '';
    for (var i = 1; i <= repeat; i++) {
        container.innerHTML += inputs(i);
    }
}

number.addEventListener('change', () => {
    generate(objetive, number.value)
})

number.addEventListener('keyup', () => {
    generate(objetive, number.value)
})
